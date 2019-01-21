<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190123211711 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('postgresql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE EXTENSION IF NOT EXISTS postgis;');
        $this->addSql('CREATE EXTENSION IF NOT EXISTS postgis_topology;');

        $this->addSql('CREATE SEQUENCE groups_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE actor_reset_password_tokens_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE administrators_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE actors_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cities_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE actor_confirm_tokens_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE groups (id BIGINT NOT NULL, animator_id BIGINT NOT NULL, city_id BIGINT NOT NULL, name VARCHAR(50) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, uuid UUID NOT NULL, address VARCHAR(150) DEFAULT NULL, slug VARCHAR(255) NOT NULL, approved_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, refused_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F06D39705E237E06 ON groups (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F06D3970D17F50A6 ON groups (uuid)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F06D3970989D9B62 ON groups (slug)');
        $this->addSql('CREATE INDEX IDX_F06D397070FBD26D ON groups (animator_id)');
        $this->addSql('CREATE INDEX IDX_F06D39708BAC62AF ON groups (city_id)');
        $this->addSql('COMMENT ON COLUMN groups.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE actor_reset_password_tokens (id BIGINT NOT NULL, actor_id BIGINT DEFAULT NULL, uuid UUID NOT NULL, expired_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, consumed_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A5FB187BD17F50A6 ON actor_reset_password_tokens (uuid)');
        $this->addSql('CREATE INDEX IDX_A5FB187B10DAF24A ON actor_reset_password_tokens (actor_id)');
        $this->addSql('COMMENT ON COLUMN actor_reset_password_tokens.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE administrators (id BIGINT NOT NULL, email_address VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, google_authenticator_secret VARCHAR(255) DEFAULT NULL, roles TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX administrators_email_address_unique ON administrators (email_address)');
        $this->addSql('COMMENT ON COLUMN administrators.roles IS \'(DC2Type:simple_array)\'');
        $this->addSql('CREATE TABLE actors (id BIGINT NOT NULL, city_id BIGINT NOT NULL, email_address VARCHAR(255) NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, birthday DATE NOT NULL, gender VARCHAR(6) DEFAULT NULL, password VARCHAR(255) NOT NULL, registered_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, confirmed_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, uuid UUID NOT NULL, address VARCHAR(150) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DF2BF0E5D17F50A6 ON actors (uuid)');
        $this->addSql('CREATE INDEX IDX_DF2BF0E58BAC62AF ON actors (city_id)');
        $this->addSql('CREATE UNIQUE INDEX actors_email_address_unique ON actors (email_address)');
        $this->addSql('COMMENT ON COLUMN actors.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE cities (id BIGINT NOT NULL, country VARCHAR(3) NOT NULL, name VARCHAR(150) NOT NULL, zip_code VARCHAR(20) NOT NULL, canonical_zip_code VARCHAR(20) NOT NULL, coordinates Geometry(Point) NOT NULL, uuid UUID NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D95DB16BD17F50A6 ON cities (uuid)');
        $this->addSql('CREATE INDEX cities_zip_code_index ON cities (zip_code)');
        $this->addSql('CREATE INDEX cities_country_index ON cities (country)');
        $this->addSql('COMMENT ON COLUMN cities.coordinates IS \'(DC2Type:point)\'');
        $this->addSql('COMMENT ON COLUMN cities.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE actor_confirm_tokens (id BIGINT NOT NULL, actor_id BIGINT DEFAULT NULL, uuid UUID NOT NULL, expired_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, consumed_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AE6DC407D17F50A6 ON actor_confirm_tokens (uuid)');
        $this->addSql('CREATE INDEX IDX_AE6DC40710DAF24A ON actor_confirm_tokens (actor_id)');
        $this->addSql('COMMENT ON COLUMN actor_confirm_tokens.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE groups ADD CONSTRAINT FK_F06D397070FBD26D FOREIGN KEY (animator_id) REFERENCES actors (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE groups ADD CONSTRAINT FK_F06D39708BAC62AF FOREIGN KEY (city_id) REFERENCES cities (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE actor_reset_password_tokens ADD CONSTRAINT FK_A5FB187B10DAF24A FOREIGN KEY (actor_id) REFERENCES actors (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE actors ADD CONSTRAINT FK_DF2BF0E58BAC62AF FOREIGN KEY (city_id) REFERENCES cities (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE actor_confirm_tokens ADD CONSTRAINT FK_AE6DC40710DAF24A FOREIGN KEY (actor_id) REFERENCES actors (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('postgresql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE groups DROP CONSTRAINT FK_F06D397070FBD26D');
        $this->addSql('ALTER TABLE actor_reset_password_tokens DROP CONSTRAINT FK_A5FB187B10DAF24A');
        $this->addSql('ALTER TABLE actor_confirm_tokens DROP CONSTRAINT FK_AE6DC40710DAF24A');
        $this->addSql('ALTER TABLE groups DROP CONSTRAINT FK_F06D39708BAC62AF');
        $this->addSql('ALTER TABLE actors DROP CONSTRAINT FK_DF2BF0E58BAC62AF');
        $this->addSql('DROP SEQUENCE groups_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE actor_reset_password_tokens_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE administrators_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE actors_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cities_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE actor_confirm_tokens_id_seq CASCADE');
        $this->addSql('DROP TABLE groups');
        $this->addSql('DROP TABLE actor_reset_password_tokens');
        $this->addSql('DROP TABLE administrators');
        $this->addSql('DROP TABLE actors');
        $this->addSql('DROP TABLE cities');
        $this->addSql('DROP TABLE actor_confirm_tokens');
    }
}
