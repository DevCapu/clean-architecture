<?php

namespace Devcapu\Arquitetura\Infra\Student;

use Devcapu\Arquitetura\Domain\CPF;
use Devcapu\Arquitetura\Domain\Student\Student;

class StudentRepositoryInMemory implements \Devcapu\Arquitetura\Domain\Student\StudentRepository
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
            throw new \Exception('Student not found');
        } else if (count($returnedStudents) > 0) {
            throw new \Exception('There are more than one student with this cpf');
        } else {
            return $returnedStudents[0];
        }
    }

    public function all(): array
    {
        return $this->students;
    }
}