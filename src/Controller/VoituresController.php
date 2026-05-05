<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\VoitureRepository;

final class VoituresController extends AbstractController
{
    #[Route('/', name: 'app_vehiloc_accueil')]
    public function index(VoitureRepository $repository): Response
    {
        // on récupère toutes les voitures de la base
        $voitures = $repository->findAll();

        dump($voitures);
        return $this->render('accueil.html.twig', [
            'controller_name' => 'VoituresController',
            'voitures' => $voitures,
        ]);
    }
}
