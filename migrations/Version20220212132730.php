<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220212132730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agent (id INT AUTO_INCREMENT NOT NULL, agent_last_name VARCHAR(50) NOT NULL, agent_first_name VARCHAR(50) NOT NULL, agent_birth_date DATE NOT NULL, agent_identification_code VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, contact_last_name VARCHAR(50) NOT NULL, contact_first_name VARCHAR(50) NOT NULL, contact_birth_date DATE NOT NULL, contact_code_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE country (id INT AUTO_INCREMENT NOT NULL, country_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hideaway (id INT AUTO_INCREMENT NOT NULL, hideaway_code VARCHAR(50) NOT NULL, hideaway_adress VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mission (id INT AUTO_INCREMENT NOT NULL, mission_title VARCHAR(100) NOT NULL, mission_description LONGTEXT NOT NULL, mission_code_name VARCHAR(50) NOT NULL, mission_start_date DATE NOT NULL, mission_end_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nationality (id INT AUTO_INCREMENT NOT NULL, nationality_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE speciality (id INT AUTO_INCREMENT NOT NULL, speciality_name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE status (id INT AUTO_INCREMENT NOT NULL, status_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE target (id INT AUTO_INCREMENT NOT NULL, target_last_name VARCHAR(50) NOT NULL, target_first_name VARCHAR(50) NOT NULL, target_birth_date DATE NOT NULL, target_code_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_hideaway (id INT AUTO_INCREMENT NOT NULL, type_hideaway_name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_mission (id INT AUTO_INCREMENT NOT NULL, type_mission_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(180) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE agent');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE country');
        $this->addSql('DROP TABLE hideaway');
        $this->addSql('DROP TABLE mission');
        $this->addSql('DROP TABLE nationality');
        $this->addSql('DROP TABLE speciality');
        $this->addSql('DROP TABLE status');
        $this->addSql('DROP TABLE target');
        $this->addSql('DROP TABLE type_hideaway');
        $this->addSql('DROP TABLE type_mission');
        $this->addSql('ALTER TABLE user CHANGE email email VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE password password VARCHAR(100) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_last_name user_last_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE user_first_name user_first_name VARCHAR(50) NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
