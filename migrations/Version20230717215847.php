<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230717215847 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE data_history (id INT AUTO_INCREMENT NOT NULL, module_id_id INT NOT NULL, data_type_id_id INT NOT NULL, value INT NOT NULL, INDEX IDX_43B126BA7648EE39 (module_id_id), INDEX IDX_43B126BABE7D2379 (data_type_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE data_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, value_type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE module (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, status TINYINT(1) NOT NULL, active_date DATE NOT NULL, added_date DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE working_history (id INT AUTO_INCREMENT NOT NULL, module_id_id INT NOT NULL, status TINYINT(1) NOT NULL, date DATE DEFAULT NULL, INDEX IDX_F9CAD20B7648EE39 (module_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE data_history ADD CONSTRAINT FK_43B126BA7648EE39 FOREIGN KEY (module_id_id) REFERENCES module (id)');
        $this->addSql('ALTER TABLE data_history ADD CONSTRAINT FK_43B126BABE7D2379 FOREIGN KEY (data_type_id_id) REFERENCES data_type (id)');
        $this->addSql('ALTER TABLE working_history ADD CONSTRAINT FK_F9CAD20B7648EE39 FOREIGN KEY (module_id_id) REFERENCES module (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE data_history DROP FOREIGN KEY FK_43B126BA7648EE39');
        $this->addSql('ALTER TABLE data_history DROP FOREIGN KEY FK_43B126BABE7D2379');
        $this->addSql('ALTER TABLE working_history DROP FOREIGN KEY FK_F9CAD20B7648EE39');
        $this->addSql('DROP TABLE data_history');
        $this->addSql('DROP TABLE data_type');
        $this->addSql('DROP TABLE module');
        $this->addSql('DROP TABLE working_history');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
