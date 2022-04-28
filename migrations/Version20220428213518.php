<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220428213518 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE adherent (id INT AUTO_INCREMENT NOT NULL, bibliotheque_id INT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, adress VARCHAR(255) DEFAULT NULL, mobile_number INT DEFAULT NULL, statut VARCHAR(255) NOT NULL, INDEX IDX_90D3F0604419DE7D (bibliotheque_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emprunt (id INT AUTO_INCREMENT NOT NULL, livre_id INT DEFAULT NULL, adherent_id INT DEFAULT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, statut INT NOT NULL, UNIQUE INDEX UNIQ_364071D737D925CB (livre_id), INDEX IDX_364071D725F06C53 (adherent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE livre (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, maison_edition VARCHAR(255) NOT NULL, auteur VARCHAR(255) NOT NULL, statut_livre INT NOT NULL, disponibilite TINYINT(1) NOT NULL, date_entry DATE NOT NULL, category VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, livre_id INT DEFAULT NULL, adherent_id INT DEFAULT NULL, date DATE NOT NULL, INDEX IDX_42C8495537D925CB (livre_id), INDEX IDX_42C8495525F06C53 (adherent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE adherent ADD CONSTRAINT FK_90D3F0604419DE7D FOREIGN KEY (bibliotheque_id) REFERENCES bibliotheque (id)');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D737D925CB FOREIGN KEY (livre_id) REFERENCES livre (id)');
        $this->addSql('ALTER TABLE emprunt ADD CONSTRAINT FK_364071D725F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495537D925CB FOREIGN KEY (livre_id) REFERENCES livre (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495525F06C53 FOREIGN KEY (adherent_id) REFERENCES adherent (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D725F06C53');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495525F06C53');
        $this->addSql('ALTER TABLE emprunt DROP FOREIGN KEY FK_364071D737D925CB');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495537D925CB');
        $this->addSql('DROP TABLE adherent');
        $this->addSql('DROP TABLE emprunt');
        $this->addSql('DROP TABLE livre');
        $this->addSql('DROP TABLE reservation');
    }
}
