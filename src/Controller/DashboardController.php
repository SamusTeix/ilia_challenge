<?php

namespace App\Controller;

use App\Form\CardFilterType;
use App\Helper\Helper;
use App\Service\DashboardService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DashboardController extends AbstractController
{
    private Request $request;

    /**
     * __construct
     *
     * @param  mixed $service
     * @return void
     */
    public function __construct(
        private readonly DashboardService $service,
        private readonly RequestStack $requestStack
    ) {
        $this->request = $requestStack->getCurrentRequest();
    }

    /**
     * index
     *
     * @return Response
     */
    #[Route('/')]
    public function index(): Response
    {
        $form = $this->createForm(CardFilterType::class);
        $form->handleRequest($this->request);

        try {
            $data = $this->service->index();
            
            return $this->render('dashboard/index.html.twig', [
                'items' => $data['items'],
                'pagination' => Helper::createPaginator($data['pagination'], $this->request),
                'filterForm' => $form->createView(),
                'totalCount' => $data['pagination']['totalCount'],
            ]);
        } catch (\Exception $e) {
            $this->addFlash('danger', 'Erro ao carregar lista de cards');
            
            return $this->render('dashboard/index.html.twig', [
                'items' => [],
                'pagination' => [],
                'filterForm' => $form->createView(),
                'totalCount' => 0,
            ]);
        }

        
    }
}
