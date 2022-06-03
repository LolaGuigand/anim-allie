<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220603140406 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animal_couleur (animal_id INT NOT NULL, couleur_id INT NOT NULL, PRIMARY KEY(animal_id, couleur_id))');
        $this->addSql('CREATE INDEX IDX_B3D2E8DF8E962C16 ON animal_couleur (animal_id)');
        $this->addSql('CREATE INDEX IDX_B3D2E8DFC31BA576 ON animal_couleur (couleur_id)');
        $this->addSql('ALTER TABLE animal_couleur ADD CONSTRAINT FK_B3D2E8DF8E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE animal_couleur ADD CONSTRAINT FK_B3D2E8DFC31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE animal DROP couleur');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE animal_couleur');
        $this->addSql('ALTER TABLE animal ADD couleur VARCHAR(255) NOT NULL');
    }
}
