<?php

use yii\db\Migration;

class m171221_161606_create_tb_m_outlet extends Migration
{
    public function safeUp()
    {
         $this->createTable('tb_m_outlet',[
             'id_outlet'=>$this->primaryKey(),
             'kode_outlet'=>$this->string()->notNull()->unique(),
             'nama_outlet' => $this->string()->notNull(),
             'alamat_outlet' => $this->text()->notNull(),
             'created_at'=>$this->datetime(),
              'updated_at'=>$this->datetime(),
  
         ]

         );
    }

    public function safeDown()
    {
        $this->dropTable('tb_m_outlet'
           );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171221_161606_create_tb_m_outlet cannot be reverted.\n";

        return false;
    }
    */
}
