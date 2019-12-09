<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191209185658 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_users ADD first_name VARCHAR(64) NOT NULL, ADD last_name VARCHAR(128) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C2502824A9D1C132 ON app_users (first_name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C2502824C808BA5A ON app_users (last_name)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_C2502824A9D1C132 ON app_users');
        $this->addSql('DROP INDEX UNIQ_C2502824C808BA5A ON app_users');
        $this->addSql('ALTER TABLE app_users DROP first_name, DROP last_name');
    }
}
