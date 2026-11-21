<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class ApiController extends AbstractController
{
    #[Route('/api/statistics', methods: ['GET'])]
    public function statistics(): JsonResponse
    {
        return $this->json([
            'labels' => ['Januar', 'Februar', 'März', 'April'],
            'values' => [120, 180, 150, 240],
        ]);
    }
}
