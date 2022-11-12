<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\CityService;
use App\Service\ShopService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{
    public function __construct(
        private ShopService $shopService,
        private CityService $cityService
    ) {}
    #[Route('/shops/{id}', name: 'getShopsFromSlugs', methods: ['POST'])]
    public function getShopsFromSlugs(Request $request): JsonResponse
    {
        if (!$slugs = $request->toArray()['citySlugs'] ?? []) {
            return new JsonResponse([]);
        }
        $cities = $this->cityService->getCityBySlugs($slugs);

        $cities = (array_map(fn(array $city) => [
            $city["slug"] => $this->shopService->getShopsByCode([$city["code"]])
        ], $this->cityService->getCityBySlugs($slugs)));
        return new JsonResponse($cities);
    }
}