<?php

namespace Devcapu\Arquitetura;

use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testEmailInvalidCannotBeAccepted()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Email('Alguemail');
    }

    public function testValidEmailShouldBeAccepted()
    {
        $email = new Email('exemplo@provedor.com');
        self::assertEquals('exemplo@provedor.com', (string)$email);
    }
}
