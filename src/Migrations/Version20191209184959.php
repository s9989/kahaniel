<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191209184959 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, nip VARCHAR(20) NOT NULL, name VARCHAR(100) NOT NULL, first_name VARCHAR(50) DEFAULT NULL, last_name VARCHAR(100) DEFAULT NULL, street VARCHAR(120) NOT NULL, house_number VARCHAR(10) NOT NULL, apartament_number VARCHAR(10) DEFAULT NULL, city VARCHAR(100) NOT NULL, post_code VARCHAR(10) NOT NULL, email VARCHAR(100) DEFAULT NULL, phone VARCHAR(20) DEFAULT NULL, start_date DATE DEFAULT NULL, discount TINYINT(1) NOT NULL, sickness_payer TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_4FBF094FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_polish_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, buyer_id INT DEFAULT NULL, seller_id INT DEFAULT NULL, type INT NOT NULL, category INT NOT NULL, title VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, number VARCHAR(40) NOT NULL, account_number VARCHAR(60) DEFAULT NULL, issue_date DATE NOT NULL, payment_date DATE NOT NULL, place VARCHAR(40) NOT NULL, net INT NOT NULL, tax_percent INT NOT NULL, tax INT NOT NULL, gross INT NOT NULL, deleted_at DATETIME DEFAULT NULL, INDEX IDX_D8698A766C755722 (buyer_id), INDEX IDX_D8698A768DE820D9 (seller_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_polish_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE document_user (document_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_2A275ADAC33F7837 (document_id), INDEX IDX_2A275ADAA76ED395 (user_id), PRIMARY KEY(document_id, user_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_polish_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE social_insurance_base (id INT AUTO_INCREMENT NOT NULL, year INT NOT NULL, month INT NOT NULL, minimal_salary INT NOT NULL, average_salary INT NOT NULL, other_percent INT NOT NULL, retirement_percent INT NOT NULL, sickness_percent INT NOT NULL, accident_percent INT NOT NULL, health_percent INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_polish_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE social_insurance_payment (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, social_insurance_base_id INT DEFAULT NULL, other INT NOT NULL, retirement INT NOT NULL, sickness INT NOT NULL, accident INT NOT NULL, health INT NOT NULL, INDEX IDX_65A8B15AA76ED395 (user_id), UNIQUE INDEX UNIQ_65A8B15A61E7EA16 (social_insurance_base_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_polish_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(25) NOT NULL, password VARCHAR(64) NOT NULL, email VARCHAR(254) NOT NULL, is_active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_C2502824F85E0677 (username), UNIQUE INDEX UNIQ_C2502824E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_polish_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_document (user_id INT NOT NULL, document_id INT NOT NULL, INDEX IDX_38E46E76A76ED395 (user_id), INDEX IDX_38E46E76C33F7837 (document_id), PRIMARY KEY(user_id, document_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_polish_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE company ADD CONSTRAINT FK_4FBF094FA76ED395 FOREIGN KEY (user_id) REFERENCES app_users (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A766C755722 FOREIGN KEY (buyer_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A768DE820D9 FOREIGN KEY (seller_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE document_user ADD CONSTRAINT FK_2A275ADAC33F7837 FOREIGN KEY (document_id) REFERENCES document (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE document_user ADD CONSTRAINT FK_2A275ADAA76ED395 FOREIGN KEY (user_id) REFERENCES app_users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE social_insurance_payment ADD CONSTRAINT FK_65A8B15AA76ED395 FOREIGN KEY (user_id) REFERENCES app_users (id)');
        $this->addSql('ALTER TABLE social_insurance_payment ADD CONSTRAINT FK_65A8B15A61E7EA16 FOREIGN KEY (social_insurance_base_id) REFERENCES social_insurance_base (id)');
        $this->addSql('ALTER TABLE user_document ADD CONSTRAINT FK_38E46E76A76ED395 FOREIGN KEY (user_id) REFERENCES app_users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_document ADD CONSTRAINT FK_38E46E76C33F7837 FOREIGN KEY (document_id) REFERENCES document (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A766C755722');
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A768DE820D9');
        $this->addSql('ALTER TABLE document_user DROP FOREIGN KEY FK_2A275ADAC33F7837');
        $this->addSql('ALTER TABLE user_document DROP FOREIGN KEY FK_38E46E76C33F7837');
        $this->addSql('ALTER TABLE social_insurance_payment DROP FOREIGN KEY FK_65A8B15A61E7EA16');
        $this->addSql('ALTER TABLE company DROP FOREIGN KEY FK_4FBF094FA76ED395');
        $this->addSql('ALTER TABLE document_user DROP FOREIGN KEY FK_2A275ADAA76ED395');
        $this->addSql('ALTER TABLE social_insurance_payment DROP FOREIGN KEY FK_65A8B15AA76ED395');
        $this->addSql('ALTER TABLE user_document DROP FOREIGN KEY FK_38E46E76A76ED395');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE document_user');
        $this->addSql('DROP TABLE social_insurance_base');
        $this->addSql('DROP TABLE social_insurance_payment');
        $this->addSql('DROP TABLE app_users');
        $this->addSql('DROP TABLE user_document');
    }
}
