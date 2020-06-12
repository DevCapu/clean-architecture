<?php

namespace Devcapu\Arquitetura\Student;

use Devcapu\Arquitetura\CPF;
use Devcapu\Arquitetura\Email;

class Student
{
    private CPF $cpf;
    private string $name;
    private Email $email;
    private array $phones;

    public static function withCpfNameAndEmail(string $cpf, string $name, string $email): self
    {
        return new Student(new CPF($cpf), $name, new Email($email));
    }

    public function __construct(CPF $cpf, string $name, Email $email)
    {
        $this->cpf = $cpf;
        $this->name = $name;
        $this->email = $email;
    }

    public function addPhone(string $ddd, string $number): self
    {
        $this->phones[] = new Phone($ddd, $number);
        return $this;
    }
}