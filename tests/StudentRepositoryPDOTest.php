<?php

namespace Devcapu\Arquitetura\Testes;

use Devcapu\Arquitetura\Academic\Domain\CPF;
use Devcapu\Arquitetura\Academic\Domain\Student\Student;
use Devcapu\Arquitetura\Infra\Student\StudentRepositoryWithPDO;
use PDO;
use PHPUnit\Framework\TestCase;

class StudentRepositoryPDOTest extends TestCase
{

    public function testCanSaveNewStudent(): void
    {
        $pdo = new PDO("sqlite:" . __DIR__ . "/../database.sqlite");
        $repository = new StudentRepositoryWithPDO($pdo);

        $createdStudent = Student::withCpfNameAndEmail(
            '491.215.308-74',
            'Felipe Moreno Borges',
            'felipe.b2014@gmail.com'
        );

        $repository->add($createdStudent);
        $student = $repository->searchByCpf(new CPF('491.215.308-74'));
        self::assertEquals($createdStudent, $student);
    }
}