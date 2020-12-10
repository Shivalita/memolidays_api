<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201112112934 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C14639883B');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C19D86650F');
        $this->addSql('DROP INDEX IDX_64C19C19D86650F ON category');
        $this->addSql('DROP INDEX UNIQ_64C19C14639883B ON category');
        $this->addSql('ALTER TABLE category CHANGE user_id_id user_id INT NOT NULL, CHANGE pin_id_id pin_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C16C3B254C FOREIGN KEY (pin_id) REFERENCES pin (id)');
        $this->addSql('CREATE INDEX IDX_64C19C1A76ED395 ON category (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_64C19C16C3B254C ON category (pin_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C1A76ED395');
        $this->addSql('ALTER TABLE category DROP FOREIGN KEY FK_64C19C16C3B254C');
        $this->addSql('DROP INDEX IDX_64C19C1A76ED395 ON category');
        $this->addSql('DROP INDEX UNIQ_64C19C16C3B254C ON category');
        $this->addSql('ALTER TABLE category CHANGE user_id user_id_id INT NOT NULL, CHANGE pin_id pin_id_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C14639883B FOREIGN KEY (pin_id_id) REFERENCES pin (id)');
        $this->addSql('ALTER TABLE category ADD CONSTRAINT FK_64C19C19D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_64C19C19D86650F ON category (user_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_64C19C14639883B ON category (pin_id_id)');
    }
}
