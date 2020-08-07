<?php


namespace Devcapu\Arquitetura;


use Devcapu\Arquitetura\Academic\Domain\CPF;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    public function testInvalidCpfShouldNotAccepted()
    {
        $this->expectException(InvalidArgumentException::class);
        new CPF('452.958.54455');
    }

    public function testValidCpfShouldBeAccepted()
    {
        self::assertEquals('452.958.544-55', (string)new CPF('452.958.544-55'));
    }
}