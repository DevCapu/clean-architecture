<?php

namespace Devcapu\Arquitetura\Infra\Student;

use Devcapu\Arquitetura\Academic\Domain\CPF;
use Devcapu\Arquitetura\Academic\Domain\Student\Student;
use Devcapu\Arquitetura\Academic\Domain\Student\StudentRepository;
use Exception;

class StudentRepositoryInMemory implements StudentRepository
{

    private array $students = [];

    public function add(Student $student): void
    {
        $this->students[] = $student;
    }

    public function searchByCpf(CPF $cpf): Student
    {
        $returnedStudents = array_filter($this->students, fn(Student $student) => $student->cpf() == $cpf);

        if (count($returnedStudents) === 0) {
            throw new Exception('Student not found');
        }

        if (count($returnedStudents) > 1) {
            throw new Exception('There are more than one student with this cpf');
        }

        return $returnedStudents[0];
    }

    public function all(): array
    {
        return $this->students;
    }
}