<?php


namespace Devcapu\Arquitetura;


use http\Exception\InvalidArgumentException;

class Email
{
    private string $address;

    public function __construct(string $address)
    {
        if (filter_var($address, FILTER_VALIDATE_EMAIL) === false) {
            throw new InvalidArgumentException("Email address invalid");
        }
        $this->address = $address;
    }

    public function __toString(): string
    {
        return $this->address;
    }
}