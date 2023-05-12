<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230512150317 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tender ADD category_id INT DEFAULT NULL, ADD tendertype_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE tender ADD CONSTRAINT FK_42057A7712469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE tender ADD CONSTRAINT FK_42057A77BFC75357 FOREIGN KEY (tendertype_id) REFERENCES tendertype (id)');
        $this->addSql('CREATE INDEX IDX_42057A7712469DE2 ON tender (category_id)');
        $this->addSql('CREATE INDEX IDX_42057A77BFC75357 ON tender (tendertype_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tender DROP FOREIGN KEY FK_42057A7712469DE2');
        $this->addSql('ALTER TABLE tender DROP FOREIGN KEY FK_42057A77BFC75357');
        $this->addSql('DROP INDEX IDX_42057A7712469DE2 ON tender');
        $this->addSql('DROP INDEX IDX_42057A77BFC75357 ON tender');
        $this->addSql('ALTER TABLE tender DROP category_id, DROP tendertype_id');
    }
}
