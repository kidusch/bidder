<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230512140947 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document ADD bid_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A764D9866B8 FOREIGN KEY (bid_id) REFERENCES bid (id)');
        $this->addSql('CREATE INDEX IDX_D8698A764D9866B8 ON document (bid_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document DROP FOREIGN KEY FK_D8698A764D9866B8');
        $this->addSql('DROP INDEX IDX_D8698A764D9866B8 ON document');
        $this->addSql('ALTER TABLE document DROP bid_id');
    }
}
