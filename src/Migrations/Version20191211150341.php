<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191211150341 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE social_insurance_payment DROP FOREIGN KEY FK_65A8B15AA76ED395');
        $this->addSql('DROP INDEX IDX_65A8B15AA76ED395 ON social_insurance_payment');
        $this->addSql('ALTER TABLE social_insurance_payment ADD labor INT NOT NULL, CHANGE user_id company_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE social_insurance_payment ADD CONSTRAINT FK_65A8B15A979B1AD6 FOREIGN KEY (company_id) REFERENCES company (id)');
        $this->addSql('CREATE INDEX IDX_65A8B15A979B1AD6 ON social_insurance_payment (company_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE social_insurance_payment DROP FOREIGN KEY FK_65A8B15A979B1AD6');
        $this->addSql('DROP INDEX IDX_65A8B15A979B1AD6 ON social_insurance_payment');
        $this->addSql('ALTER TABLE social_insurance_payment DROP labor, CHANGE company_id user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE social_insurance_payment ADD CONSTRAINT FK_65A8B15AA76ED395 FOREIGN KEY (user_id) REFERENCES app_users (id)');
        $this->addSql('CREATE INDEX IDX_65A8B15AA76ED395 ON social_insurance_payment (user_id)');
    }
}
