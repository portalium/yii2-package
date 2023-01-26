<?php

use yii\db\Schema;
use yii\db\Migration;
use diginova\flow\Module;
use portalium\user\Module as UserModule;

class m211115_010203_{{module}} extends Migration
{

    public function safeUp()
    {
        $tableOptions = 'ENGINE=InnoDB';

        $this->createTable(
            '{{%' . Module::$tablePrefix . '{{module}}}}',
            [
                'id_{{module}}'=> $this->primaryKey(),
                'name'=> $this->string(255)->notNull(),
                'id_user'=> $this->integer(11)->notNull(),
                'date_create'=> $this->datetime()->notNull()->defaultExpression("CURRENT_TIMESTAMP"),
                'date_update'=> $this->datetime()->notNull()->defaultExpression("CURRENT_TIMESTAMP"),
            ],$tableOptions
        );
        // creates index for column `id_user`
        $this->createIndex(
            '{{%idx-' . Module::$tablePrefix . '{{module}}-id_user}}',
            '{{%' . Module::$tablePrefix . '{{module}}}}',
            'id_user'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-' . Module::$tablePrefix . '{{module}}-id_user}}',
            '{{%' . Module::$tablePrefix . '{{module}}}}',
            'id_user',
            '{{%' . UserModule::$tablePrefix . 'user}}',
            'id_user',
            'RESTRICT'
        );
    }

    public function safeDown()
    {
        $this->dropTable('{{%' . Module::$tablePrefix . '{{module}}}}');
    }
}
