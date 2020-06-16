<?php

namespace Devcapu\Arquitetura\Domain\Student;

class Phone
{
    private string $ddd;
    private string $number;

    public function __construct(string $ddd, string $number)
    {
        $this->setDDD($ddd);
        $this->setNumber($number);
    }

    public function ddd(): string
    {
        return $this->ddd;
    }

    public function number(): string
    {
        return $this->number;
    }

    public function setDDD(string $ddd): void
    {
        if (preg_match('/\d{2}/', $ddd) !== 1) {
            throw new \InvalidArgumentException('DDD is invalid');
        }
        $this->ddd = $ddd;
    }

    public function setNumber(string $number): void
    {
        if (preg_match('/\d{8,9}/', $number) !== 1) {
            throw new \InvalidArgumentException('Number is invalid');
        }
        $this->number = $number;
    }

    public function __toString(): string
    {
        return $this->ddd . $this->number;
    }
}