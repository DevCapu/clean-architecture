<?php

namespace Devcapu\Arquitetura\Testes\Application;

use Devcapu\Arquitetura\Academic\Application\Indication\SendNewIndicationEmail;
use Devcapu\Arquitetura\Academic\Domain\CPF;
use Devcapu\Arquitetura\Academic\Domain\Email;
use Devcapu\Arquitetura\Academic\Domain\Student\Student;
use PHPUnit\Framework\TestCase;

class SendNewIndicationEmailTest extends TestCase
{
    public function testShouldSendEmail(): void
    {
        $student = Student::withCpfNameAndEmail(
            new CPF('491.215.308-74'),
            'Felipe Moreno Borges',
            new Email('felipe.b2014@gmail.com')
        );
        $sendNewIndicationEmail = new SendNewIndicationEmail();
        $emailWasSended = $sendNewIndicationEmail->sendTo($student);

        self::assertFalse($emailWasSended);
    }
}