<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class ApiController extends AbstractController
{
    #[Route('/api/statistics', name: 'app_api_statistics', methods: ['GET'])]
    public function statistics(): JsonResponse
    {
        return $this->json([
            'labels' => ['Januar', 'Februar', 'März', 'April'],
            'values' => [120, 180, 150, 240],
        ]);
    }

    #[Route('/api/hello', name: 'app_api_hello', methods: ['GET'])]
    public function hello(): JsonResponse
    {
        return $this->json([
            'labels' => ['Januar', 'Februar', 'März', 'April'],
            'values' => [120, 180, 150, 240],
        ]);
    }
}
