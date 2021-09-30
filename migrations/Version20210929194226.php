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
        $this->addSql(
            'CREATE TABLE "clients" (
                    "id" serial NOT NULL,
                    "email" varchar(255) NOT NULL UNIQUE,
                    "first_name" varchar(32) NOT NULL,
                    "last_name" varchar(32) NOT NULL,
                    "phone_number" varchar(32) NOT NULL UNIQUE,
                    CONSTRAINT "clients_pk" PRIMARY KEY ("id")
                )'
        );

        $this->addSql(
            'CREATE TABLE "applications" (
                    "id" serial NOT NULL,
                    "client_id" integer NOT NULL,
                    "term" integer NOT NULL,
                    "amount" FLOAT NOT NULL,
                    "currency" varchar(10) NOT NULL,
                    CONSTRAINT "applications_pk" PRIMARY KEY ("id")
                )'
        );

        $this->addSql('ALTER TABLE "applications" ADD CONSTRAINT "applications_fk0" FOREIGN KEY ("client_id") REFERENCES "clients"("id");');
    }

    public function down(Schema $schema): void {

    }
}
