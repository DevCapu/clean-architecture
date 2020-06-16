<?php

namespace Devcapu\Arquitetura\Application\Student;

class EnrollStudentDto
{
    private string $studentCpf;
    private string $studentName;
    private string $studentEmail;

    /**
     * EnrollStudentDto constructor.
     * @param string $studentCpf
     * @param string $studentName
     * @param string $studentEmail
     */
    public function __construct(string $studentCpf, string $studentName, string $studentEmail)
    {
        $this->studentCpf = $studentCpf;
        $this->studentName = $studentName;
        $this->studentEmail = $studentEmail;
    }

    /**
     * @return string
     */
    public function getStudentCpf(): string
    {
        return $this->studentCpf;
    }

    /**
     * @return string
     */
    public function getStudentName(): string
    {
        return $this->studentName;
    }

    /**
     * @return string
     */
    public function getStudentEmail(): string
    {
        return $this->studentEmail;
    }


}