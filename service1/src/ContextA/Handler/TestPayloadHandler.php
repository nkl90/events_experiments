<?php

declare(strict_types=1);


namespace App\ContextA\Handler;

use App\ContextS\EventHandlerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use App\ContextS\DomainEventInterface;

class TestPayloadHandler implements EventHandlerInterface, MessageHandlerInterface
{
    public function __invoke(DomainEventInterface $payload):void
    {
        dump(sprintf('Start worker from %s', __NAMESPACE__));
        dump(
            sprintf('Actor of this event: %s. Published at: %s',
            $payload->getActor()->getEmail(),
            $payload->getPublishedAt()->format('Y-m-d H:i:s')
            )
        );
        dump(sprintf('Complete worker from %s', __NAMESPACE__));
    }
}