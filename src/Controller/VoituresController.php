<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\VoitureRepository;
use App\Entity\Voiture;
use Doctrine\ORM\EntityManagerInterface;

final class VoituresController extends AbstractController
{
    #[Route('/', name: 'app_vehiloc_home')]
    public function index(VoitureRepository $repository): Response
    {
        // on récupère toutes les voitures de la base
        $voitures = $repository->findAll();

        return $this->render('accueil.html.twig', [
            'controller_name' => 'VoituresController',
            'voitures' => $voitures,
        ]);
    }

    #[Route('/voiture/{id}', name: 'app_vehiloc_show',methods: ['GET'],requirements:['id' =>'\d+'])]
    public function show(?Voiture $voiture): Response
    {
        // on récupère toutes les voitures de la base
        //$voitures = $repository->findAll();

        if (!$voiture)
        {
            return $this->redirectToRoute('app_vehiloc_home');    
        }
        return $this->render('voiture.html.twig', [
            'controller_name' => 'VoituresController',
            'voiture' => $voiture,
        ]);
    }

    #[Route('/voiture/{id}/supprimer', name: 'app_vehiloc_remove',methods: ['GET'],requirements:['id' =>'\d+'])]
    public function remove(?Voiture $voiture, EntityManagerInterface $manager): Response
    {
        // on récupère toutes les voitures de la base
        //$voitures = $repository->findAll();

        if (!$voiture)
        {
            return $this->redirectToRoute('app_vehiloc_home');    
        }

        $manager->remove($voiture);
        $manager->flush();

        return $this->redirectToRoute('app_vehiloc_home');
    }
}
