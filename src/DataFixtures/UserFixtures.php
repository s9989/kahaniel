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
        $user->setUsername("admin");
        $user->setEmail("test@test.com");
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            "admin"
        ));

        $user->setCompany($manager->getRepository(Company::class)->findOneByNip('1582065178')); // default
        $user->setSicknessPayer(true);

        $manager->persist($user);

        $user = new User();
        $user->setUsername("accountant");
        $user->setEmail("accountant@test.com");
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            "accountant"
        ));

        $user->setCompany($manager->getRepository(Company::class)->findOneByNip('1548845014')); // coca-cola

        $manager->persist($user);

        $manager->flush();

        $user = new User();
        $user->setUsername("partner");
        $user->setEmail("partner@test.com");
        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            "partner"
        ));

        $user->setCompany($manager->getRepository(Company::class)->findOneByNip('9528858147')); // pepsi

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
