<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20190115113035 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $this->addSql('CREATE SEQUENCE actors_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cities_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE administrators_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE actors (id BIGINT NOT NULL, email_address VARCHAR(255) NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, birthday DATE NOT NULL, gender VARCHAR(6) DEFAULT NULL, password VARCHAR(255) NOT NULL, uuid UUID NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX acors_email_address_unique ON actors (email_address)');
        $this->addSql('COMMENT ON COLUMN actors.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE cities (id BIGINT NOT NULL, country VARCHAR(3) NOT NULL, name VARCHAR(150) NOT NULL, zip_code VARCHAR(20) NOT NULL, latitude NUMERIC(9, 6) NOT NULL, longitude NUMERIC(9, 6) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE administrators (id BIGINT NOT NULL, email_address VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, google_authenticator_secret VARCHAR(255) DEFAULT NULL, roles TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX administrators_email_address_unique ON administrators (email_address)');
        $this->addSql('COMMENT ON COLUMN administrators.roles IS \'(DC2Type:simple_array)\'');
    }

    public function down(Schema $schema)
    {
        $this->addSql('DROP SEQUENCE actors_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cities_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE administrators_id_seq CASCADE');
        $this->addSql('DROP TABLE actors');
        $this->addSql('DROP TABLE cities');
        $this->addSql('DROP TABLE administrators');
    }
}
