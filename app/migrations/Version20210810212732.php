<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210810212732 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avenger (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, real_name VARCHAR(255) NOT NULL, picture VARCHAR(255) NOT NULL, votes_count INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('INSERT INTO avenger (id, name, real_name, picture, votes_count) VALUES (NULL, "Iron Man", "Tony Stark", "iron-man.jpg", 42), (NULL, "Captain America", "Steve Rogers", "captain-america.jpg", 14), (NULL, "Thor", "Un mec un peu marteau", "thor.jpg", 18), (NULL, "Hulk", "Bruce Banner", "hulk.jpg", 12),  (NULL, "Black Widow", "Natasha Romanoff", "black-widow.jpg", 19), (NULL, "Loki", "Tu peux ranger ton Opinel", "loki.jpg", 18), (NULL, "Sorcière Rouge", "Wanda Maximoff", "sorciere-rouge.jpg", 18)');
    }
    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE avenger');
    }
}
