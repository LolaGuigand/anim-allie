<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220603134758 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'insert default values for species and animal colours';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs

        $this->addSql("INSERT INTO espece (id, nom_espece) VALUES (1,'Chien'), (2,'Chat'), (3,'Autre')");
        $this->addSql("INSERT INTO couleur (id,nom_couleur) VALUES (1,'Noir'), (2,'Blanc'), (3,'Beige'), (4,'Roux'), (5,'Rayé'), (6,'Nu')");

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
