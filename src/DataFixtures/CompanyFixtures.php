<?php

namespace App\DataFixtures;

use App\Entity\Company;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CompanyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $company = new Company();

        $company->setNip('9570954994');
        $company->setName('Jakub Kuryłowicz');
        $company->setFirstName('Jakub');
        $company->setLastName('Kuryłowicz');
        $company->setStreet('K. I. Gałczyńskiego');
        $company->setHouseNumber('5');
        $company->setApartamentNumber('37');
        $company->setCity('Pisz');
        $company->setPostCode('12-200');
        $company->setEmail('jakub@kurylowicz.pisz.pl');
        $company->setPhone('792006549');

        $manager->persist($company);

        $manager->flush();
    }
}
