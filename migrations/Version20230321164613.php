<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230321164613 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tbl_formation ADD start_date_time DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD end_date_time DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', DROP start_date, DROP end_date');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tbl_formation ADD start_date DATE DEFAULT NULL, ADD end_date DATE DEFAULT NULL, DROP start_date_time, DROP end_date_time');
    }
}
