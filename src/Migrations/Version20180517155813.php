<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180517155813 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE social_insurance_payment (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, social_insurance_base_id INT DEFAULT NULL, other INT NOT NULL, retirement INT NOT NULL, sickness INT NOT NULL, accident INT NOT NULL, health INT NOT NULL, INDEX IDX_65A8B15AA76ED395 (user_id), UNIQUE INDEX UNIQ_65A8B15A61E7EA16 (social_insurance_base_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE social_insurance_payment ADD CONSTRAINT FK_65A8B15AA76ED395 FOREIGN KEY (user_id) REFERENCES app_users (id)');
        $this->addSql('ALTER TABLE social_insurance_payment ADD CONSTRAINT FK_65A8B15A61E7EA16 FOREIGN KEY (social_insurance_base_id) REFERENCES social_insurance_base (id)');
        $this->addSql('ALTER TABLE app_users ADD sickness_payer TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE social_insurance_payment');
        $this->addSql('ALTER TABLE app_users DROP sickness_payer');
    }
}
