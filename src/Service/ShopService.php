<?php

declare(strict_types=1);

namespace App\Service;

use App\Repository\ShopRepository;
use App\Entity\Shop;

class ShopService
{
    public function __construct(
        private ShopRepository $shopRepository
    ) {}

    /**
     * @param string[] $cityCods
     */
    public function getShopsByCode(array $cityCods): array
    {
        $shops = $this->shopRepository->findBy([
            'cityCode' => $cityCods
        ]);

        return array_map(fn(Shop $shop) => [
            'id' => $shop->getId(),
            'title' => $shop->getTitle(),
            'cityCode' => $cityCods
        ], $shops);

    }
}