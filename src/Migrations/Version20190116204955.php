<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20190116204955 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql('CREATE SEQUENCE actor_reset_password_tokens_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE administrators_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE actors_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cities_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE actor_reset_password_tokens (id BIGINT NOT NULL, actor_id BIGINT DEFAULT NULL, expired_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, consumed_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, uuid UUID NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A5FB187B10DAF24A ON actor_reset_password_tokens (actor_id)');
        $this->addSql('CREATE UNIQUE INDEX actor_reset_password_token_unique ON actor_reset_password_tokens (uuid)');
        $this->addSql('COMMENT ON COLUMN actor_reset_password_tokens.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE administrators (id BIGINT NOT NULL, email_address VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, google_authenticator_secret VARCHAR(255) DEFAULT NULL, roles TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX administrators_email_address_unique ON administrators (email_address)');
        $this->addSql('COMMENT ON COLUMN administrators.roles IS \'(DC2Type:simple_array)\'');
        $this->addSql('CREATE TABLE actors (id BIGINT NOT NULL, email_address VARCHAR(255) NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, birthday DATE NOT NULL, gender VARCHAR(6) DEFAULT NULL, password VARCHAR(255) NOT NULL, uuid UUID NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX acors_email_address_unique ON actors (email_address)');
        $this->addSql('COMMENT ON COLUMN actors.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE cities (id BIGINT NOT NULL, country VARCHAR(3) NOT NULL, name VARCHAR(150) NOT NULL, zip_code VARCHAR(20) NOT NULL, latitude NUMERIC(9, 6) NOT NULL, longitude NUMERIC(9, 6) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE actor_reset_password_tokens ADD CONSTRAINT FK_A5FB187B10DAF24A FOREIGN KEY (actor_id) REFERENCES actors (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE actor_reset_password_tokens DROP CONSTRAINT FK_A5FB187B10DAF24A');
        $this->addSql('DROP SEQUENCE actor_reset_password_tokens_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE administrators_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE actors_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cities_id_seq CASCADE');
        $this->addSql('DROP TABLE actor_reset_password_tokens');
        $this->addSql('DROP TABLE administrators');
        $this->addSql('DROP TABLE actors');
        $this->addSql('DROP TABLE cities');
    }
}
