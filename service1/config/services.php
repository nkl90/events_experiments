<?php

declare(strict_types=1);

use GDXbsv\PServiceBus\Bus;
use GDXbsv\PServiceBus\Bus\ConsumeBus;
use GDXbsv\PServiceBus\Bus\CoroutineBus;
use GDXbsv\PServiceBus\Bus\ServiceBus;
use GDXbsv\PServiceBus\Bus\TraceableBus;
use GDXbsv\PServiceBus\Transport\InMemoryTransport;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services->defaults()
        ->autowire()
        ->autoconfigure();

    $services
        ->load('GDXbsv\\PServiceBusTestApp\\', __DIR__ . '/../../vendor/gdx/p-service-bus/TestApp')
        ->exclude(
            [
                __DIR__ . '/../../vendor/gdx/p-service-bus/TestApp/bootstrap.php',
                __DIR__ . '/../../vendor/gdx/p-service-bus/TestApp/Saga/CustomDoctrineSagaFinder.php'
            ]
        );

    $services->set(InMemoryTransport::class);
    $services->set(TraceableBus::class)
        ->decorate(Bus::class)
        ->decorate(CoroutineBus::class)
        ->decorate(ConsumeBus::class)
        ->args(
            [
                service(ServiceBus::class),
                service(ServiceBus::class),
                service(ServiceBus::class),
            ]
        );
};


