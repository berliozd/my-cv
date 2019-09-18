<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190912203129 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_BC925E5539EBC39B');
        $this->addSql('CREATE TEMPORARY TABLE __temp__work_experience_detail AS SELECT id, work_experience_id_id, detail, technical_environment FROM work_experience_detail');
        $this->addSql('DROP TABLE work_experience_detail');
        $this->addSql('CREATE TABLE work_experience_detail (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, work_experience_id_id INTEGER NOT NULL, work_experience_id INTEGER NOT NULL, detail VARCHAR(255) NOT NULL COLLATE BINARY, technical_environment VARCHAR(255) NOT NULL COLLATE BINARY, CONSTRAINT FK_BC925E5539EBC39B FOREIGN KEY (work_experience_id_id) REFERENCES work_experience (id) NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_BC925E556347713 FOREIGN KEY (work_experience_id) REFERENCES work_experience (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO work_experience_detail (id, work_experience_id_id, detail, technical_environment) SELECT id, work_experience_id_id, detail, technical_environment FROM __temp__work_experience_detail');
        $this->addSql('DROP TABLE __temp__work_experience_detail');
        $this->addSql('CREATE INDEX IDX_BC925E5539EBC39B ON work_experience_detail (work_experience_id_id)');
        $this->addSql('CREATE INDEX IDX_BC925E556347713 ON work_experience_detail (work_experience_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'sqlite', 'Migration can only be executed safely on \'sqlite\'.');

        $this->addSql('DROP INDEX IDX_BC925E5539EBC39B');
        $this->addSql('DROP INDEX IDX_BC925E556347713');
        $this->addSql('CREATE TEMPORARY TABLE __temp__work_experience_detail AS SELECT id, work_experience_id_id, detail, technical_environment FROM work_experience_detail');
        $this->addSql('DROP TABLE work_experience_detail');
        $this->addSql('CREATE TABLE work_experience_detail (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, work_experience_id_id INTEGER NOT NULL, detail VARCHAR(255) NOT NULL, technical_environment VARCHAR(255) NOT NULL)');
        $this->addSql('INSERT INTO work_experience_detail (id, work_experience_id_id, detail, technical_environment) SELECT id, work_experience_id_id, detail, technical_environment FROM __temp__work_experience_detail');
        $this->addSql('DROP TABLE __temp__work_experience_detail');
        $this->addSql('CREATE INDEX IDX_BC925E5539EBC39B ON work_experience_detail (work_experience_id_id)');
    }
}
