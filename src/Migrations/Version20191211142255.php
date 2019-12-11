<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191211142255 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'ZUS';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        // 2016
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 1, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 2, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 3, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 4, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 5, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 6, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 7, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 8, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 9, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 10, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 11, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 12, 185000, 428080, 800, 1952, 245, 180, 900, 245)');

        // 2017
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 1, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 2, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 3, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 4, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 5, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 6, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 7, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 8, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 9, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 10, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 11, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 12, 200000, 440417, 800, 1952, 245, 180, 900, 245)');

        // 2018
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 1, 210000, 473991, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 2, 210000, 473991, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 3, 210000, 473991, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 4, 210000, 473991, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 5, 210000, 473991, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 6, 210000, 473991, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 7, 210000, 473991, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 8, 210000, 473991, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 9, 210000, 473991, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 10, 210000, 473991, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 11, 210000, 473991, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 12, 210000, 473991, 800, 1952, 245, 167, 900, 245)');

        // 2019
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 1, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 2, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 3, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 4, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 5, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 6, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 7, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 8, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 9, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 10, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 11, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 12, 225000, 507141, 800, 1952, 245, 167, 900, 245)');

    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
    }
}
