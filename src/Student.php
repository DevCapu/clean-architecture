<?php

namespace Devcapu\Arquitetura;

class Student
{
    private CPF $cpf;
    private string $name;
    private Email $email;
    private array $phones;

    public function __construct(CPF $cpf, string $name, Email $email)
    {
        $this->cpf = $cpf;
        $this->name = $name;
        $this->email = $email;
    }

    public function addPhone(string $ddd, string $number)
    {
        $this->phones[] = new Phone($ddd, $number);
    }
}