<?php
namespace App\DataFixtures;

use App\Entity\Community;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CommunityFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager) : void
    {
        $commu1 = new Community();
        $commu1->setRole('Médias')
        ->setName('Hashtag Info');

        $commu2 = new Community();
        $commu2->setRole('Culture')
        ->setName('ARTicule Nantes');

        $commu3 = new Community();
        $commu3->setRole('Solidarité et citoyenneté')
        ->setName('GENEPI Nantes');

        $commu4 = new Community();
        $commu4->setRole('International')
        ->setName('AIESEC Nantes');

        $commu5 = new Community();
        $commu5->setRole('Sport et loisirs')
        ->setName('ANEOPS');

        $commu6 = new Community();
        $commu6->setRole('Bureaux des étudiants')
        ->setName('AEFA');

        $commu7 = new Community();
        $commu7->setRole('Environnement')
        ->setName('ANOPHELE');

        $commu8 = new Community();
        $commu8->setRole('Culture scientifique et technique')
        ->setName('ASCII');

        $commu9 = new Community();
        $commu9->setRole('Syndicats')
        ->setName('InterAsso Nantes');
        
        $manager->persist($commu1);
        $manager->persist($commu2);
        $manager->persist($commu3);
        $manager->persist($commu4);
        $manager->persist($commu5);
        $manager->persist($commu6);
        $manager->persist($commu7);
        $manager->persist($commu8);
        $manager->persist($commu9);

        $manager->flush();
    }
}