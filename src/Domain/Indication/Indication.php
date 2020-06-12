<?php


namespace Devcapu\Arquitetura\Domain\Indication;


use Devcapu\Arquitetura\Domain\Student\Student;

class Indication
{
    private Student $hasIndicated;
    private Student $indicated;
    private \DateTimeImmutable $date;

    public function __construct(Student $hasIndicated, Student $indicated)
    {
        $this->hasIndicated = $hasIndicated;
        $this->indicated = $indicated;
        $this->date = new \DateTimeImmutable();
    }
}