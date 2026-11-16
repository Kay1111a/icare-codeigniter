<?php
namespace App\Auth;

final class AuthManager
{
    private $actor;
    private ?string $selectedGuard = null;
    public function setUser($user) { $this->actor = $user; return $this; }
    public function guard($name = null) { $this->selectedGuard = $name; return $this; }
    public function user() {
        if ($this->selectedGuard === 'student' && !$this->actor instanceof \App\Models\Student) return null;
        return $this->actor;
    }
    public function id() { return $this->user()?->getAuthIdentifier(); }
    public function check() { return $this->user() !== null; }
    public function guest() { return !$this->check(); }
    public function shouldUse($name) { $this->selectedGuard = $name; }
    public function logout() { $this->actor = null; $this->selectedGuard = null; }
}
