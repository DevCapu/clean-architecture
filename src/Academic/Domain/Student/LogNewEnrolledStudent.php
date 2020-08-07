<?php

namespace Devcapu\Arquitetura\Academic\Domain\Student;

use Devcapu\Arquitetura\Academic\Domain\Event;
use Devcapu\Arquitetura\Academic\Domain\EventListener;

class LogNewEnrolledStudent extends EventListener
{
    /**
     * @param StudentWasEnrolled $studentWasEnrolled
     */
    public function reactTo(Event $studentWasEnrolled): void
    {
        fprintf(STDERR,
            "Student with CPF %s was enrolled on date %s",
            (string)$studentWasEnrolled->getStudentCPF(),
            (string)$studentWasEnrolled->timestamp()
        );
    }

    public function knowHowToProcess(Event $event): bool
    {
        return $event instanceof StudentWasEnrolled;
    }
}