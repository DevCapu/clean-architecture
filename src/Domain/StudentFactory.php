<?php


namespace Devcapu\Arquitetura;


class StudentFactory
{
    private Student $student;

    public function withCpfEmailAndName(string $cpf, string $email, string $name): self
    {
        $this->student = new Student(new CPF($cpf), $name, new Email($email));
        return $this;
    }

    public function student(): Student
    {
        return $this->student;
    }

    public function addPhone(string $ddd, string $number): self
    {
        $this->student->addPhone($ddd, $number);
        return $this;
    }
}