<?php

namespace App\DataFixtures;

use App\Entity\Company;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setFirstName("Jan");
        $user->setLastName("Kowalski");
        $user->setUsername("admin");
        $user->setEmail("test@test.com");
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            "admin"
        ));

        $manager->persist($user);

        $user = new User();
        $user->setFirstName("Anna");
        $user->setLastName("Nowak");
        $user->setUsername("accountant");
        $user->setEmail("accountant@test.com");
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            "accountant"
        ));

        $manager->persist($user);

        $user = new User();
        $user->setFirstName("Grzegorz");
        $user->setLastName("Partnerski");
        $user->setUsername("partner");
        $user->setEmail("partner@test.com");
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            "partner"
        ));

        $manager->persist($user);

        $manager->flush();
    }

}
