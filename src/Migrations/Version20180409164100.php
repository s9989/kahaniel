<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180409164100 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE document (id INT AUTO_INCREMENT NOT NULL, buyer_id INT DEFAULT NULL, seller_id INT DEFAULT NULL, type INT NOT NULL, number VARCHAR(40) NOT NULL, account_number VARCHAR(60) NOT NULL, issue_date DATE NOT NULL, payment_date DATE NOT NULL, place VARCHAR(40) NOT NULL, net INT NOT NULL, gross INT NOT NULL, INDEX IDX_D8698A766C755722 (buyer_id), INDEX IDX_D8698A768DE820D9 (seller_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A766C755722 FOREIGN KEY (buyer_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A768DE820D9 FOREIGN KEY (seller_id) REFERENCES company (id)');
        $this->addSql('DROP TABLE invoice');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE invoice (id INT AUTO_INCREMENT NOT NULL, buyer_id INT DEFAULT NULL, seller_id INT DEFAULT NULL, type INT NOT NULL, number VARCHAR(40) NOT NULL COLLATE utf8_general_ci, account_number VARCHAR(60) NOT NULL COLLATE utf8_general_ci, issue_date DATE NOT NULL, payment_date DATE NOT NULL, place VARCHAR(40) NOT NULL COLLATE utf8_general_ci, net INT NOT NULL, gross INT NOT NULL, INDEX IDX_906517446C755722 (buyer_id), INDEX IDX_906517448DE820D9 (seller_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_906517446C755722 FOREIGN KEY (buyer_id) REFERENCES company (id)');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_906517448DE820D9 FOREIGN KEY (seller_id) REFERENCES company (id)');
        $this->addSql('DROP TABLE document');
    }
}
