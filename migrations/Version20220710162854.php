<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220710162854 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stock DROP INDEX IDX_4B365660F347EFB, ADD UNIQUE INDEX UNIQ_4B365660F347EFB (produit_id)');
        $this->addSql('ALTER TABLE stock DROP FOREIGN KEY FK_4B365660C71FF0A9');
        $this->addSql('DROP INDEX UNIQ_4B365660C71FF0A9 ON stock');
        $this->addSql('ALTER TABLE stock DROP prods_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stock DROP INDEX UNIQ_4B365660F347EFB, ADD INDEX IDX_4B365660F347EFB (produit_id)');
        $this->addSql('ALTER TABLE stock ADD prods_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stock ADD CONSTRAINT FK_4B365660C71FF0A9 FOREIGN KEY (prods_id) REFERENCES produit (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4B365660C71FF0A9 ON stock (prods_id)');
    }
}
