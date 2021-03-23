<?php
namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{

    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager) : void
    {
        $admin1 = new User();
        $roles[] = 'ROLE_ADMIN';
        $password1 = $this->encoder->encodePassword($admin1, 'azertyuiop');
        $admin1->setEmail('admin1@gmail.com')
        ->setRoles($roles)
        ->setPassword($password1)
        ->setNom('Admin1')
        ->setPseudo('Admin1')
        ->setPhoneNumber('0615489562')
        ->setCommuName('Hashtag Info');

        $admin2 = new User();
        $password2 = $this->encoder->encodePassword($admin2, 'azertyuiop');
        $admin2->setEmail('admin2@gmail.com')
        ->setRoles($roles)
        ->setPassword($password2)
        ->setNom('Admin2')
        ->setPseudo('Admin2')
        ->setPhoneNumber('0615847851')
        ->setCommuName('ARTicule Nantes');

        $admin3 = new User();
        $password3 = $this->encoder->encodePassword($admin3, 'azertyuiop');
        $admin3->setEmail('admin3@gmail.com')
        ->setRoles($roles)
        ->setPassword($password3)
        ->setNom('Admin3')
        ->setPseudo('Admin3')
        ->setPhoneNumber('0615762484')
        ->setCommuName('GENEPI Nantes');

        $user1 = new User();
        $rolesU[] = 'ROLE_MEMBER';
        $password4 = $this->encoder->encodePassword($user1, 'azertyuiop');
        $user1->setEmail('user1@gmail.com')
        ->setRoles($rolesU)
        ->setPassword($password4)
        ->setNom('User1')
        ->setPseudo('User1')
        ->setPhoneNumber('0654952659')
        ->setCommuName('GENEPI Nantes');

        $manager->persist($admin1);
        $manager->persist($admin2);
        $manager->persist($admin3);
        $manager->persist($user1);

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