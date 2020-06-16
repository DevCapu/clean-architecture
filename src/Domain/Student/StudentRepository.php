<?php

namespace Devcapu\Arquitetura\Domain\Student;

use Devcapu\Arquitetura\Domain\CPF;

interface StudentRepository
{
    public function add(Student $student): void;

    public function searchByCpf(CPF $cpf): Student;

    /**@return Student[] */
    public function all(): array;
}