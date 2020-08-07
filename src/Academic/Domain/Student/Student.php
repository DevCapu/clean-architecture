<?php

namespace Devcapu\Arquitetura\Academic\Domain\Student;

use Devcapu\Arquitetura\Academic\Domain\CPF;
use Devcapu\Arquitetura\Academic\Domain\Email;
use DomainException;

class Student
{
    const MAX_PHONE_NUMBERS_PER_STUDENT = 2;
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
        $this->phones = [];
    }

    public function addPhone(string $ddd, string $number): self
    {
        self::MAX_PHONE_NUMBERS_PER_STUDENT;
        if (count($this->phones) === self::MAX_PHONE_NUMBERS_PER_STUDENT) {
            throw new DomainException('Student already have 2 cellphone numbers');
        }
        $this->phones[] = new Phone($ddd, $number);
        return $this;
    }

    public function cpf(): CPF
    {
        return $this->cpf;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    /**@return Phone[] */
    public function phones(): array
    {
        return $this->phones;
    }
}