<?php

namespace Devcapu\Arquitetura\Domain\Student;

interface PasswordHasher
{
    public function hash(string $password): string;

    public function verify(string $plainPassword, string $hashedPassword): bool;
}