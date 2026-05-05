<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260505125950 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voiture ADD test FLOAT DEFAULT NULL, CHANGE prix_mensuel prix_mensuel FLOAT DEFAULT NULL, CHANGE prix_journalier prix_journalier FLOAT DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voiture DROP test, CHANGE prix_mensuel prix_mensuel NUMERIC(6, 2) DEFAULT NULL, CHANGE prix_journalier prix_journalier NUMERIC(6, 2) DEFAULT NULL');
    }
}
