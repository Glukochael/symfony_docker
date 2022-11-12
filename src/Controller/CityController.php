<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\CityService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CityController extends AbstractController
{
    public function __construct(
        private CityService $cityService
    ) {}

    #[Route('/city', methods: ['POST'])]
    public function findCitiesBySlugs(Request $request): JsonResponse
    {
        if (!$slugs = $request->toArray()['citySlugs'] ?? []) {
            return new JsonResponse([]);
        }

        return new JsonResponse($this->cityService->getCityBySlugs($slugs));
    }
}
