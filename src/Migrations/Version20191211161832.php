<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191211161832 extends AbstractMigration
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
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 1, 405500, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 2, 405500, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 3, 405500, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 4, 405500, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 5, 405500, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 6, 405500, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 7, 405500, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 8, 405500, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 9, 405500, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 10, 405500, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 11, 405500, 185000, 428080, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2016, 12, 405500, 185000, 428080, 800, 1952, 245, 180, 900, 245)');

        // 2017
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 1, 426300, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 2, 426300, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 3, 426300, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 4, 426300, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 5, 426300, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 6, 426300, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 7, 426300, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 8, 426300, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 9, 426300, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 10, 426300, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 11, 426300, 200000, 440417, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2017, 12, 426300, 200000, 440417, 800, 1952, 245, 180, 900, 245)');

        // 2018
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 1, 444300, 210000, 473991, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 2, 444300, 210000, 473991, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 3, 444300, 210000, 473991, 800, 1952, 245, 180, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 4, 444300, 210000, 473991, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 5, 444300, 210000, 473991, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 6, 444300, 210000, 473991, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 7, 444300, 210000, 473991, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 8, 444300, 210000, 473991, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 9, 444300, 210000, 473991, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 10, 444300, 210000, 473991, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 11, 444300, 210000, 473991, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2018, 12, 444300, 210000, 473991, 800, 1952, 245, 167, 900, 245)');

        // 2019
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 1, 476500, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 2, 476500, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 3, 476500, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 4, 476500, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 5, 476500, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 6, 476500, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 7, 476500, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 8, 476500, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 9, 476500, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 10, 476500, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 11, 476500, 225000, 507141, 800, 1952, 245, 167, 900, 245)');
        $this->addSql('INSERT INTO social_insurance_base (year, month, predicted_salary, minimal_salary, average_salary, other_percent, retirement_percent, sickness_percent, accident_percent, health_percent, labor_percent) VALUES (2019, 12, 476500, 225000, 507141, 800, 1952, 245, 167, 900, 245)');

    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
    }
}
