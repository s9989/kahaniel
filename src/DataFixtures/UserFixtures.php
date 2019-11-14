<?php

namespace App\DataFixtures;

use App\Entity\Company;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture implements DependentFixtureInterface
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUserName("admin");
        $user->setEmail("test@test.com");
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            "admin"
        ));

        $user->setCompany($manager->getRepository(Company::class)->findOneByNip('9570954994'));
        $user->setSicknessPayer(true);

        $manager->persist($user);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CompanyFixtures::class,
        ];
    }
}
