<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240131104623 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleve ADD maison_id INT NOT NULL');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F79D67D8AF FOREIGN KEY (maison_id) REFERENCES maison (id)');
        $this->addSql('CREATE INDEX IDX_ECA105F79D67D8AF ON eleve (maison_id)');
        $this->addSql('ALTER TABLE maison DROP FOREIGN KEY FK_F90CB66DC2140342');
        $this->addSql('DROP INDEX IDX_F90CB66DC2140342 ON maison');
        $this->addSql('ALTER TABLE maison DROP eleves_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F79D67D8AF');
        $this->addSql('DROP INDEX IDX_ECA105F79D67D8AF ON eleve');
        $this->addSql('ALTER TABLE eleve DROP maison_id');
        $this->addSql('ALTER TABLE maison ADD eleves_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE maison ADD CONSTRAINT FK_F90CB66DC2140342 FOREIGN KEY (eleves_id) REFERENCES eleve (id)');
        $this->addSql('CREATE INDEX IDX_F90CB66DC2140342 ON maison (eleves_id)');
    }
}
