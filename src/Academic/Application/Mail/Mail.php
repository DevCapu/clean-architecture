<?php

namespace Devcapu\Arquitetura\Academic\Application\Mail;

use Devcapu\Arquitetura\Academic\Domain\Email;
use InvalidArgumentException;

abstract class Mail
{
    protected string $subject;
    protected string $message;
    /**@var Email[] $addresses */
    protected array $addresses;
    protected array $cc;
    protected array $cco;

    /**
     * Mail constructor.
     * @param string $subject
     * @param string $message
     * @param Email[] $addresses
     * @param array $cc
     * @param array $cco
     */
    public function __construct(string $subject, string $message, $addresses, array $cc = [], array $cco = [])
    {
        if (count($addresses) === 0) {
            throw new InvalidArgumentException('Addresses needs to at least on email address');
        }
        $this->subject = $subject;
        $this->message = $message;
        $this->addresses = $addresses;
        $this->cc = $cc;
        $this->cco = $cco;
    }

    final protected function addAddress(Email $address): void
    {
        $this->addresses[] = $address;
    }

    final protected function addCc(Email $address): void
    {
        $this->cc[] = $address;
    }

    final protected function addCco(Email $address): void
    {
        $this->cco[] = $address;
    }

}