<?php

namespace App\Controller;

use App\Service\ApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AnalysisController extends AbstractController
{
    #[Route('/analysis', name: 'app_analysis')]
    public function index(): Response
    {
        return $this->render('analysis/index.html.twig');
    }

    #[Route('/analysis/test', name: 'app_analysis_test')]
    public function test(ApiService $apiService): Response
    {
        $message = $apiService->getHello();

        return $this->render('analysis/test.html.twig', ['message' => $message]);
    }

}
