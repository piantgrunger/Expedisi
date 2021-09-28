<?php

use yii\db\Migration;

class m171222_012005_alter_user extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'id_outlet', $this->integer()->Null());
          $this->addForeignKey(
            'fk-user-id_outlet',
            '{{%user}}',
            'id_outlet',
            'tb_m_outlet',
            'id_outlet',
            'CASCADE',
            'CASCADE'    
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey(
           'fk-user-id_outlet',
            '{{%user}}'
            );
          $this->dropColumn('{{%user}}', 'id_outlet');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171222_012005_alter_user cannot be reverted.\n";

        return false;
    }
    */
}
