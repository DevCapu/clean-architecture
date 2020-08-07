<?php

namespace Devcapu\Arquitetura\Academic\Application\Student;

class EnrollStudentDto
{
    private string $studentCpf;
    private string $studentName;
    private string $studentEmail;

    public function __construct(string $studentCpf, string $studentName, string $studentEmail)
    {
        $this->studentCpf = $studentCpf;
        $this->studentName = $studentName;
        $this->studentEmail = $studentEmail;
    }

    public function getStudentCPF(): string
    {
        return $this->studentCpf;
    }

    public function getStudentName(): string
    {
        return $this->studentName;
    }

    public function getStudentEmail(): string
    {
        return $this->studentEmail;
    }
}