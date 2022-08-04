<?php

declare(strict_types=1);


namespace App\ContextB\Handler;

use App\ContextS\DomainEventInterface;
use App\ContextS\EventHandlerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class TestPayloadHandler implements EventHandlerInterface, MessageHandlerInterface
{
    public function __invoke(DomainEventInterface $payload): void
    {
        dump(sprintf('Start worker from %s', __NAMESPACE__));
        dump('Process a payload...');
        dump(sprintf('Complete worker from %s', __NAMESPACE__));
    }
}