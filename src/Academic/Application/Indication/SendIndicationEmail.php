<?php


namespace Devcapu\Arquitetura\Academic\Application\Indication;


use Devcapu\Arquitetura\Academic\Domain\Student\Student;

interface SendIndicationEmail
{
    public function sendTo(Student $indicatedStudent): bool ;
}