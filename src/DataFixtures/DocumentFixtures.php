<?php

namespace App\DataFixtures;

use App\Entity\Company;
use App\Entity\Document;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class DocumentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $document = new Document();

        $document->setType(Document::PROFIT_TYPE);
        $document->setCategory(1); // FV
        $document->setTitle('Wykonanie usług w zakresie IT');
        $document->setDescription('Usługi na rzecz pracodawcy');
        $document->setNumber('2019/11/01');
        $document->setAccountNumber('12345678901234567890123456');
        $document->setIssueDate(new \DateTime());
        $document->setPaymentDate(new \DateTime());
        $document->setPlace('Warszawa');
        $document->setNet(1000);
        $document->setTaxPercent(23);
        $document->setTax(230);
        $document->setGross(1230);
        $document->setBuyer($manager->getRepository(Company::class)->findOneByNip('1548845014')); // coca cola
        $document->setSeller($manager->getRepository(Company::class)->findOneByNip('1582065178')); // default
        $document->addViewer($manager->getRepository(User::class)->findOneByUsername('partner'));
        $document->addViewer($manager->getRepository(User::class)->findOneByUsername('admin'));

        $manager->persist($document);

        $document = new Document();

        $document->setType(Document::COST_TYPE);
        $document->setCategory(1); // FV
        $document->setTitle('Zakup drukarki');
        $document->setDescription('Canon');
        $document->setNumber('2019/11/02');
        $document->setAccountNumber('22345678901234567890123456');
        $document->setIssueDate(new \DateTime());
        $document->setPaymentDate(new \DateTime());
        $document->setPlace('Kraków');
        $document->setNet(100);
        $document->setTaxPercent(23);
        $document->setTax(23);
        $document->setGross(123);
        $document->setBuyer($manager->getRepository(Company::class)->findOneByNip('1582065178')); // default
        $document->setSeller($manager->getRepository(Company::class)->findOneByNip('1548845014')); // coca cola
        $document->addViewer($manager->getRepository(User::class)->findOneByUsername('partner'));
        $document->addViewer($manager->getRepository(User::class)->findOneByUsername('admin'));

        $manager->persist($document);

        $manager->flush();

    }

    public function getDependencies()
    {
        return [
            CompanyFixtures::class,
            UserFixtures::class,
        ];
    }
}
