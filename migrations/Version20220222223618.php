<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220222223618 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agent (id INT AUTO_INCREMENT NOT NULL, nationality_id INT DEFAULT NULL, agent_last_name VARCHAR(50) NOT NULL, agent_first_name VARCHAR(50) NOT NULL, agent_birth_date DATE NOT NULL, agent_identification_code VARCHAR(50) NOT NULL, INDEX IDX_268B9C9D1C9DA55 (nationality_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agent_speciality (agent_id INT NOT NULL, speciality_id INT NOT NULL, INDEX IDX_829171813414710B (agent_id), INDEX IDX_829171813B5A08D7 (speciality_id), PRIMARY KEY(agent_id, speciality_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nationality_id INT DEFAULT NULL, contact_last_name VARCHAR(50) NOT NULL, contact_first_name VARCHAR(50) NOT NULL, contact_birth_date DATE NOT NULL, contact_code_name VARCHAR(50) NOT NULL, INDEX IDX_4C62E6381C9DA55 (nationality_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, country_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hideaway (id INT AUTO_INCREMENT NOT NULL, country_id INT DEFAULT NULL, type_hideaway_id INT DEFAULT NULL, hideaway_code VARCHAR(50) NOT NULL, hideaway_adress VARCHAR(255) NOT NULL, INDEX IDX_3DAEA5EDF92F3E70 (country_id), INDEX IDX_3DAEA5ED6E7C972C (type_hideaway_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mission (id INT AUTO_INCREMENT NOT NULL, type_mission_id INT NOT NULL, status_id INT NOT NULL, speciality_id INT NOT NULL, country_id INT NOT NULL, mission_title VARCHAR(100) NOT NULL, mission_description LONGTEXT NOT NULL, mission_code_name VARCHAR(50) NOT NULL, mission_start_date DATE NOT NULL, mission_end_date DATE NOT NULL, INDEX IDX_9067F23CA36F78B5 (type_mission_id), INDEX IDX_9067F23C6BF700BD (status_id), INDEX IDX_9067F23C3B5A08D7 (speciality_id), INDEX IDX_9067F23CF92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mission_target (mission_id INT NOT NULL, target_id INT NOT NULL, INDEX IDX_1E97F5B2BE6CAE90 (mission_id), INDEX IDX_1E97F5B2158E0B66 (target_id), PRIMARY KEY(mission_id, target_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mission_agent (mission_id INT NOT NULL, agent_id INT NOT NULL, INDEX IDX_B61DC3A0BE6CAE90 (mission_id), INDEX IDX_B61DC3A03414710B (agent_id), PRIMARY KEY(mission_id, agent_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mission_contact (mission_id INT NOT NULL, contact_id INT NOT NULL, INDEX IDX_DD5E7275BE6CAE90 (mission_id), INDEX IDX_DD5E7275E7A1254A (contact_id), PRIMARY KEY(mission_id, contact_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mission_hideaway (mission_id INT NOT NULL, hideaway_id INT NOT NULL, INDEX IDX_3552A454BE6CAE90 (mission_id), INDEX IDX_3552A454256540BD (hideaway_id), PRIMARY KEY(mission_id, hideaway_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nationality (id INT AUTO_INCREMENT NOT NULL, nationality_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speciality (id INT AUTO_INCREMENT NOT NULL, speciality_name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, status_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE target (id INT AUTO_INCREMENT NOT NULL, nationality_id INT NOT NULL, target_last_name VARCHAR(50) NOT NULL, target_first_name VARCHAR(50) NOT NULL, target_birth_date DATE NOT NULL, target_code_name VARCHAR(50) NOT NULL, INDEX IDX_466F2FFC1C9DA55 (nationality_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_hideaway (id INT AUTO_INCREMENT NOT NULL, type_hideaway_name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_mission (id INT AUTO_INCREMENT NOT NULL, type_mission_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, user_last_name VARCHAR(50) NOT NULL, user_first_name VARCHAR(50) NOT NULL, user_creation DATETIME NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agent ADD CONSTRAINT FK_268B9C9D1C9DA55 FOREIGN KEY (nationality_id) REFERENCES nationality (id)');
        $this->addSql('ALTER TABLE agent_speciality ADD CONSTRAINT FK_829171813414710B FOREIGN KEY (agent_id) REFERENCES agent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agent_speciality ADD CONSTRAINT FK_829171813B5A08D7 FOREIGN KEY (speciality_id) REFERENCES speciality (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6381C9DA55 FOREIGN KEY (nationality_id) REFERENCES nationality (id)');
        $this->addSql('ALTER TABLE hideaway ADD CONSTRAINT FK_3DAEA5EDF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE hideaway ADD CONSTRAINT FK_3DAEA5ED6E7C972C FOREIGN KEY (type_hideaway_id) REFERENCES type_hideaway (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23CA36F78B5 FOREIGN KEY (type_mission_id) REFERENCES type_mission (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23C6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23C3B5A08D7 FOREIGN KEY (speciality_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23CF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE mission_target ADD CONSTRAINT FK_1E97F5B2BE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mission_target ADD CONSTRAINT FK_1E97F5B2158E0B66 FOREIGN KEY (target_id) REFERENCES target (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mission_agent ADD CONSTRAINT FK_B61DC3A0BE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mission_agent ADD CONSTRAINT FK_B61DC3A03414710B FOREIGN KEY (agent_id) REFERENCES agent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mission_contact ADD CONSTRAINT FK_DD5E7275BE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mission_contact ADD CONSTRAINT FK_DD5E7275E7A1254A FOREIGN KEY (contact_id) REFERENCES contact (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mission_hideaway ADD CONSTRAINT FK_3552A454BE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE mission_hideaway ADD CONSTRAINT FK_3552A454256540BD FOREIGN KEY (hideaway_id) REFERENCES hideaway (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE target ADD CONSTRAINT FK_466F2FFC1C9DA55 FOREIGN KEY (nationality_id) REFERENCES nationality (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent_speciality DROP FOREIGN KEY FK_829171813414710B');
        $this->addSql('ALTER TABLE mission_agent DROP FOREIGN KEY FK_B61DC3A03414710B');
        $this->addSql('ALTER TABLE mission_contact DROP FOREIGN KEY FK_DD5E7275E7A1254A');
        $this->addSql('ALTER TABLE hideaway DROP FOREIGN KEY FK_3DAEA5EDF92F3E70');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23CF92F3E70');
        $this->addSql('ALTER TABLE mission_hideaway DROP FOREIGN KEY FK_3552A454256540BD');
        $this->addSql('ALTER TABLE mission_target DROP FOREIGN KEY FK_1E97F5B2BE6CAE90');
        $this->addSql('ALTER TABLE mission_agent DROP FOREIGN KEY FK_B61DC3A0BE6CAE90');
        $this->addSql('ALTER TABLE mission_contact DROP FOREIGN KEY FK_DD5E7275BE6CAE90');
        $this->addSql('ALTER TABLE mission_hideaway DROP FOREIGN KEY FK_3552A454BE6CAE90');
        $this->addSql('ALTER TABLE agent DROP FOREIGN KEY FK_268B9C9D1C9DA55');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6381C9DA55');
        $this->addSql('ALTER TABLE target DROP FOREIGN KEY FK_466F2FFC1C9DA55');
        $this->addSql('ALTER TABLE agent_speciality DROP FOREIGN KEY FK_829171813B5A08D7');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23C3B5A08D7');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23C6BF700BD');
        $this->addSql('ALTER TABLE mission_target DROP FOREIGN KEY FK_1E97F5B2158E0B66');
        $this->addSql('ALTER TABLE hideaway DROP FOREIGN KEY FK_3DAEA5ED6E7C972C');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23CA36F78B5');
        $this->addSql('DROP TABLE agent');
        $this->addSql('DROP TABLE agent_speciality');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE hideaway');
        $this->addSql('DROP TABLE mission');
        $this->addSql('DROP TABLE mission_target');
        $this->addSql('DROP TABLE mission_agent');
        $this->addSql('DROP TABLE mission_contact');
        $this->addSql('DROP TABLE mission_hideaway');
        $this->addSql('DROP TABLE nationality');
        $this->addSql('DROP TABLE speciality');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE target');
        $this->addSql('DROP TABLE type_hideaway');
        $this->addSql('DROP TABLE type_mission');
        $this->addSql('DROP TABLE user');
    }
}
