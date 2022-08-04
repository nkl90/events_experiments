<?php

declare(strict_types=1);


namespace App\Controller;

use App\ContextA\Message\TestPayload;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class DefaultController extends AbstractController
{
    public function __construct(
        private readonly MessageBusInterface $bus
    ) {
    }

    #[Route('/', name: 'app_service_index', methods: ['GET'])]
    public function actionIndex(): Response
    {
        $payload = [
            new TestPayload([
                'name' => 'Joe',
                'lastName' => 'Doe'
            ]),
            new TestPayload([
                'name' => 'Joe1',
                'lastName' => 'Doe2'
            ]),
            new TestPayload([
                'name' => 'Joe3',
                'lastName' => 'Doe4',
                '121' => 'Joe3',
                '1244' => 'Doe4'
            ])
        ];
        foreach($payload as $item) {
            $this->bus->dispatch($item);
        }

        return $this->render('default/index.html.twig');
    }
}