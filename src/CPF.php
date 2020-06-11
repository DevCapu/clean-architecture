<?php


namespace Devcapu\Arquitetura;


class CPF
{
    private string $number;

    public function __construct(string $number)
    {
        if ($this->validate($number) === false) {
            throw new \InvalidArgumentException('CPF is invalid');
        }
        $this->number = $number;
    }

    /**
     * @param string $number
     * @return bool
     */
    private function validate(string $number): bool
    {
        $cpf = preg_replace('/[^0-9]/is', '', $number);

        if (strlen($cpf) != 11) {
            return false;
        } else if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    public function __toString()
    {
        return $this->number;
    }
}