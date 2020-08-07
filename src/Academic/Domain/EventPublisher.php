<?php

namespace Devcapu\Arquitetura\Academic\Domain;

class EventPublisher
{
    private array $listeners = [];

    public function addListener(EventListener $listener): void
    {
        $this->listeners[] = $listener;
    }

    public function publish(Event $event)
    {
        foreach ($this->listeners as $listener) {
            $listener->process($event);
        }
    }
}