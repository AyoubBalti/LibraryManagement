<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220126193841 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D7AE7FEF94');
        $this->addSql('DROP INDEX IDX_364071D7AE7FEF94 ON emprunt');
        $this->addSql('ALTER TABLE emprunt DROP emprunt_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emprunt ADD emprunt_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D7AE7FEF94 FOREIGN KEY (emprunt_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_364071D7AE7FEF94 ON emprunt (emprunt_id)');
    }
}
