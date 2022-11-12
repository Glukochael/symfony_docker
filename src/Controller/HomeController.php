<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/home/{id}', name: 'home', methods: ['POST'])]
    public function home(Request $request): JsonResponse
    {
        $fuckYou = $request->toArray()['name'];

        return new JsonResponse(compact('fuckYou'));
    }
}