<?php

declare(strict_types=1);


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/')]
class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_service_index', methods: ['GET'])]
    public function actionIndex(): Response
    {
        return $this->render('default/index.html.twig');
    }
}