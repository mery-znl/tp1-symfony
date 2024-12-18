<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241218094523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, `label` VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, media_id_id INT DEFAULT NULL, content VARCHAR(255) NOT NULL, INDEX IDX_9474526C9D86650F (user_id_id), INDEX IDX_9474526C605D5AE6 (media_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE controller (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE episode (id INT AUTO_INCREMENT NOT NULL, season_id INT NOT NULL, title VARCHAR(255) NOT NULL, duration INT NOT NULL, released_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_DDAA1CDA4EC001D1 (season_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE language (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, code VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, category_media_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, short_description VARCHAR(255) NOT NULL, long_description VARCHAR(255) NOT NULL, release_date DATE NOT NULL, cover_image VARCHAR(255) NOT NULL, staff LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', caste LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', mediaType VARCHAR(255) NOT NULL, INDEX IDX_6A2CA10C5DE5590E (category_media_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_category (media_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_92D3773EA9FDD75 (media_id), INDEX IDX_92D377312469DE2 (category_id), PRIMARY KEY(media_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_language (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_language_media (media_language_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_B441511D7599C867 (media_language_id), INDEX IDX_B441511DEA9FDD75 (media_id), PRIMARY KEY(media_language_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media_language_language (media_language_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_EE8044747599C867 (media_language_id), INDEX IDX_EE80447482F1BAF4 (language_id), PRIMARY KEY(media_language_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE movie (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_D782112D9D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist_media (id INT AUTO_INCREMENT NOT NULL, playlist_id_id INT NOT NULL, added_at DATETIME DEFAULT NULL, INDEX IDX_C930B84FDC588714 (playlist_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist_media_media (playlist_media_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_50F8E39217421B18 (playlist_media_id), INDEX IDX_50F8E392EA9FDD75 (media_id), PRIMARY KEY(playlist_media_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE playlist_subscription (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, playlist_id_id INT NOT NULL, subscriped_at DATE NOT NULL, INDEX IDX_832940C9D86650F (user_id_id), INDEX IDX_832940CDC588714 (playlist_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE season (id INT AUTO_INCREMENT NOT NULL, serie_id INT NOT NULL, number VARCHAR(255) NOT NULL, INDEX IDX_F0E45BA9D94388BD (serie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscription (id INT AUTO_INCREMENT NOT NULL, subscriber_id INT NOT NULL, name VARCHAR(100) NOT NULL, price DOUBLE PRECISION NOT NULL, duration_in_months INT NOT NULL, INDEX IDX_A3C664D37808B1AD (subscriber_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subscription_history (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, susbscription_id_id INT DEFAULT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, INDEX IDX_54AF90D09D86650F (user_id_id), INDEX IDX_54AF90D04ABFB514 (susbscription_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category_media_category (category_media_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_E83D744E5DE5590E (category_media_id), INDEX IDX_E83D744E12469DE2 (category_id), PRIMARY KEY(category_media_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(100) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE watch_history (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, last_watched DATETIME NOT NULL, number_of_views INT NOT NULL, INDEX IDX_DE44EFD89D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE watch_history_media (watch_history_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_279C548C4D8CCBCC (watch_history_id), INDEX IDX_279C548CEA9FDD75 (media_id), PRIMARY KEY(watch_history_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C9D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C605D5AE6 FOREIGN KEY (media_id_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE episode ADD CONSTRAINT FK_DDAA1CDA4EC001D1 FOREIGN KEY (season_id) REFERENCES season (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10C5DE5590E FOREIGN KEY (category_media_id) REFERENCES test (id)');
        $this->addSql('ALTER TABLE media_category ADD CONSTRAINT FK_92D3773EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_category ADD CONSTRAINT FK_92D377312469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_language_media ADD CONSTRAINT FK_B441511D7599C867 FOREIGN KEY (media_language_id) REFERENCES media_language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_language_media ADD CONSTRAINT FK_B441511DEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_language_language ADD CONSTRAINT FK_EE8044747599C867 FOREIGN KEY (media_language_id) REFERENCES media_language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_language_language ADD CONSTRAINT FK_EE80447482F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26FBF396750 FOREIGN KEY (id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist ADD CONSTRAINT FK_D782112D9D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84FDC588714 FOREIGN KEY (playlist_id_id) REFERENCES playlist (id)');
        $this->addSql('ALTER TABLE playlist_media_media ADD CONSTRAINT FK_50F8E39217421B18 FOREIGN KEY (playlist_media_id) REFERENCES playlist_media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_media_media ADD CONSTRAINT FK_50F8E392EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940C9D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE playlist_subscription ADD CONSTRAINT FK_832940CDC588714 FOREIGN KEY (playlist_id_id) REFERENCES playlist (id)');
        $this->addSql('ALTER TABLE season ADD CONSTRAINT FK_F0E45BA9D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id)');
        $this->addSql('ALTER TABLE serie ADD CONSTRAINT FK_AA3A9334BF396750 FOREIGN KEY (id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE subscription ADD CONSTRAINT FK_A3C664D37808B1AD FOREIGN KEY (subscriber_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D09D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE subscription_history ADD CONSTRAINT FK_54AF90D04ABFB514 FOREIGN KEY (susbscription_id_id) REFERENCES subscription (id)');
        $this->addSql('ALTER TABLE category_media_category ADD CONSTRAINT FK_E83D744E5DE5590E FOREIGN KEY (category_media_id) REFERENCES test (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE category_media_category ADD CONSTRAINT FK_E83D744E12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE watch_history ADD CONSTRAINT FK_DE44EFD89D86650F FOREIGN KEY (user_id_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE watch_history_media ADD CONSTRAINT FK_279C548C4D8CCBCC FOREIGN KEY (watch_history_id) REFERENCES watch_history (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE watch_history_media ADD CONSTRAINT FK_279C548CEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C9D86650F');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C605D5AE6');
        $this->addSql('ALTER TABLE episode DROP FOREIGN KEY FK_DDAA1CDA4EC001D1');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10C5DE5590E');
        $this->addSql('ALTER TABLE media_category DROP FOREIGN KEY FK_92D3773EA9FDD75');
        $this->addSql('ALTER TABLE media_category DROP FOREIGN KEY FK_92D377312469DE2');
        $this->addSql('ALTER TABLE media_language_media DROP FOREIGN KEY FK_B441511D7599C867');
        $this->addSql('ALTER TABLE media_language_media DROP FOREIGN KEY FK_B441511DEA9FDD75');
        $this->addSql('ALTER TABLE media_language_language DROP FOREIGN KEY FK_EE8044747599C867');
        $this->addSql('ALTER TABLE media_language_language DROP FOREIGN KEY FK_EE80447482F1BAF4');
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26FBF396750');
        $this->addSql('ALTER TABLE playlist DROP FOREIGN KEY FK_D782112D9D86650F');
        $this->addSql('ALTER TABLE playlist_media DROP FOREIGN KEY FK_C930B84FDC588714');
        $this->addSql('ALTER TABLE playlist_media_media DROP FOREIGN KEY FK_50F8E39217421B18');
        $this->addSql('ALTER TABLE playlist_media_media DROP FOREIGN KEY FK_50F8E392EA9FDD75');
        $this->addSql('ALTER TABLE playlist_subscription DROP FOREIGN KEY FK_832940C9D86650F');
        $this->addSql('ALTER TABLE playlist_subscription DROP FOREIGN KEY FK_832940CDC588714');
        $this->addSql('ALTER TABLE season DROP FOREIGN KEY FK_F0E45BA9D94388BD');
        $this->addSql('ALTER TABLE serie DROP FOREIGN KEY FK_AA3A9334BF396750');
        $this->addSql('ALTER TABLE subscription DROP FOREIGN KEY FK_A3C664D37808B1AD');
        $this->addSql('ALTER TABLE subscription_history DROP FOREIGN KEY FK_54AF90D09D86650F');
        $this->addSql('ALTER TABLE subscription_history DROP FOREIGN KEY FK_54AF90D04ABFB514');
        $this->addSql('ALTER TABLE category_media_category DROP FOREIGN KEY FK_E83D744E5DE5590E');
        $this->addSql('ALTER TABLE category_media_category DROP FOREIGN KEY FK_E83D744E12469DE2');
        $this->addSql('ALTER TABLE watch_history DROP FOREIGN KEY FK_DE44EFD89D86650F');
        $this->addSql('ALTER TABLE watch_history_media DROP FOREIGN KEY FK_279C548C4D8CCBCC');
        $this->addSql('ALTER TABLE watch_history_media DROP FOREIGN KEY FK_279C548CEA9FDD75');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE controller');
        $this->addSql('DROP TABLE episode');
        $this->addSql('DROP TABLE language');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE media_category');
        $this->addSql('DROP TABLE media_language');
        $this->addSql('DROP TABLE media_language_media');
        $this->addSql('DROP TABLE media_language_language');
        $this->addSql('DROP TABLE movie');
        $this->addSql('DROP TABLE playlist');
        $this->addSql('DROP TABLE playlist_media');
        $this->addSql('DROP TABLE playlist_media_media');
        $this->addSql('DROP TABLE playlist_subscription');
        $this->addSql('DROP TABLE season');
        $this->addSql('DROP TABLE serie');
        $this->addSql('DROP TABLE subscription');
        $this->addSql('DROP TABLE subscription_history');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE category_media_category');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE watch_history');
        $this->addSql('DROP TABLE watch_history_media');
    }
}
