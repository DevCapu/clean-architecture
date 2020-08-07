<?php

namespace Devcapu\Arquitetura\Academic\Domain;


use DateTimeImmutable;

interface Event
{
    public function timestamp(): DateTimeImmutable;
}