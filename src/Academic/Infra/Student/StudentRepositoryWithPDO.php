<?php

namespace Devcapu\Arquitetura\Infra\Student;

use Devcapu\Arquitetura\Academic\Domain\CPF;
use Devcapu\Arquitetura\Academic\Domain\Student\Student;
use Devcapu\Arquitetura\Academic\Domain\Student\StudentRepository;
use PDO;

class StudentRepositoryWithPDO implements StudentRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function add(Student $student): void
    {
        $query = 'INSERT INTO students VALUES (:cpf, :name, :email);';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue('cpf', (string)$student->cpf());
        $stmt->bindValue('name', $student->name());
        $stmt->bindValue('email', (string)$student->email());
        $stmt->execute();

        $query = 'INSERT INTO phones VALUES (:ddd, :number, :cpf_student);';
        $stmt = $this->connection->prepare($query);
        foreach ($student->phones() as $phone) {
            $query = 'INSERT INTO phones VALUES (:ddd, :number, :cpf_student);';
            $stmt = $this->connection->prepare($query);
            $stmt->bindValue('ddd', $phone->ddd());
            $stmt->bindValue('number', $phone->number());
            $stmt->bindValue('cpf_student', $student->cpf());
            $stmt->execute();
        }
    }

    public function searchByCpf(CPF $cpf): Student
    {
        $query = 'SELECT cpf, name, email FROM students WHERE students.cpf = :cpf';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue('cpf', (string)$cpf);
        $stmt->execute();
        $foundStudent = $stmt->fetch();
        $student = Student::withCpfNameAndEmail($foundStudent['cpf'], $foundStudent['name'], $foundStudent['email']);
        $student = $this->addStudentPhones($cpf, $student);

        return $student;
    }

    public function all(): array
    {
        $query = 'SELECT cpf, name, email FROM students';
        $stmt = $this->connection->query($query);
        $stmt->execute();
        $foundStudents = $stmt->fetchAll();

        $students = [];
        foreach ($foundStudents as $foundStudent) {
            $student = Student::withCpfNameAndEmail($foundStudent['cpf'], $foundStudent['name'], $foundStudent['email']);
            $student = $this->addStudentPhones($foundStudent['cpf'], $student);
            $students[] = $student;
        }
        return $students;
    }

    private function addStudentPhones(CPF $cpf, Student $student): Student
    {
        $query = 'SELECT ddd, number, cpf_student from phones WHERE phones.cpf_student = :cpf';
        $stmt = $this->connection->prepare($query);
        $stmt->bindValue('cpf', $cpf);
        $stmt->execute();
        $foundPhones = $stmt->fetchAll();

        foreach ($foundPhones as $phone) {
            $student->addPhone($phone['ddd'], $phone['number']);
        }

        return $student;
    }
}