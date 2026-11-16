<?php
namespace App\Auth;

class AccessToken extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'personal_access_tokens';
    protected $guarded = [];
    protected $hidden = ['token'];
    protected $casts = ['abilities' => 'json', 'last_used_at' => 'datetime', 'expires_at' => 'datetime'];
    public function tokenable() { return $this->morphTo(); }
    public function can($ability) { return in_array('*', $this->abilities ?? [], true) || in_array($ability, $this->abilities ?? [], true); }
    public function cant($ability) { return !$this->can($ability); }
    public static function resolve(string $plain): ?self {
        if (!str_contains($plain, '|')) return null;
        [$id, $secret] = explode('|', $plain, 2);
        if (!ctype_digit($id)) return null;
        $token = static::find($id);
        if (!$token || !hash_equals($token->token, hash('sha256', $secret))) return null;
        if ($token->expires_at && $token->expires_at->isPast()) return null;
        $minutes = (int) config('tokens.expiration', 480);
        if ($minutes > 0 && (!$token->created_at || $token->created_at->lte(now()->subMinutes($minutes)))) return null;
        return $token;
    }
}
