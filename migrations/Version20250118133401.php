<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250118133401 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE ability (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, text LONGTEXT NOT NULL, type VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE attack (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, cost LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', converted_energy_cost INT DEFAULT NULL, damage VARCHAR(20) DEFAULT NULL, text LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE card (id INT AUTO_INCREMENT NOT NULL, supertype_id INT NOT NULL, evolves_from_id INT DEFAULT NULL, card_set_id INT DEFAULT NULL, rarity_id INT DEFAULT NULL, images_id INT DEFAULT NULL, tcg_id VARCHAR(50) NOT NULL, name VARCHAR(50) NOT NULL, level VARCHAR(10) DEFAULT NULL, hp VARCHAR(10) DEFAULT NULL, retreat_cost LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', number VARCHAR(10) DEFAULT NULL, artist VARCHAR(50) DEFAULT NULL, flavor_text LONGTEXT DEFAULT NULL, national_pokedex_numbers LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_161498D3F19CEFA9 (supertype_id), UNIQUE INDEX UNIQ_161498D331CF6115 (evolves_from_id), INDEX IDX_161498D362C45E6C (card_set_id), INDEX IDX_161498D3F3747573 (rarity_id), UNIQUE INDEX UNIQ_161498D3D44F05E5 (images_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE card_subtype (card_id INT NOT NULL, subtype_id INT NOT NULL, INDEX IDX_271AFD44ACC9A20 (card_id), INDEX IDX_271AFD48E2E245C (subtype_id), PRIMARY KEY(card_id, subtype_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE card_type (card_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_60ED558B4ACC9A20 (card_id), INDEX IDX_60ED558BC54C8C93 (type_id), PRIMARY KEY(card_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE card_ability (card_id INT NOT NULL, ability_id INT NOT NULL, INDEX IDX_62D5644A4ACC9A20 (card_id), INDEX IDX_62D5644A8016D8B2 (ability_id), PRIMARY KEY(card_id, ability_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE card_attack (card_id INT NOT NULL, attack_id INT NOT NULL, INDEX IDX_35FF7E4F4ACC9A20 (card_id), INDEX IDX_35FF7E4FF5315759 (attack_id), PRIMARY KEY(card_id, attack_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE card_weakness (card_id INT NOT NULL, weakness_id INT NOT NULL, INDEX IDX_D6B9F3CA4ACC9A20 (card_id), INDEX IDX_D6B9F3CA908130BC (weakness_id), PRIMARY KEY(card_id, weakness_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE card_resistance (card_id INT NOT NULL, resistance_id INT NOT NULL, INDEX IDX_647E19EC4ACC9A20 (card_id), INDEX IDX_647E19EC9A7ED092 (resistance_id), PRIMARY KEY(card_id, resistance_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE card_legality (card_id INT NOT NULL, legality_id INT NOT NULL, INDEX IDX_67066B3D4ACC9A20 (card_id), INDEX IDX_67066B3DC24CFB57 (legality_id), PRIMARY KEY(card_id, legality_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, symbol VARCHAR(255) DEFAULT NULL, logo VARCHAR(255) DEFAULT NULL, small VARCHAR(255) DEFAULT NULL, large VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE legality (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(50) NOT NULL, value VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rarity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE resistance (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(20) NOT NULL, value VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `set` (id INT AUTO_INCREMENT NOT NULL, images_id INT DEFAULT NULL, tcg_id VARCHAR(50) NOT NULL, name VARCHAR(50) NOT NULL, series VARCHAR(20) NOT NULL, printed_total INT DEFAULT NULL, total INT DEFAULT NULL, ptcgo_code VARCHAR(20) DEFAULT NULL, release_date DATE NOT NULL, updated_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', UNIQUE INDEX UNIQ_E61425DCD44F05E5 (images_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE set_legality (set_id INT NOT NULL, legality_id INT NOT NULL, INDEX IDX_E0DE7E8310FB0D18 (set_id), INDEX IDX_E0DE7E83C24CFB57 (legality_id), PRIMARY KEY(set_id, legality_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE subtype (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE supertype (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE weakness (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(50) NOT NULL, value VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT FK_161498D3F19CEFA9 FOREIGN KEY (supertype_id) REFERENCES supertype (id)');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT FK_161498D331CF6115 FOREIGN KEY (evolves_from_id) REFERENCES card (id)');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT FK_161498D362C45E6C FOREIGN KEY (card_set_id) REFERENCES `set` (id)');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT FK_161498D3F3747573 FOREIGN KEY (rarity_id) REFERENCES rarity (id)');
        $this->addSql('ALTER TABLE card ADD CONSTRAINT FK_161498D3D44F05E5 FOREIGN KEY (images_id) REFERENCES images (id)');
        $this->addSql('ALTER TABLE card_subtype ADD CONSTRAINT FK_271AFD44ACC9A20 FOREIGN KEY (card_id) REFERENCES card (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_subtype ADD CONSTRAINT FK_271AFD48E2E245C FOREIGN KEY (subtype_id) REFERENCES subtype (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_type ADD CONSTRAINT FK_60ED558B4ACC9A20 FOREIGN KEY (card_id) REFERENCES card (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_type ADD CONSTRAINT FK_60ED558BC54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_ability ADD CONSTRAINT FK_62D5644A4ACC9A20 FOREIGN KEY (card_id) REFERENCES card (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_ability ADD CONSTRAINT FK_62D5644A8016D8B2 FOREIGN KEY (ability_id) REFERENCES ability (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_attack ADD CONSTRAINT FK_35FF7E4F4ACC9A20 FOREIGN KEY (card_id) REFERENCES card (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_attack ADD CONSTRAINT FK_35FF7E4FF5315759 FOREIGN KEY (attack_id) REFERENCES attack (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_weakness ADD CONSTRAINT FK_D6B9F3CA4ACC9A20 FOREIGN KEY (card_id) REFERENCES card (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_weakness ADD CONSTRAINT FK_D6B9F3CA908130BC FOREIGN KEY (weakness_id) REFERENCES weakness (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_resistance ADD CONSTRAINT FK_647E19EC4ACC9A20 FOREIGN KEY (card_id) REFERENCES card (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_resistance ADD CONSTRAINT FK_647E19EC9A7ED092 FOREIGN KEY (resistance_id) REFERENCES resistance (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_legality ADD CONSTRAINT FK_67066B3D4ACC9A20 FOREIGN KEY (card_id) REFERENCES card (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE card_legality ADD CONSTRAINT FK_67066B3DC24CFB57 FOREIGN KEY (legality_id) REFERENCES legality (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE `set` ADD CONSTRAINT FK_E61425DCD44F05E5 FOREIGN KEY (images_id) REFERENCES images (id)');
        $this->addSql('ALTER TABLE set_legality ADD CONSTRAINT FK_E0DE7E8310FB0D18 FOREIGN KEY (set_id) REFERENCES `set` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE set_legality ADD CONSTRAINT FK_E0DE7E83C24CFB57 FOREIGN KEY (legality_id) REFERENCES legality (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE card DROP FOREIGN KEY FK_161498D3F19CEFA9');
        $this->addSql('ALTER TABLE card DROP FOREIGN KEY FK_161498D331CF6115');
        $this->addSql('ALTER TABLE card DROP FOREIGN KEY FK_161498D362C45E6C');
        $this->addSql('ALTER TABLE card DROP FOREIGN KEY FK_161498D3F3747573');
        $this->addSql('ALTER TABLE card DROP FOREIGN KEY FK_161498D3D44F05E5');
        $this->addSql('ALTER TABLE card_subtype DROP FOREIGN KEY FK_271AFD44ACC9A20');
        $this->addSql('ALTER TABLE card_subtype DROP FOREIGN KEY FK_271AFD48E2E245C');
        $this->addSql('ALTER TABLE card_type DROP FOREIGN KEY FK_60ED558B4ACC9A20');
        $this->addSql('ALTER TABLE card_type DROP FOREIGN KEY FK_60ED558BC54C8C93');
        $this->addSql('ALTER TABLE card_ability DROP FOREIGN KEY FK_62D5644A4ACC9A20');
        $this->addSql('ALTER TABLE card_ability DROP FOREIGN KEY FK_62D5644A8016D8B2');
        $this->addSql('ALTER TABLE card_attack DROP FOREIGN KEY FK_35FF7E4F4ACC9A20');
        $this->addSql('ALTER TABLE card_attack DROP FOREIGN KEY FK_35FF7E4FF5315759');
        $this->addSql('ALTER TABLE card_weakness DROP FOREIGN KEY FK_D6B9F3CA4ACC9A20');
        $this->addSql('ALTER TABLE card_weakness DROP FOREIGN KEY FK_D6B9F3CA908130BC');
        $this->addSql('ALTER TABLE card_resistance DROP FOREIGN KEY FK_647E19EC4ACC9A20');
        $this->addSql('ALTER TABLE card_resistance DROP FOREIGN KEY FK_647E19EC9A7ED092');
        $this->addSql('ALTER TABLE card_legality DROP FOREIGN KEY FK_67066B3D4ACC9A20');
        $this->addSql('ALTER TABLE card_legality DROP FOREIGN KEY FK_67066B3DC24CFB57');
        $this->addSql('ALTER TABLE `set` DROP FOREIGN KEY FK_E61425DCD44F05E5');
        $this->addSql('ALTER TABLE set_legality DROP FOREIGN KEY FK_E0DE7E8310FB0D18');
        $this->addSql('ALTER TABLE set_legality DROP FOREIGN KEY FK_E0DE7E83C24CFB57');
        $this->addSql('DROP TABLE ability');
        $this->addSql('DROP TABLE attack');
        $this->addSql('DROP TABLE card');
        $this->addSql('DROP TABLE card_subtype');
        $this->addSql('DROP TABLE card_type');
        $this->addSql('DROP TABLE card_ability');
        $this->addSql('DROP TABLE card_attack');
        $this->addSql('DROP TABLE card_weakness');
        $this->addSql('DROP TABLE card_resistance');
        $this->addSql('DROP TABLE card_legality');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE legality');
        $this->addSql('DROP TABLE rarity');
        $this->addSql('DROP TABLE resistance');
        $this->addSql('DROP TABLE `set`');
        $this->addSql('DROP TABLE set_legality');
        $this->addSql('DROP TABLE subtype');
        $this->addSql('DROP TABLE supertype');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE weakness');
    }
}
