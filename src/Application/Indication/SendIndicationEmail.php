<?php


namespace Devcapu\Arquitetura\Application\Indication;


use Devcapu\Arquitetura\Domain\Student\Student;

interface SendIndicationEmail
{
    public function sendTo(Student $indicatedStudent): void;
}