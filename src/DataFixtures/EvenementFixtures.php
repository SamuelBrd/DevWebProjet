<?php
namespace App\DataFixtures;

use App\Entity\Evenement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
//use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class EvenementFixtures extends Fixture
{
    /**
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
        
        $manager->persist($event1);
        $manager->persist($event2);

        $manager->flush();
    }
}