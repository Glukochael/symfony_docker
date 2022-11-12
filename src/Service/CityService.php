<?php

declare(strict_types=1);

namespace App\Service;

use App\Entity\City;
use App\Repository\CityRepository;

class CityService
{
    public function __construct(
        private CityRepository $cityRepository
    ) {}

    /**
     * @param string[] $citySlugs
     */
    public function getCityBySlugs(array $citySlugs): array
    {
        $cities = $this->cityRepository->findBy([
            'slug' => $citySlugs
        ]);

        return array_map(fn(City $city) => [
            'id' => $city->getId(),
            'title' => $city->getTitle(),
            'slug' => $city->getSlug(),
            'code' => $city->getCode(),
        ], $cities);
    }

}