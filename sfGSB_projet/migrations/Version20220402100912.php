<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220402100912 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE utilisateur_secondaire (id INT AUTO_INCREMENT NOT NULL, id_user_id CHAR(4) NOT NULL, id_fiche_frais_id INT NOT NULL, niveaux INT NOT NULL, INDEX IDX_43239A8979F37AE5 (id_user_id), INDEX IDX_43239A89E429EA53 (id_fiche_frais_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE utilisateur_secondaire ADD CONSTRAINT FK_43239A8979F37AE5 FOREIGN KEY (id_user_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE utilisateur_secondaire ADD CONSTRAINT FK_43239A89E429EA53 FOREIGN KEY (id_fiche_frais_id) REFERENCES fichefrais (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE utilisateur_secondaire');
        $this->addSql('ALTER TABLE categorie CHANGE nom_categorie nom_categorie VARCHAR(255) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE domaine CHANGE nom_domaine nom_domaine VARCHAR(50) NOT NULL COLLATE `utf8mb4_general_ci`');
        $this->addSql('ALTER TABLE etat CHANGE id id CHAR(2) NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE libelle libelle VARCHAR(30) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE fichefrais CHANGE mois mois CHAR(6) NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE idEtat idEtat CHAR(2) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE idUtilisateur idUtilisateur CHAR(4) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE fraisforfait CHANGE id id CHAR(3) NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE libelle libelle CHAR(20) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE lignefraisforfait CHANGE idFraisForfait idFraisForfait CHAR(3) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE lignefraishorsforfait CHANGE libelle libelle VARCHAR(100) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
        $this->addSql('ALTER TABLE utilisateur CHANGE id id CHAR(4) NOT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE nom nom CHAR(30) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE prenom prenom CHAR(30) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE adresse adresse CHAR(30) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE cp cp CHAR(5) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`, CHANGE ville ville CHAR(30) DEFAULT NULL COLLATE `utf8mb4_0900_ai_ci`');
    }
}
