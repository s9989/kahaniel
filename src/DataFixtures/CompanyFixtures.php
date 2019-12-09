<?php

namespace App\DataFixtures;

use App\Entity\Company;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CompanyFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $company = new Company();

        $company->setNip('1548845014');
        $company->setName('Coca Cola S.A.');
        $company->setFirstName('Jan');
        $company->setLastName('Kowalski');
        $company->setStreet('Polna');
        $company->setHouseNumber('1');
        $company->setApartamentNumber('2');
        $company->setCity('Warszawa');
        $company->setPostCode('00-001');
        $company->setEmail('jan@test.com');
        $company->setPhone('888888888');

        $user = $manager->getRepository(User::class)->findOneByUsername('accountant');
        $company->setOwner($user);

        $manager->persist($company);

        $company = new Company();

        $company->setNip('9528858147');
        $company->setName('Pepsi sp. z o. o.');
        $company->setFirstName('Ewa');
        $company->setLastName('Banach');
        $company->setStreet('Kijewska');
        $company->setHouseNumber('4');
        $company->setApartamentNumber('12');
        $company->setCity('Kraków');
        $company->setPostCode('02-200');
        $company->setEmail('ewa@test.com');
        $company->setPhone('848684865');

        $user = $manager->getRepository(User::class)->findOneByUsername('partner');
        $company->setOwner($user);

        $manager->persist($company);

        $company = new Company();

        $company->setNip('1582065178');
        $company->setName('Jan Kowalski');
        $company->setFirstName('Jan');
        $company->setLastName('Kowalski');
        $company->setStreet('Gołębia');
        $company->setHouseNumber('5');
        $company->setApartamentNumber('1');
        $company->setCity('Gdańsk');
        $company->setPostCode('10-000');
        $company->setEmail('adam@test.com');
        $company->setPhone('777888999');
        $company->setSicknessPayer(false);
        $company->setDiscount(true);

        $user = $manager->getRepository(User::class)->findOneByUsername('admin');
        $company->setOwner($user);

        $manager->persist($company);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class,
        ];
    }
}
