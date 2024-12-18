<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241218143705 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE media_language (media_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_DBBA5F07EA9FDD75 (media_id), INDEX IDX_DBBA5F0782F1BAF4 (language_id), PRIMARY KEY(media_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE media_language ADD CONSTRAINT FK_DBBA5F07EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_language ADD CONSTRAINT FK_DBBA5F0782F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_language_language DROP FOREIGN KEY FK_EE8044747599C867');
        $this->addSql('ALTER TABLE media_language_language DROP FOREIGN KEY FK_EE80447482F1BAF4');
        $this->addSql('ALTER TABLE media_language_media DROP FOREIGN KEY FK_B441511DEA9FDD75');
        $this->addSql('ALTER TABLE media_language_media DROP FOREIGN KEY FK_B441511D7599C867');
        $this->addSql('ALTER TABLE playlist_media_media DROP FOREIGN KEY FK_50F8E39217421B18');
        $this->addSql('ALTER TABLE playlist_media_media DROP FOREIGN KEY FK_50F8E392EA9FDD75');
        $this->addSql('DROP TABLE media_language_language');
        $this->addSql('DROP TABLE media_language_media');
        $this->addSql('DROP TABLE playlist_media_media');
        $this->addSql('ALTER TABLE playlist_media DROP FOREIGN KEY FK_C930B84FDC588714');
        $this->addSql('DROP INDEX IDX_C930B84FDC588714 ON playlist_media');
        $this->addSql('ALTER TABLE playlist_media ADD media_id INT NOT NULL, CHANGE playlist_id_id playlist_id INT NOT NULL');
        $this->addSql('ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84F6BBD148 FOREIGN KEY (playlist_id) REFERENCES playlist (id)');
        $this->addSql('ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84FEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id)');
        $this->addSql('CREATE INDEX IDX_C930B84F6BBD148 ON playlist_media (playlist_id)');
        $this->addSql('CREATE INDEX IDX_C930B84FEA9FDD75 ON playlist_media (media_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE media_language_language (media_language_id INT NOT NULL, language_id INT NOT NULL, INDEX IDX_EE80447482F1BAF4 (language_id), INDEX IDX_EE8044747599C867 (media_language_id), PRIMARY KEY(media_language_id, language_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE media_language_media (media_language_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_B441511DEA9FDD75 (media_id), INDEX IDX_B441511D7599C867 (media_language_id), PRIMARY KEY(media_language_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE playlist_media_media (playlist_media_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_50F8E39217421B18 (playlist_media_id), INDEX IDX_50F8E392EA9FDD75 (media_id), PRIMARY KEY(playlist_media_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE media_language_language ADD CONSTRAINT FK_EE8044747599C867 FOREIGN KEY (media_language_id) REFERENCES media_language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_language_language ADD CONSTRAINT FK_EE80447482F1BAF4 FOREIGN KEY (language_id) REFERENCES language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_language_media ADD CONSTRAINT FK_B441511DEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_language_media ADD CONSTRAINT FK_B441511D7599C867 FOREIGN KEY (media_language_id) REFERENCES media_language (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_media_media ADD CONSTRAINT FK_50F8E39217421B18 FOREIGN KEY (playlist_media_id) REFERENCES playlist_media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE playlist_media_media ADD CONSTRAINT FK_50F8E392EA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE media_language DROP FOREIGN KEY FK_DBBA5F07EA9FDD75');
        $this->addSql('ALTER TABLE media_language DROP FOREIGN KEY FK_DBBA5F0782F1BAF4');
        $this->addSql('DROP TABLE media_language');
        $this->addSql('ALTER TABLE playlist_media DROP FOREIGN KEY FK_C930B84F6BBD148');
        $this->addSql('ALTER TABLE playlist_media DROP FOREIGN KEY FK_C930B84FEA9FDD75');
        $this->addSql('DROP INDEX IDX_C930B84F6BBD148 ON playlist_media');
        $this->addSql('DROP INDEX IDX_C930B84FEA9FDD75 ON playlist_media');
        $this->addSql('ALTER TABLE playlist_media ADD playlist_id_id INT NOT NULL, DROP playlist_id, DROP media_id');
        $this->addSql('ALTER TABLE playlist_media ADD CONSTRAINT FK_C930B84FDC588714 FOREIGN KEY (playlist_id_id) REFERENCES playlist (id)');
        $this->addSql('CREATE INDEX IDX_C930B84FDC588714 ON playlist_media (playlist_id_id)');
    }
}
