<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20190216223833 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql('CREATE SEQUENCE actor_confirm_tokens_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE actor_reset_password_tokens_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE administrators_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE groups_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE cities_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE events_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE actors_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE configuration_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE co_animator_memberships_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE follower_memberships_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE actor_confirm_tokens (id BIGINT NOT NULL, actor_id BIGINT DEFAULT NULL, uuid UUID NOT NULL, expired_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, consumed_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_AE6DC407D17F50A6 ON actor_confirm_tokens (uuid)');
        $this->addSql('CREATE INDEX IDX_AE6DC40710DAF24A ON actor_confirm_tokens (actor_id)');
        $this->addSql('COMMENT ON COLUMN actor_confirm_tokens.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE actor_reset_password_tokens (id BIGINT NOT NULL, actor_id BIGINT DEFAULT NULL, uuid UUID NOT NULL, expired_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, consumed_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A5FB187BD17F50A6 ON actor_reset_password_tokens (uuid)');
        $this->addSql('CREATE INDEX IDX_A5FB187B10DAF24A ON actor_reset_password_tokens (actor_id)');
        $this->addSql('COMMENT ON COLUMN actor_reset_password_tokens.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE administrators (id BIGINT NOT NULL, email_address VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, google_authenticator_secret VARCHAR(255) DEFAULT NULL, roles TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX administrators_email_address_unique ON administrators (email_address)');
        $this->addSql('COMMENT ON COLUMN administrators.roles IS \'(DC2Type:simple_array)\'');
        $this->addSql('CREATE TABLE groups (id BIGINT NOT NULL, animator_id BIGINT NOT NULL, city_id BIGINT NOT NULL, name VARCHAR(50) NOT NULL, description TEXT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, uuid UUID NOT NULL, address VARCHAR(150) DEFAULT NULL, coordinates Geometry(Point) DEFAULT NULL, coordinates_accuracy VARCHAR(10) DEFAULT NULL, slug VARCHAR(255) NOT NULL, approved_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, refused_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F06D39705E237E06 ON groups (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F06D3970D17F50A6 ON groups (uuid)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F06D3970989D9B62 ON groups (slug)');
        $this->addSql('CREATE INDEX IDX_F06D397070FBD26D ON groups (animator_id)');
        $this->addSql('CREATE INDEX IDX_F06D39708BAC62AF ON groups (city_id)');
        $this->addSql('COMMENT ON COLUMN groups.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN groups.coordinates IS \'(DC2Type:point)\'');
        $this->addSql('CREATE TABLE cities (id BIGINT NOT NULL, country VARCHAR(3) NOT NULL, name VARCHAR(150) NOT NULL, zip_code VARCHAR(20) NOT NULL, canonical_zip_code VARCHAR(20) NOT NULL, coordinates Geometry(Point) NOT NULL, uuid UUID NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D95DB16BD17F50A6 ON cities (uuid)');
        $this->addSql('CREATE INDEX cities_zip_code_index ON cities (zip_code)');
        $this->addSql('CREATE INDEX cities_country_index ON cities (country)');
        $this->addSql('COMMENT ON COLUMN cities.coordinates IS \'(DC2Type:point)\'');
        $this->addSql('COMMENT ON COLUMN cities.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE events (id BIGINT NOT NULL, creator_id BIGINT NOT NULL, group_id BIGINT NOT NULL, city_id BIGINT NOT NULL, name VARCHAR(50) NOT NULL, description TEXT NOT NULL, begin_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, finish_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, uuid UUID NOT NULL, address VARCHAR(150) DEFAULT NULL, coordinates Geometry(Point) DEFAULT NULL, coordinates_accuracy VARCHAR(10) DEFAULT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5387574A5E237E06 ON events (name)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5387574AD17F50A6 ON events (uuid)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5387574A989D9B62 ON events (slug)');
        $this->addSql('CREATE INDEX IDX_5387574A61220EA6 ON events (creator_id)');
        $this->addSql('CREATE INDEX IDX_5387574AFE54D947 ON events (group_id)');
        $this->addSql('CREATE INDEX IDX_5387574A8BAC62AF ON events (city_id)');
        $this->addSql('COMMENT ON COLUMN events.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN events.coordinates IS \'(DC2Type:point)\'');
        $this->addSql('CREATE TABLE actors (id BIGINT NOT NULL, city_id BIGINT NOT NULL, email_address VARCHAR(255) NOT NULL, first_name VARCHAR(50) NOT NULL, last_name VARCHAR(50) NOT NULL, birthday DATE NOT NULL, gender VARCHAR(6) DEFAULT NULL, password VARCHAR(255) NOT NULL, registered_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, confirmed_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, uuid UUID NOT NULL, address VARCHAR(150) DEFAULT NULL, coordinates Geometry(Point) DEFAULT NULL, coordinates_accuracy VARCHAR(10) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_DF2BF0E5D17F50A6 ON actors (uuid)');
        $this->addSql('CREATE INDEX IDX_DF2BF0E58BAC62AF ON actors (city_id)');
        $this->addSql('CREATE UNIQUE INDEX actors_email_address_unique ON actors (email_address)');
        $this->addSql('COMMENT ON COLUMN actors.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN actors.coordinates IS \'(DC2Type:point)\'');
        $this->addSql('CREATE TABLE configuration (id BIGINT NOT NULL, party_name VARCHAR(50) NOT NULL, party_logo VARCHAR(50) NOT NULL, party_website VARCHAR(200) NOT NULL, color_primary VARCHAR(8) NOT NULL, font_primary VARCHAR(50) NOT NULL, font_mono VARCHAR(50) NOT NULL, favicon VARCHAR(50) NOT NULL, meta_description VARCHAR(200) NOT NULL, meta_image VARCHAR(50) NOT NULL, meta_google_analytics_id VARCHAR(30) DEFAULT NULL, home_image VARCHAR(100) NOT NULL, home_intro_subtitle VARCHAR(50) NOT NULL, home_intro_title VARCHAR(30) NOT NULL, home_intro_button VARCHAR(50) NOT NULL, home_display_map BOOLEAN NOT NULL, email_sender VARCHAR(200) NOT NULL, email_sender_name VARCHAR(50) DEFAULT NULL, email_contact VARCHAR(200) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE co_animator_memberships (id BIGINT NOT NULL, actor_id BIGINT NOT NULL, group_id BIGINT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, uuid UUID NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1DEA70D8D17F50A6 ON co_animator_memberships (uuid)');
        $this->addSql('CREATE INDEX IDX_1DEA70D810DAF24A ON co_animator_memberships (actor_id)');
        $this->addSql('CREATE INDEX IDX_1DEA70D8FE54D947 ON co_animator_memberships (group_id)');
        $this->addSql('CREATE UNIQUE INDEX co_animator_memberships_group_actor_unique ON co_animator_memberships (group_id, actor_id)');
        $this->addSql('COMMENT ON COLUMN co_animator_memberships.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE follower_memberships (id BIGINT NOT NULL, actor_id BIGINT NOT NULL, group_id BIGINT NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, uuid UUID NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CA3C50D5D17F50A6 ON follower_memberships (uuid)');
        $this->addSql('CREATE INDEX IDX_CA3C50D510DAF24A ON follower_memberships (actor_id)');
        $this->addSql('CREATE INDEX IDX_CA3C50D5FE54D947 ON follower_memberships (group_id)');
        $this->addSql('CREATE UNIQUE INDEX follower_memberships_group_actor_unique ON follower_memberships (group_id, actor_id)');
        $this->addSql('COMMENT ON COLUMN follower_memberships.uuid IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE actor_confirm_tokens ADD CONSTRAINT FK_AE6DC40710DAF24A FOREIGN KEY (actor_id) REFERENCES actors (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE actor_reset_password_tokens ADD CONSTRAINT FK_A5FB187B10DAF24A FOREIGN KEY (actor_id) REFERENCES actors (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE groups ADD CONSTRAINT FK_F06D397070FBD26D FOREIGN KEY (animator_id) REFERENCES actors (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE groups ADD CONSTRAINT FK_F06D39708BAC62AF FOREIGN KEY (city_id) REFERENCES cities (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A61220EA6 FOREIGN KEY (creator_id) REFERENCES actors (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574AFE54D947 FOREIGN KEY (group_id) REFERENCES groups (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A8BAC62AF FOREIGN KEY (city_id) REFERENCES cities (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE actors ADD CONSTRAINT FK_DF2BF0E58BAC62AF FOREIGN KEY (city_id) REFERENCES cities (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE co_animator_memberships ADD CONSTRAINT FK_1DEA70D810DAF24A FOREIGN KEY (actor_id) REFERENCES actors (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE co_animator_memberships ADD CONSTRAINT FK_1DEA70D8FE54D947 FOREIGN KEY (group_id) REFERENCES groups (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE follower_memberships ADD CONSTRAINT FK_CA3C50D510DAF24A FOREIGN KEY (actor_id) REFERENCES actors (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE follower_memberships ADD CONSTRAINT FK_CA3C50D5FE54D947 FOREIGN KEY (group_id) REFERENCES groups (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('ALTER TABLE events DROP CONSTRAINT FK_5387574AFE54D947');
        $this->addSql('ALTER TABLE co_animator_memberships DROP CONSTRAINT FK_1DEA70D8FE54D947');
        $this->addSql('ALTER TABLE follower_memberships DROP CONSTRAINT FK_CA3C50D5FE54D947');
        $this->addSql('ALTER TABLE groups DROP CONSTRAINT FK_F06D39708BAC62AF');
        $this->addSql('ALTER TABLE events DROP CONSTRAINT FK_5387574A8BAC62AF');
        $this->addSql('ALTER TABLE actors DROP CONSTRAINT FK_DF2BF0E58BAC62AF');
        $this->addSql('ALTER TABLE actor_confirm_tokens DROP CONSTRAINT FK_AE6DC40710DAF24A');
        $this->addSql('ALTER TABLE actor_reset_password_tokens DROP CONSTRAINT FK_A5FB187B10DAF24A');
        $this->addSql('ALTER TABLE groups DROP CONSTRAINT FK_F06D397070FBD26D');
        $this->addSql('ALTER TABLE events DROP CONSTRAINT FK_5387574A61220EA6');
        $this->addSql('ALTER TABLE co_animator_memberships DROP CONSTRAINT FK_1DEA70D810DAF24A');
        $this->addSql('ALTER TABLE follower_memberships DROP CONSTRAINT FK_CA3C50D510DAF24A');
        $this->addSql('DROP SEQUENCE actor_confirm_tokens_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE actor_reset_password_tokens_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE administrators_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE groups_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE cities_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE events_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE actors_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE configuration_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE co_animator_memberships_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE follower_memberships_id_seq CASCADE');
        $this->addSql('DROP TABLE actor_confirm_tokens');
        $this->addSql('DROP TABLE actor_reset_password_tokens');
        $this->addSql('DROP TABLE administrators');
        $this->addSql('DROP TABLE groups');
        $this->addSql('DROP TABLE cities');
        $this->addSql('DROP TABLE events');
        $this->addSql('DROP TABLE actors');
        $this->addSql('DROP TABLE configuration');
        $this->addSql('DROP TABLE co_animator_memberships');
        $this->addSql('DROP TABLE follower_memberships');
    }
}
