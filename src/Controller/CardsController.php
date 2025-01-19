<?php

namespace App\Controller;

use App\Service\CardsService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CardsController extends AbstractController
{
    public function __construct(private readonly CardsService $service) {}

    #[Route('/cards/{id}')]
    public function show($id): Response
    {
        try {
            $card = $this->service->show($id);

            return $this->render('cards/show.html.twig', ['item' => $card]);
        } catch (\Exception $e) {
            $this->addFlash('danger', 'Ocorreu um erro ao carregar o card.');

            return $this->redirectToRoute('app_dashboard_index');
        }
    }
}
