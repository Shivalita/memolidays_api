<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201112123934 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE souvenir (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, title VARCHAR(255) NOT NULL, cover VARCHAR(255) NOT NULL, event_date DATETIME NOT NULL, email VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, comment VARCHAR(255) DEFAULT NULL, address VARCHAR(255) NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, place VARCHAR(255) NOT NULL, token VARCHAR(255) DEFAULT NULL, created_at DATETIME NOT NULL, INDEX IDX_53FBDDEEA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE souvenir_category (souvenir_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_AB03716FDBC4A80F (souvenir_id), INDEX IDX_AB03716F12469DE2 (category_id), PRIMARY KEY(souvenir_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE souvenir ADD CONSTRAINT FK_53FBDDEEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE souvenir_category ADD CONSTRAINT FK_AB03716FDBC4A80F FOREIGN KEY (souvenir_id) REFERENCES souvenir (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE souvenir_category ADD CONSTRAINT FK_AB03716F12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE souvenir_category DROP FOREIGN KEY FK_AB03716FDBC4A80F');
        $this->addSql('DROP TABLE souvenir');
        $this->addSql('DROP TABLE souvenir_category');
    }
}
