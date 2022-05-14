<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220503195304 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE facture_article (id INT AUTO_INCREMENT NOT NULL, article_id INT NOT NULL, facture_id INT NOT NULL, quantite INT NOT NULL, puht DOUBLE PRECISION NOT NULL, remise INT NOT NULL, tua DOUBLE PRECISION NOT NULL, totalht DOUBLE PRECISION NOT NULL, totale DOUBLE PRECISION NOT NULL, INDEX IDX_4ADDAF3F7294869C (article_id), INDEX IDX_4ADDAF3F7F2DEE08 (facture_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE facture_article ADD CONSTRAINT FK_4ADDAF3F7294869C FOREIGN KEY (article_id) REFERENCES article (id)');
        $this->addSql('ALTER TABLE facture_article ADD CONSTRAINT FK_4ADDAF3F7F2DEE08 FOREIGN KEY (facture_id) REFERENCES facture (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE facture_article');
    }
}
