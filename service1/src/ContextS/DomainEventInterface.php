<?php

namespace App\ContextS;

interface DomainEventInterface
{
    public function getActor(): ActorInterface;

    public function getPublishedAt(): \DateTimeImmutable;

    public function getEvent(): array;
}
