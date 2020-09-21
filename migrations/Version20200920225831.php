<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200920225831 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte DROP FOREIGN KEY compte_ibfk_1');
        $this->addSql('DROP INDEX idUti ON compte');
        $this->addSql('ALTER TABLE compte CHANGE iduti id_uti INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur MODIFY idUti INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE utilisateur CHANGE iduti id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte CHANGE id_uti idUti INT NOT NULL');
        $this->addSql('ALTER TABLE compte ADD CONSTRAINT compte_ibfk_1 FOREIGN KEY (idUti) REFERENCES utilisateur (idUti)');
        $this->addSql('CREATE INDEX idUti ON compte (idUti)');
        $this->addSql('ALTER TABLE utilisateur MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE utilisateur CHANGE id idUti INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD PRIMARY KEY (idUti)');
    }
}
