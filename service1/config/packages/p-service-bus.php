<?php

declare(strict_types=1);

use GDXbsv\PServiceBus\Transport\InMemoryTransport;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->extension(
        'p_service_bus',
        [
            'transports' => [
                'memory' => InMemoryTransport::class
            ],
        ]
    );
};
