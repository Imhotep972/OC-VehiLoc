<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\VoitureRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Voiture;
use App\Form\VoitureType;

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
        if (!$voiture)
        { // la voiture n'existe pas
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
        if (!$voiture)
        { // la voiture n'existe pas
            return $this->redirectToRoute('app_vehiloc_home');    
        }

        // on efface la voiture de la base de donnee
        $manager->remove($voiture);
        $manager->flush();

        return $this->redirectToRoute('app_vehiloc_home');
    }

    #[Route('/voiture/ajouter', name: 'app_vehiloc_add',methods: ['GET','POST'])]
    public function add(?Voiture $voiture, EntityManagerInterface $manager,Request $request): Response
    {
        // on cree une nouvelle voiture
        $voiture ??= new Voiture();
        // on cree le formulaire associe
        $form = $this->createForm(VoitureType::class, $voiture);
        // on gère le retour
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            // si tout s'est bien passé on enregistre dans la base de donnée
            $manager->persist($voiture);
            $manager->flush();

            // on redirige vers la page voiture creee
            return $this->redirectToRoute('app_vehiloc_show',[
                'id' => $voiture->getId(),
            ]);
        }

        // affichage du formulaire
        return $this->render('nouvelle-voiture.html.twig', [
            'controller_name' => 'VoituresController',
            'form' => $form,
        ]);
    }


}
