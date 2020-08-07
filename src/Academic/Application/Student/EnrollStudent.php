<?php

namespace Devcapu\Arquitetura\Academic\Application\Student;


use Devcapu\Arquitetura\Academic\Domain\EventPublisher;
use Devcapu\Arquitetura\Academic\Domain\Student\LogNewEnrolledStudent;
use Devcapu\Arquitetura\Academic\Domain\Student\Student;
use Devcapu\Arquitetura\Academic\Domain\Student\StudentRepository;
use Devcapu\Arquitetura\Academic\Domain\Student\StudentWasEnrolled;

class EnrollStudent
{
    private StudentRepository $studentRepository;
    private EventPublisher $publisher;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
        $this->publisher = new EventPublisher();
        $this->publisher->addListener(new LogNewEnrolledStudent());
    }

    public function execute(EnrollStudentDto $studentDto): void
    {
        $student = Student::withCpfNameAndEmail(
            $studentDto->getStudentCPF(),
            $studentDto->getStudentName(),
            $studentDto->getStudentEmail());
        $this->studentRepository->add($student);

        $event = new StudentWasEnrolled($student->cpf());
        $this->publisher->publish($event);
    }
}