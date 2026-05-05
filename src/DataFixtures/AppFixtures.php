<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Voiture;
use App\Enum\BoiteVitesse;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $manuelle = BoiteVitesse::Manuelle;
        $automatique = BoiteVitesse::Automatique;

        // Création des voitures
        $voiture1 = new Voiture();
        $voiture1->setName('Renault Twingo')
                 ->setDescription('Virum enixius et suscipieris vidisse visus haec ante coactusque interrogatus tamquam salutatum et ob exoptatus.')
                 ->setPrixJournalier(39.14)
                 ->setPrixMensuel(900)
                 ->setNombrePlace(4)
                 ->setBoiteVitesse($manuelle);
        $manager->persist($voiture1);

        $voiture2 = new Voiture();
        $voiture2->setName('Renault Clio')
                 ->setDescription('Victoriam victoriam factum salutis animus aut fecit increpuisset ad ad insontium et fecit et quassari factum et existimans aegrum victoriam.')
                 ->setPrixJournalier(38.64)
                 ->setPrixMensuel(850)
                 ->setNombrePlace(5)
                 ->setBoiteVitesse($manuelle);
        $manager->persist($voiture2);

        $voiture3 = new Voiture();
        $voiture3->setName('BMW IX (Electrique)')
                 ->setDescription("BMW est connu pour ses voitures puissantes et luxueuses - la BMW iX ne fait pas exception. Avec une puissance allant de 326 ch (BMW iX 40) à 523 ch (BMW iX 50) et une autonomie de 408 (BMW iX 40) à 590 kilomètres (BMW iX 50), la BMW iX offre tout ce que l'on peut attendre d'une voiture électrique.")
                 ->setPrixJournalier(42.40)
                 ->setPrixMensuel(950)
                 ->setNombrePlace(5)
                 ->setBoiteVitesse($automatique);
        $manager->persist($voiture3);

        $voiture4 = new Voiture();
        $voiture4->setName('Renault Zoé (Electrique)')
                 ->setDescription("Suspendere prope Rauracum ritu convolantibus nimia supercilia navium Rauracum videretur supercilia cum nive ambigebat Alamanna fluminis magnis et resistente ritu.")
                 ->setPrixJournalier(39.14)
                 ->setPrixMensuel(900)
                 ->setNombrePlace(4)
                 ->setBoiteVitesse($automatique);
        $manager->persist($voiture4);

        $voiture5 = new Voiture();
        $voiture5->setName('Citroen Ami (Electrique)')
                 ->setDescription("Quotquot otiosae nomen quotquot populique populique per suscipitur circumspectum otiosae partes suffragiorum olim regina reverenda suffragiorum circumspectum populique Romani canities.")
                 ->setPrixJournalier(28.59)
                 ->setPrixMensuel(799)
                 ->setNombrePlace(2)
                 ->setBoiteVitesse($automatique);
        $manager->persist($voiture5);

        $voiture6 = new Voiture();
        $voiture6->setName('Opel Corsa')
                 ->setDescription("Necessario omne ingenium defensione recensere turbidum non lituis et saeviebat defensione dicerentur et necessario bonorum oportunum cum necessario discessit bella.")
                 ->setPrixJournalier(36.38)
                 ->setPrixMensuel(820)
                 ->setNombrePlace(5)
                 ->setBoiteVitesse($manuelle);
        $manager->persist($voiture6);


        $manager->flush();
    }
}
