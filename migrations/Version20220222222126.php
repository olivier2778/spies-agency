<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220222222126 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agent_speciality (agent_id INT NOT NULL, speciality_id INT NOT NULL, INDEX IDX_829171813414710B (agent_id), INDEX IDX_829171813B5A08D7 (speciality_id), PRIMARY KEY(agent_id, speciality_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agent_speciality ADD CONSTRAINT FK_829171813414710B FOREIGN KEY (agent_id) REFERENCES agent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE agent_speciality ADD CONSTRAINT FK_829171813B5A08D7 FOREIGN KEY (speciality_id) REFERENCES speciality (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE speciality_agent');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE speciality_agent (speciality_id INT NOT NULL, agent_id INT NOT NULL, INDEX IDX_F42FD6963B5A08D7 (speciality_id), INDEX IDX_F42FD6963414710B (agent_id), PRIMARY KEY(speciality_id, agent_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE speciality_agent ADD CONSTRAINT FK_F42FD6963414710B FOREIGN KEY (agent_id) REFERENCES agent (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE speciality_agent ADD CONSTRAINT FK_F42FD6963B5A08D7 FOREIGN KEY (speciality_id) REFERENCES speciality (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE agent_speciality');
        $this->addSql('ALTER TABLE agent CHANGE agent_last_name agent_last_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE agent_first_name agent_first_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE agent_identification_code agent_identification_code VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE contact CHANGE contact_last_name contact_last_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE contact_first_name contact_first_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE contact_code_name contact_code_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE country CHANGE country_name country_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE hideaway CHANGE hideaway_code hideaway_code VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE hideaway_adress hideaway_adress VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE mission CHANGE mission_title mission_title VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mission_description mission_description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mission_code_name mission_code_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE nationality CHANGE nationality_name nationality_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE speciality CHANGE speciality_name speciality_name VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE status CHANGE status_name status_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE target CHANGE target_last_name target_last_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE target_first_name target_first_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE target_code_name target_code_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE type_hideaway CHANGE type_hideaway_name type_hideaway_name VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE type_mission CHANGE type_mission_name type_mission_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_last_name user_last_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_first_name user_first_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
