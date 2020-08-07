<?php


namespace Devcapu\Arquitetura\Gamification\Domain\Badge;

use Devcapu\Arquitetura\Academic\Domain\CPF;

interface BadgeRepository
{
    public function add(Badge $badge);

    public function findStudentBadges(CPF $cpf);
}