<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CityRepository;

#[ORM\Entity(repositoryClass: CityRepository::class)]
class City
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private string $title;

    #[ORM\Column]
    private string $slug;

    #[ORM\Column]
    private string $code;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    public function getCode(): string
    {
        return $this->code;
    }

}