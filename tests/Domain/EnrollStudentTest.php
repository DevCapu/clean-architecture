<?php

namespace Devcapu\Arquitetura\Testes\Domain;

use Devcapu\Arquitetura\Application\Student\EnrollStudent;
use Devcapu\Arquitetura\Application\Student\EnrollStudentDto;
use Devcapu\Arquitetura\Domain\CPF;
use PHPUnit\Framework\TestCase;

class EnrollStudentTest extends TestCase
{
    public function testStudentShouldBeAddedAtRepository()
    {
        $studentData = new EnrollStudentDto(
            '491.215.308-74',
            'Felipe Moreno',
            'email@example.com'
        );

        $studentRepository = new StudentRepositoryInMemory();
        $useCase = new EnrollStudent($studentRepository);
        $useCase->execute($studentData);


        $student = $studentRepository->searchByCpf(new CPF('491.215.308-74'));
        $this->assertSame('Felipe Moreno Borges', (string)$student->name());
        $this->assertSame('email@example.com', (string)$student->emaill());
        $this->assertEmpty($student->phones());
    }
}