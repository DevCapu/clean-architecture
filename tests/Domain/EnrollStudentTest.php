<?php

namespace Devcapu\Arquitetura\Testes\Domain;

use Devcapu\Arquitetura\Academic\Application\Student\EnrollStudent;
use Devcapu\Arquitetura\Academic\Application\Student\EnrollStudentDto;
use Devcapu\Arquitetura\Academic\Domain\CPF;
use Devcapu\Arquitetura\Infra\Student\StudentRepositoryInMemory;
use PHPUnit\Framework\TestCase;

class EnrollStudentTest extends TestCase
{
    public function testStudentShouldBeAddedAtRepository()
    {
        $studentData = new EnrollStudentDto(
            '491.215.308-74',
            'Felipe Moreno Borges',
            'email@example.com'
        );

        $studentRepository = new StudentRepositoryInMemory();
        $useCase = new EnrollStudent($studentRepository);
        $useCase->execute($studentData);


        $student = $studentRepository->searchByCpf(new CPF('491.215.308-74'));
        $this->assertSame('Felipe Moreno Borges', $student->name());
        $this->assertSame('email@example.com', $student->email());
        $this->assertEmpty($student->phones());
    }
}