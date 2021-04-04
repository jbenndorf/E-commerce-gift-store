<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder){
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstName('admin')
             ->setEmail('admin@test.com')
             ->setPassword($this->passwordEncoder->encodePassword($user, 'password'))
             ->setRoles(['ROLE_ADMIN'])
        ;

        $manager->persist($user);

        $manager->flush();
    }
}
