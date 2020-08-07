<?php

namespace Devcapu\Arquitetura\Academic\Domain\Student;

use Devcapu\Arquitetura\Academic\Domain\CPF;

interface StudentRepository
{
    public function add(Student $student): void;

    public function searchByCpf(CPF $cpf): Student;

    /**@return Student[] */
    public function all(): array;
}