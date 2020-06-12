<?php


namespace Devcapu\Arquitetura;


class Indication
{
    private Student $hasIndicated;
    private Student $indicated;

    public function __construct(Student $hasIndicated, Student $indicated)
    {
        $this->hasIndicated = $hasIndicated;
        $this->indicated = $indicated;
    }
}