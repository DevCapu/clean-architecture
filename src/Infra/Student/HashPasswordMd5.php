<?php

namespace Devcapu\Arquitetura\Infra\Student;

use Devcapu\Arquitetura\Domain\Student\PasswordHasher;

class HashPasswordMd5 implements PasswordHasher
{
    public function hash(string $password): string
    {
        return md5($password);
    }

    public function verify(string $plainPassword, string $hashedPassword): bool
    {
        return md5($plainPassword) === $hashedPassword;
    }
}