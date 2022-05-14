<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220425071524 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article CHANGE disponible disponible INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD telephone INT NOT NULL, ADD ville VARCHAR(255) NOT NULL, ADD codepostal INT NOT NULL, ADD adresse LONGTEXT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article CHANGE disponible disponible TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE `user` DROP telephone, DROP ville, DROP codepostal, DROP adresse');
    }
}
