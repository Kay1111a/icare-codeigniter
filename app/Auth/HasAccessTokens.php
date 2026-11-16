<?php
namespace App\Auth;

trait HasAccessTokens
{
    protected $accessToken;
    public function tokens() { return $this->morphMany(AccessToken::class, 'tokenable'); }
    public function createToken(string $name, array $abilities = ['*'], ?\DateTimeInterface $expiresAt = null) {
        $plain = bin2hex(random_bytes(32));
        $token = $this->tokens()->create(['name' => $name, 'token' => hash('sha256', $plain), 'abilities' => $abilities, 'expires_at' => $expiresAt]);
        return (object) ['accessToken' => $token, 'plainTextToken' => $token->getKey() . '|' . $plain];
    }
    public function currentAccessToken() { return $this->accessToken; }
    public function withAccessToken($token) { $this->accessToken = $token; return $this; }
    public function tokenCan($ability) { return $this->accessToken && $this->accessToken->can($ability); }
}
