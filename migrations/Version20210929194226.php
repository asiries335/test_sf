<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210929194226 extends AbstractMigration
{
    public function getDescription(): string {
        return "create a table of clients";
    }

    public function up(Schema $schema): void {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(
            'CREATE TABLE clients (
                id INT NOT NULL, 
                email VARCHAR(50) NOT NULL, 
                phone_number VARCHAR(16) NOT NULL, 
                first_name VARCHAR(32) NOT NULL,
                last_name VARCHAR(32) NOT NULL,
                PRIMARY KEY(id)
            )'
        );
    }

    public function down(Schema $schema): void {
        $this->addSql('DROP TABLE clients');
    }
}
