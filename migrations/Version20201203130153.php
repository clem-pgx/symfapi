<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201203130153 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cadeau ADD liste_souhait_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE cadeau ADD CONSTRAINT FK_3D21346019FAFA52 FOREIGN KEY (liste_souhait_id) REFERENCES liste_souhait (id)');
        $this->addSql('CREATE INDEX IDX_3D21346019FAFA52 ON cadeau (liste_souhait_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE cadeau DROP FOREIGN KEY FK_3D21346019FAFA52');
        $this->addSql('DROP INDEX IDX_3D21346019FAFA52 ON cadeau');
        $this->addSql('ALTER TABLE cadeau DROP liste_souhait_id');
    }
}
