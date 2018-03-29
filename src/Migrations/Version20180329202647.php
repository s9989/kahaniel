<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180329202647 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE company (id INT AUTO_INCREMENT NOT NULL, nip VARCHAR(20) NOT NULL, name VARCHAR(100) NOT NULL, first_name VARCHAR(50) DEFAULT NULL, last_name VARCHAR(100) DEFAULT NULL, street VARCHAR(120) NOT NULL, house_number VARCHAR(10) NOT NULL, apartament_number VARCHAR(10) DEFAULT NULL, city VARCHAR(100) NOT NULL, post_code VARCHAR(10) NOT NULL, email VARCHAR(100) DEFAULT NULL, phone VARCHAR(20) DEFAULT NULL, main TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE invoice (id INT AUTO_INCREMENT NOT NULL, buyer_id INT DEFAULT NULL, seller_id INT DEFAULT NULL, type INT NOT NULL, number VARCHAR(40) NOT NULL, account_number VARCHAR(60) NOT NULL, issue_date DATE NOT NULL, payment_date DATE NOT NULL, place VARCHAR(40) NOT NULL, net INT NOT NULL, gross INT NOT NULL, INDEX IDX_906517446C755722 (buyer_id), INDEX IDX_906517448DE820D9 (seller_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_906517446C755722 FOREIGN KEY (buyer_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_906517448DE820D9 FOREIGN KEY (seller_id) REFERENCES company (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_906517446C755722');
        $this->addSql('ALTER TABLE invoice DROP FOREIGN KEY FK_906517448DE820D9');
        $this->addSql('DROP TABLE company');
        $this->addSql('DROP TABLE invoice');
    }
}
