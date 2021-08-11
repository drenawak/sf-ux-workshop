<?php

namespace App\Controller;

use App\Repository\AvengerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvengerController extends AbstractController
{
    private AvengerRepository $avengerRepository;

    public function __construct(AvengerRepository $avengerRepository)
    {
        $this->avengerRepository = $avengerRepository;
    }

    #[Route('/avengers', name: 'avengers')]
    public function list(): Response
    {
        $avengers = $this->avengerRepository->findAll();
        $favoriteAvenger = $this->avengerRepository->findAll(["votesCount" => "DESC"])[0];

        return $this->render('avenger/list.html.twig', [
            'avengers' => $avengers,
            'favoriteAvenger' => $favoriteAvenger,
        ]);
    }
}
