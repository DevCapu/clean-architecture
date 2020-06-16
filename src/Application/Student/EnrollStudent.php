<?php

namespace Devcapu\Arquitetura\Application\Student;

use Devcapu\Arquitetura\Domain\Student\Student;
use Devcapu\Arquitetura\Domain\Student\StudentRepository;

class EnrollStudent
{
    private StudentRepository $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function execute(EnrollStudentDto $studentDto): void
    {
        $student = Student::withCpfNameAndEmail(
            $studentDto->getStudentCpf(),
            $studentDto->getStudentName(),
            $studentDto->getStudentEmail());
        $this->studentRepository->add($student);
    }
}