<?php

namespace Devcapu\Arquitetura\Academic\Application\Mail;

use Devcapu\Arquitetura\Academic\Domain\Indication\Indication;

class NewIndicationEmail extends Mail
{
    public function __construct(Indication $indication)
    {
        parent::__construct(
            'Bem vindo! Ouvimos falar muito bem de você',
            "Olá {$indication->getIndicated()->name()} ficamos felizes quando o {$indication->getHasIndicated()->name()} nos falou sobre você, que tal comerçar sua jornada com a gente?",
            [$indication->getIndicated()->email()]);
    }
}