<?php
namespace App\DataFixtures;

use App\Entity\Evenement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
//use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class EvenementFixtures extends Fixture
{
    /**
     * Création initiale des événements
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager) : void
    {
        $event1 = new Evenement();
        $date1 = "22-04-2021";
        $event1->setNameEvent('Tournoi de football')
        ->setTypeEvent('ANEOPS')
        ->setDateEvent(\DateTime::createFromFormat('d-m-Y', $date1))
        ->setDureeEvent(1);

        $event2 = new Evenement();
        $date2 = "25-04-2021";
        $event2->setNameEvent('Débat précarité étudiante')
        ->setTypeEvent('GENEPI Nantes')
        ->setDateEvent(\DateTime::createFromFormat('d-m-Y', $date2))
        ->setDureeEvent(1);

        // Evénement passé
        $event3 = new Evenement();
        $date3 = "01-01-2021";
        $event3->setNameEvent('Evenement Passe')
        ->setTypeEvent('GENEPI Nantes')
        ->setDateEvent(\DateTime::createFromFormat('d-m-Y', $date3))
        ->setDureeEvent(2);

        $event4 = new Evenement();
        $date4 = "11-08-2021";
        $event4->setNameEvent('Droits des étudiants')
        ->setTypeEvent('InterAsso Nantes')
        ->setDateEvent(\DateTime::createFromFormat('d-m-Y', $date4))
        ->setDureeEvent(1);

        // Evénement passé
        $event5 = new Evenement();
        $date5 = "01-01-2021";
        $event5->setNameEvent('Aides financières')
        ->setTypeEvent('InterAsso Nantes')
        ->setDateEvent(\DateTime::createFromFormat('d-m-Y', $date5))
        ->setDureeEvent(1);

        $event6 = new Evenement();
        $date6 = "01-05-2021";
        $event6->setNameEvent('Distribution de repas gratuits')
        ->setTypeEvent('GENEPI Nantes')
        ->setDateEvent(\DateTime::createFromFormat('d-m-Y', $date6))
        ->setDureeEvent(1);

        $event7 = new Evenement();
        $date7 = "10-05-2021";
        $event7->setNameEvent('Tournoi de basketball')
        ->setTypeEvent('ANEOPS')
        ->setDateEvent(\DateTime::createFromFormat('d-m-Y', $date7))
        ->setDureeEvent(1);

        // Evénement passé
        $event8 = new Evenement();
        $date8 = "10-04-2021";
        $event8->setNameEvent('Rencontre intercampus Volley')
        ->setTypeEvent('ANEOPS')
        ->setDateEvent(\DateTime::createFromFormat('d-m-Y', $date8))
        ->setDureeEvent(1);

        $event9 = new Evenement();
        $date9 = "20-05-2021";
        $event9->setNameEvent('Débat changement climatique')
        ->setTypeEvent('ASCII')
        ->setDateEvent(\DateTime::createFromFormat('d-m-Y', $date9))
        ->setDureeEvent(1);

        $event10 = new Evenement();
        $date10 = "22-05-2021";
        $event10->setNameEvent('Don du sang')
        ->setTypeEvent('GENEPI Nantes')
        ->setDateEvent(\DateTime::createFromFormat('d-m-Y', $date10))
        ->setDureeEvent(3);
        
        $manager->persist($event1);
        $manager->persist($event2);
        $manager->persist($event3);
        $manager->persist($event4);
        $manager->persist($event5);
        $manager->persist($event6);
        $manager->persist($event7);
        $manager->persist($event8);
        $manager->persist($event9);
        $manager->persist($event10);

        $manager->flush();
    }
}