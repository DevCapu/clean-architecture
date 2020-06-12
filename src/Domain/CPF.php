<?php

namespace Devcapu\Arquitetura\Domain;

use InvalidArgumentException;

class CPF
{
    private string $number;

    public function __construct(string $number)
    {
        $this->validate($number);
        $this->number = $number;
    }

    private function validate(string $number)
    {
        $options = [
            'options' => [
                'regexp' => '/\d{3}\.\d{3}\.\d{3}\-\d{2}/'
            ]
        ];

        if (filter_var($number, FILTER_VALIDATE_REGEXP, $options) === false) {
            throw new InvalidArgumentException('CPF is invalid');
        }
    }

    public function __toString()
    {
        return $this->number;
    }
}