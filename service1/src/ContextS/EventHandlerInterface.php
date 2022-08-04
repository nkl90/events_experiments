<?php

declare(strict_types=1);

namespace App\ContextS;

interface EventHandlerInterface
{
    public function __invoke(DomainEventInterface $event): void;
}
