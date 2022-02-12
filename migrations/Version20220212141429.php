<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220212141429 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent ADD nationality_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE agent ADD CONSTRAINT FK_268B9C9D1C9DA55 FOREIGN KEY (nationality_id) REFERENCES nationality (id)');
        $this->addSql('CREATE INDEX IDX_268B9C9D1C9DA55 ON agent (nationality_id)');
        $this->addSql('ALTER TABLE contact ADD nationality_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE contact ADD CONSTRAINT FK_4C62E6381C9DA55 FOREIGN KEY (nationality_id) REFERENCES nationality (id)');
        $this->addSql('CREATE INDEX IDX_4C62E6381C9DA55 ON contact (nationality_id)');
        $this->addSql('ALTER TABLE hideaway ADD country_id INT DEFAULT NULL, ADD type_hideaway_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE hideaway ADD CONSTRAINT FK_3DAEA5EDF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('ALTER TABLE hideaway ADD CONSTRAINT FK_3DAEA5ED6E7C972C FOREIGN KEY (type_hideaway_id) REFERENCES type_hideaway (id)');
        $this->addSql('CREATE INDEX IDX_3DAEA5EDF92F3E70 ON hideaway (country_id)');
        $this->addSql('CREATE INDEX IDX_3DAEA5ED6E7C972C ON hideaway (type_hideaway_id)');
        $this->addSql('ALTER TABLE mission ADD type_mission_id INT DEFAULT NULL, ADD status_id INT DEFAULT NULL, ADD speciality_id INT DEFAULT NULL, ADD country_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23CA36F78B5 FOREIGN KEY (type_mission_id) REFERENCES type_mission (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23C6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23C3B5A08D7 FOREIGN KEY (speciality_id) REFERENCES speciality (id)');
        $this->addSql('ALTER TABLE mission ADD CONSTRAINT FK_9067F23CF92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_9067F23CA36F78B5 ON mission (type_mission_id)');
        $this->addSql('CREATE INDEX IDX_9067F23C6BF700BD ON mission (status_id)');
        $this->addSql('CREATE INDEX IDX_9067F23C3B5A08D7 ON mission (speciality_id)');
        $this->addSql('CREATE INDEX IDX_9067F23CF92F3E70 ON mission (country_id)');
        $this->addSql('ALTER TABLE target ADD mission_id INT NOT NULL, ADD nationality_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE target ADD CONSTRAINT FK_466F2FFCBE6CAE90 FOREIGN KEY (mission_id) REFERENCES mission (id)');
        $this->addSql('ALTER TABLE target ADD CONSTRAINT FK_466F2FFC1C9DA55 FOREIGN KEY (nationality_id) REFERENCES nationality (id)');
        $this->addSql('CREATE INDEX IDX_466F2FFCBE6CAE90 ON target (mission_id)');
        $this->addSql('CREATE INDEX IDX_466F2FFC1C9DA55 ON target (nationality_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent DROP FOREIGN KEY FK_268B9C9D1C9DA55');
        $this->addSql('DROP INDEX IDX_268B9C9D1C9DA55 ON agent');
        $this->addSql('ALTER TABLE agent DROP nationality_id, CHANGE agent_last_name agent_last_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE agent_first_name agent_first_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE agent_identification_code agent_identification_code VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE contact DROP FOREIGN KEY FK_4C62E6381C9DA55');
        $this->addSql('DROP INDEX IDX_4C62E6381C9DA55 ON contact');
        $this->addSql('ALTER TABLE contact DROP nationality_id, CHANGE contact_last_name contact_last_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE contact_first_name contact_first_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE contact_code_name contact_code_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE country CHANGE country_name country_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE hideaway DROP FOREIGN KEY FK_3DAEA5EDF92F3E70');
        $this->addSql('ALTER TABLE hideaway DROP FOREIGN KEY FK_3DAEA5ED6E7C972C');
        $this->addSql('DROP INDEX IDX_3DAEA5EDF92F3E70 ON hideaway');
        $this->addSql('DROP INDEX IDX_3DAEA5ED6E7C972C ON hideaway');
        $this->addSql('ALTER TABLE hideaway DROP country_id, DROP type_hideaway_id, CHANGE hideaway_code hideaway_code VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE hideaway_adress hideaway_adress VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23CA36F78B5');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23C6BF700BD');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23C3B5A08D7');
        $this->addSql('ALTER TABLE mission DROP FOREIGN KEY FK_9067F23CF92F3E70');
        $this->addSql('DROP INDEX IDX_9067F23CA36F78B5 ON mission');
        $this->addSql('DROP INDEX IDX_9067F23C6BF700BD ON mission');
        $this->addSql('DROP INDEX IDX_9067F23C3B5A08D7 ON mission');
        $this->addSql('DROP INDEX IDX_9067F23CF92F3E70 ON mission');
        $this->addSql('ALTER TABLE mission DROP type_mission_id, DROP status_id, DROP speciality_id, DROP country_id, CHANGE mission_title mission_title VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mission_description mission_description LONGTEXT NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE mission_code_name mission_code_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE nationality CHANGE nationality_name nationality_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE speciality CHANGE speciality_name speciality_name VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE status CHANGE status_name status_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE target DROP FOREIGN KEY FK_466F2FFCBE6CAE90');
        $this->addSql('ALTER TABLE target DROP FOREIGN KEY FK_466F2FFC1C9DA55');
        $this->addSql('DROP INDEX IDX_466F2FFCBE6CAE90 ON target');
        $this->addSql('DROP INDEX IDX_466F2FFC1C9DA55 ON target');
        $this->addSql('ALTER TABLE target DROP mission_id, DROP nationality_id, CHANGE target_last_name target_last_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE target_first_name target_first_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE target_code_name target_code_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE type_hideaway CHANGE type_hideaway_name type_hideaway_name VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE type_mission CHANGE type_mission_name type_mission_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(255) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_last_name user_last_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_first_name user_first_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
