<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220603134101 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE animal_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE benevole_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE contrat_dadoption_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE couleur_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE espece_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE animal (id INT NOT NULL, espece_id_id INT NOT NULL, petit_nom VARCHAR(255) NOT NULL, description TEXT NOT NULL, photo VARCHAR(300) DEFAULT NULL, is_female BOOLEAN NOT NULL, couleur VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_6AAB231F8F0DBF84 ON animal (espece_id_id)');
        $this->addSql('CREATE TABLE benevole (id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, telephone VARCHAR(13) NOT NULL, email VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE contrat_dadoption (id INT NOT NULL, animal_id_id INT NOT NULL, nom_adoptant VARCHAR(255) NOT NULL, prenom_adoptant VARCHAR(255) NOT NULL, adresse_adoptant VARCHAR(500) NOT NULL, telephone_adoptant VARCHAR(13) NOT NULL, email_adoptant VARCHAR(255) NOT NULL, date_emission DATE NOT NULL, date_signature DATE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E47DDA365EB747A3 ON contrat_dadoption (animal_id_id)');
        $this->addSql('CREATE TABLE couleur (id INT NOT NULL, nom_couleur VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE espece (id INT NOT NULL, nom_espece VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F8F0DBF84 FOREIGN KEY (espece_id_id) REFERENCES espece (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE contrat_dadoption ADD CONSTRAINT FK_E47DDA365EB747A3 FOREIGN KEY (animal_id_id) REFERENCES animal (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE contrat_dadoption DROP CONSTRAINT FK_E47DDA365EB747A3');
        $this->addSql('ALTER TABLE animal DROP CONSTRAINT FK_6AAB231F8F0DBF84');
        $this->addSql('DROP SEQUENCE animal_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE benevole_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE contrat_dadoption_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE couleur_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE espece_id_seq CASCADE');
        $this->addSql('DROP TABLE animal');
        $this->addSql('DROP TABLE benevole');
        $this->addSql('DROP TABLE contrat_dadoption');
        $this->addSql('DROP TABLE couleur');
        $this->addSql('DROP TABLE espece');
    }
}
