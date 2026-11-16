<?php
namespace Tests\Feature;

use App\Libraries\Bridge\Api;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

final class CodeIgniterMigrationTest extends TestCase
{
    public function test_login_issues_real_tokens_and_logout_revokes_them(): void
    {
        $user = User::factory()->create(['password' => bcrypt('Migration!234')]);
        $login = $this->postJson('/api/login', ['email' => $user->email, 'password' => 'Migration!234'])->assertOk();
        $token = $login->json('token');
        $this->assertIsString($token);
        $this->withHeader('Authorization', 'Bearer ' . $token)->getJson('/api/me')->assertOk();
        $this->getJson('/api/student/me')->assertForbidden();
        $this->postJson('/api/logout')->assertOk();
        $this->getJson('/api/me')->assertUnauthorized();
    }

    public function test_student_duplicate_routes_resolve_to_the_student_guard(): void
    {
        $student = Student::factory()->create(['must_change_password' => false]);
        $token = $student->createToken('migration-test')->plainTextToken;
        $this->withHeader('Authorization', 'Bearer ' . $token);
        $this->getJson('/api/student/dashboard')->assertOk()->assertJsonPath('student.student_id', $student->student_id);
        $this->putJson('/api/student/profile', ['first_name' => 'Niño'])->assertOk()->assertJsonPath('first_name', 'Niño');
        $this->getJson('/api/me')->assertForbidden();
    }

    public function test_expired_tampered_and_inactive_account_tokens_are_rejected(): void
    {
        $user = User::factory()->create();
        $issued = $user->createToken('migration-test');
        $this->withHeader('Authorization', 'Bearer ' . $issued->plainTextToken . 'x')->getJson('/api/me')->assertUnauthorized();
        $issued->accessToken->forceFill(['expires_at' => now()->subMinute()])->save();
        $this->withHeader('Authorization', 'Bearer ' . $issued->plainTextToken)->getJson('/api/me')->assertUnauthorized();
        $fresh = $user->createToken('migration-test');
        $user->update(['is_active' => false]);
        $this->withHeader('Authorization', 'Bearer ' . $fresh->plainTextToken)->getJson('/api/me')->assertUnauthorized();
    }

    public function test_api_login_limit_is_enforced_by_native_filters(): void
    {
        Api::$disableThrottle = false;
        for ($i = 0; $i < 5; ++$i) {
            $this->postJson('/api/login', ['email' => 'unknown@example.edu', 'password' => 'incorrect'])->assertUnauthorized();
        }
        $this->postJson('/api/login', ['email' => 'unknown@example.edu', 'password' => 'incorrect'])
            ->assertStatus(429)->assertHeader('Retry-After');
    }

    public function test_notification_markdown_renders_and_logged_mail_is_sent(): void
    {
        $user = User::factory()->create();
        $user->notify(new \App\Notifications\AdminPasswordResetNotification());
        $user->notify(new \App\Notifications\RegistrationOtpNotification('FakeOtp!123', 15));
        $messages = app('mailer')->getSymfonyTransport()->messages();
        $this->assertCount(2, $messages);
        $this->assertStringContainsString('FakeOtp!123', $messages->last()->getOriginalMessage()->getHtmlBody());
        $log = \App\Models\EmailLog::latest('id')->first();
        $this->assertSame('sent', $log->status, $log->error_message ?? '');
    }

    public function test_native_export_contains_an_actual_excel_workbook(): void
    {
        $user = User::factory()->create(['role' => 'admin', 'must_change_password' => false]);
        $this->withHeader('Authorization', 'Bearer ' . $user->createToken('export')->plainTextToken);
        $response = $this->getJson('/api/audit-logs/export/excel?action=login')->assertOk();
        $file = tempnam(sys_get_temp_dir(), 'icare-xlsx-');
        try {
            file_put_contents($file, $response->getContent());
            $zip = new \ZipArchive();
            $this->assertTrue($zip->open($file));
            $this->assertNotFalse($zip->locateName('xl/workbook.xml'));
            $zip->close();
        } finally { unlink($file); }
    }

    public function test_unknown_api_paths_return_json_404_instead_of_the_spa(): void
    {
        $this->getJson('/api/no-such-endpoint')->assertNotFound()->assertJsonPath('message', 'API endpoint not found.');
        $this->postJson('/api/no-such-endpoint')->assertNotFound();
    }

    public function test_original_migration_ledger_prevents_recreating_or_dropping_data(): void
    {
        $user = User::factory()->create();
        Schema::create('migrations', function ($table) { $table->id(); $table->string('migration'); $table->integer('batch'); });
        app('db')->table('migrations')->insert(['migration' => '2014_10_12_000000_create_users_table', 'batch' => 1]);
        require_once app_path('Database/Migrations/2014-10-12-000000_M20141012000000CreateUsersTable.php');
        $migration = new \App\Database\Migrations\M20141012000000CreateUsersTable();
        $migration->up();
        $migration->down();
        $this->assertDatabaseHas('users', ['id' => $user->id]);
    }
}
