<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20190112173055 extends AbstractMigration
{
    public function up(Schema $schema): void
    {
        $this->addSql('CREATE SEQUENCE administrators_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE administrators (id INT NOT NULL, email_address VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, google_authenticator_secret VARCHAR(255) DEFAULT NULL, roles TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX administrators_email_address_unique ON administrators (email_address)');
        $this->addSql('COMMENT ON COLUMN administrators.roles IS \'(DC2Type:simple_array)\'');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP SEQUENCE administrators_id_seq CASCADE');
        $this->addSql('DROP TABLE administrators');
    }
}
