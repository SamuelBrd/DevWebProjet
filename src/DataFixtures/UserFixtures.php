<?php
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager) : void
    {
        $admin1 = new User();
        $roles[] = 'ROLE_ADMIN';
        $admin1->setEmail('admin1@gmail.com')
        ->setRoles($roles)
        ->setPassword('azertyuiop')
        ->setNom('Admin1')
        ->setPseudo('Admin1')
        ->setPhoneNumber('0615489562')
        ->setCommuName('Hashtag Info');

        $admin2 = new User();
        $admin2->setEmail('admin2@gmail.com')
        ->setRoles($roles)
        ->setPassword('azertyuiop')
        ->setNom('Admin2')
        ->setPseudo('Admin2')
        ->setPhoneNumber('0615847851')
        ->setCommuName('ARTicule Nantes');

        $manager->persist($admin1);
        $manager->persist($admin2);

        $manager->flush();
    }

    /**
     * @return array
     */
    public function getDependencies(): array
    {
        return [
            CommunityFixtures::class,
        ];
    }
}