<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220119135904 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F9938525C90');
        $this->addSql('DROP INDEX IDX_AC634F9938525C90 ON livre');
        $this->addSql('ALTER TABLE livre CHANGE relation2_id editeurs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F99AB2BD8C6 FOREIGN KEY (editeurs_id) REFERENCES editeur (id)');
        $this->addSql('CREATE INDEX IDX_AC634F99AB2BD8C6 ON livre (editeurs_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE livre DROP FOREIGN KEY FK_AC634F99AB2BD8C6');
        $this->addSql('DROP INDEX IDX_AC634F99AB2BD8C6 ON livre');
        $this->addSql('ALTER TABLE livre CHANGE editeurs_id relation2_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE livre ADD CONSTRAINT FK_AC634F9938525C90 FOREIGN KEY (relation2_id) REFERENCES editeur (id)');
        $this->addSql('CREATE INDEX IDX_AC634F9938525C90 ON livre (relation2_id)');
    }
}
