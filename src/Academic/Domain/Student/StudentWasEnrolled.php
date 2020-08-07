<?php

namespace Devcapu\Arquitetura\Academic\Domain\Student;

use DateTimeImmutable;
use Devcapu\Arquitetura\Academic\Domain\CPF;
use Devcapu\Arquitetura\Academic\Domain\Event;

class StudentWasEnrolled implements Event
{

    private DateTimeImmutable $timestamp;
    private CPF $studentCPF;

    public function __construct(CPF $studentCPF)
    {
        $this->timestamp = new DateTimeImmutable();
        $this->studentCPF = $studentCPF;
    }

    public function getStudentCPF(): CPF
    {
        return $this->studentCPF;
    }

    public function timestamp(): DateTimeImmutable
    {
        return $this->timestamp;
    }
}