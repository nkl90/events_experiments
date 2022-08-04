<?php

declare(strict_types=1);


namespace App\ContextA;

use App\ContextS\ActorInterface;

class StubActor implements ActorInterface
{

    public function getEmail(): string
    {
        return 'stub@mail.ru';
    }
}