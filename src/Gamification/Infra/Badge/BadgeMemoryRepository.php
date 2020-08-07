<?php

namespace Devcapu\Arquitetura\Gamification\Infra\Badge;

use Devcapu\Arquitetura\Academic\Domain\CPF;
use Devcapu\Arquitetura\Gamification\Domain\Badge\Badge;
use Devcapu\Arquitetura\Gamification\Domain\Badge\BadgeRepository;

class BadgeMemoryRepository implements BadgeRepository
{

    private array $badges = [];

    public function add(Badge $badge)
    {
        $this->badges[] = $badge;
    }

    public function findStudentBadges(CPF $cpf): array
    {
        return array_filter($this->badges, fn(Badge $badge) => $badge->studentCPF() === $cpf);
    }
}