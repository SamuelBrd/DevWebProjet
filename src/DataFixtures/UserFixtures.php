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

    // Permet l'encodage du mot de passe de l'utilisateur
    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    /**
     * Création initiale des utilisateurs
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager) : void
    {
        //Déclaration des administrateurs

        $admin1 = new User();
        $roles[] = 'ROLE_ADMIN';
        // encode le mot de passe
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

        $admin4 = new User();
        $password4 = $this->encoder->encodePassword($admin4, 'azertyuiop');
        $admin4->setEmail('admin4@gmail.com')
        ->setRoles($roles)
        ->setPassword($password4)
        ->setNom('Admin4')
        ->setPseudo('Admin4')
        ->setPhoneNumber('0651489536')
        ->setCommuName('AIESEC Nantes');

        $admin5 = new User();
        $password5 = $this->encoder->encodePassword($admin5, 'azertyuiop');
        $admin5->setEmail('admin5@gmail.com')
        ->setRoles($roles)
        ->setPassword($password5)
        ->setNom('Admin5')
        ->setPseudo('Admin5')
        ->setPhoneNumber('0641587524')
        ->setCommuName('ANEOPS');

        $admin6 = new User();
        $password6 = $this->encoder->encodePassword($admin6, 'azertyuiop');
        $admin6->setEmail('admin6@gmail.com')
        ->setRoles($roles)
        ->setPassword($password6)
        ->setNom('Admin6')
        ->setPseudo('Admin6')
        ->setPhoneNumber('0630024158')
        ->setCommuName('AEFA');

        $admin7 = new User();
        $password7 = $this->encoder->encodePassword($admin7, 'azertyuiop');
        $admin7->setEmail('admin7@gmail.com')
        ->setRoles($roles)
        ->setPassword($password7)
        ->setNom('Admin7')
        ->setPseudo('Admin7')
        ->setPhoneNumber('0630255962')
        ->setCommuName('ANOPHELE');

        $admin8 = new User();
        $password8 = $this->encoder->encodePassword($admin8, 'azertyuiop');
        $admin8->setEmail('admin8@gmail.com')
        ->setRoles($roles)
        ->setPassword($password8)
        ->setNom('Admin8')
        ->setPseudo('Admin8')
        ->setPhoneNumber('0615953014')
        ->setCommuName('ASCII');

        $admin9 = new User();
        $password9 = $this->encoder->encodePassword($admin9, 'azertyuiop');
        $admin9->setEmail('admin9@gmail.com')
        ->setRoles($roles)
        ->setPassword($password9)
        ->setNom('Admin9')
        ->setPseudo('Admin9')
        ->setPhoneNumber('0698475126')
        ->setCommuName('InterAsso Nantes');

        //Déclaration de quelques membres

        $rolesU[] = 'ROLE_MEMBER';
        $user1 = new User();
        $password10 = $this->encoder->encodePassword($user1, 'azertyuiop');
        $user1->setEmail('user1@gmail.com')
        ->setRoles($rolesU)
        ->setPassword($password10)
        ->setNom('User1')
        ->setPseudo('User1')
        ->setPhoneNumber('0654952659')
        ->setCommuName('GENEPI Nantes');

        $user2 = new User();
        $password11 = $this->encoder->encodePassword($user2, 'azertyuiop');
        $user2->setEmail('user2@gmail.com')
        ->setRoles($rolesU)
        ->setPassword($password11)
        ->setNom('User2')
        ->setPseudo('User2')
        ->setPhoneNumber('0630251630')
        ->setCommuName('InterAsso Nantes');

        $user3 = new User();
        $password12 = $this->encoder->encodePassword($user3, 'azertyuiop');
        $user3->setEmail('user3@gmail.com')
        ->setRoles($rolesU)
        ->setPassword($password12)
        ->setNom('User3')
        ->setPseudo('User3')
        ->setPhoneNumber('06020451')
        ->setCommuName('ANEOPS');

        $manager->persist($admin1);
        $manager->persist($admin2);
        $manager->persist($admin3);
        $manager->persist($admin4);
        $manager->persist($admin5);
        $manager->persist($admin6);
        $manager->persist($admin7);
        $manager->persist($admin8);
        $manager->persist($admin9);

        $manager->persist($user1);
        $manager->persist($user2);
        $manager->persist($user3);

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