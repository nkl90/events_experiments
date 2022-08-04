<?php

declare(strict_types=1);


namespace App\ContextA\Message;

use App\ContextA\StubActor;
use App\ContextS\ActorInterface;
use App\ContextS\DomainEventInterface;

class TestEvent implements DomainEventInterface
{
    private \DateTimeImmutable $publishedAt;

    public function __construct(
        private readonly array $data
    ) {
        $this->publishedAt = new \DateTimeImmutable('now');
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getActor(): ActorInterface
    {
        return new StubActor();
    }

    public function getPublishedAt(): \DateTimeImmutable
    {
        return $this->publishedAt;
    }
}