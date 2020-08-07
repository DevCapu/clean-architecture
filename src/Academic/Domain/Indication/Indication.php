<?php


namespace Devcapu\Arquitetura\Academic\Domain\Indication;

use Devcapu\Arquitetura\Academic\Domain\Student\Student;

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

    /**
     * @return Student
     */
    public function getHasIndicated(): Student
    {
        return $this->hasIndicated;
    }

    /**
     * @return Student
     */
    public function getIndicated(): Student
    {
        return $this->indicated;
    }
}