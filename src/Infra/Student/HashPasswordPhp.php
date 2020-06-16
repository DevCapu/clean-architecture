<?php

namespace Devcapu\Arquitetura\Infra\Student;

use Devcapu\Arquitetura\Domain\Student\PasswordHasher;

class HashPasswordPhp implements PasswordHasher
{

    public function hash(string $password): string
    {
        return password_hash($password, PASSWORD_ARGON2ID);
    }

    public function verify(string $plainPassword, string $hashedPassword): bool
    {
        return password_verify($plainPassword, $hashedPassword);
    }
}