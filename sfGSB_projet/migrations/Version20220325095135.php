<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220325095135 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, nom_categorie VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etat CHANGE id id CHAR(2) NOT NULL, CHANGE libelle libelle VARCHAR(30) DEFAULT NULL');
        $this->addSql('ALTER TABLE fichefrais CHANGE idUtilisateur idUtilisateur CHAR(4) DEFAULT NULL, CHANGE mois mois CHAR(6) NOT NULL, CHANGE idEtat idEtat CHAR(2) DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD categories_id INT DEFAULT NULL, CHANGE id id CHAR(4) NOT NULL, CHANGE nom nom CHAR(30) DEFAULT NULL, CHANGE prenom prenom CHAR(30) DEFAULT NULL, CHANGE adresse adresse CHAR(30) DEFAULT NULL, CHANGE cp cp CHAR(5) DEFAULT NULL, CHANGE ville ville CHAR(30) DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD CONSTRAINT FK_1D1C63B3A21214B7 FOREIGN KEY (categories_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_1D1C63B3A21214B7 ON utilisateur (categories_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur DROP FOREIGN KEY FK_1D1C63B3A21214B7');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('ALTER TABLE etat CHANGE id id CHAR(2) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE libelle libelle VARCHAR(30) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE fichefrais CHANGE mois mois CHAR(6) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE idEtat idEtat CHAR(2) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, CHANGE idUtilisateur idUtilisateur CHAR(4) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE fraisforfait CHANGE id id CHAR(3) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE libelle libelle CHAR(20) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE lignefraisforfait CHANGE idFraisForfait idFraisForfait CHAR(3) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('ALTER TABLE lignefraishorsforfait CHANGE libelle libelle VARCHAR(100) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`');
        $this->addSql('DROP INDEX IDX_1D1C63B3A21214B7 ON utilisateur');
        $this->addSql('ALTER TABLE utilisateur DROP categories_id, CHANGE id id CHAR(4) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, CHANGE nom nom CHAR(30) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, CHANGE prenom prenom CHAR(30) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, CHANGE adresse adresse CHAR(30) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, CHANGE cp cp CHAR(5) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`, CHANGE ville ville CHAR(30) CHARACTER SET latin1 DEFAULT NULL COLLATE `latin1_swedish_ci`');
    }
}
