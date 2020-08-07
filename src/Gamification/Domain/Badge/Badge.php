<?php

namespace Devcapu\Arquitetura\Gamification\Domain\Badge;

use Devcapu\Arquitetura\Academic\Domain\CPF;

class Badge
{
    private CPF $studentCPF;
    private string $name;

    public function __construct(CPF $studentCPF, string $name)
    {
        $this->studentCPF = $studentCPF;
        $this->name = $name;
    }

    public function studentCPF(): CPF
    {
        return $this->studentCPF;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}