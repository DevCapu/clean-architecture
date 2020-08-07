<?php

namespace Devcapu\Arquitetura;

use Devcapu\Arquitetura\Academic\Domain\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testEmailInvalidCannotBeAccepted(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        new Email('Alguemail');
    }

    public function testValidEmailShouldBeAccepted(): void
    {
        $email = new Email('exemplo@provedor.com');
        self::assertEquals('exemplo@provedor.com', (string)$email);
    }
}
