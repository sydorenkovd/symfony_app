<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Type;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170515203859 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        if(!$schema->hasTable('users')) {
            // this up() migration is auto-generated, please modify it to your needs
            $users = $schema->createTable('users');
            $users->addColumn('id', Type::INTEGER, [
                'autoincrement' => true,
            ]);
            $users->setPrimaryKey(['id']);
            $users->addColumn('email', Type::STRING, [
                'notnull' => false,
                'unique' => true
            ]);
        }

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
