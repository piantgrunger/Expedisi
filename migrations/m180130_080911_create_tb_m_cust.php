<?php

use yii\db\Migration;

/**
 * Class m180130_080911_create_tb_m_cust
 */
class m180130_080911_create_tb_m_cust extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_m_customer',[
            'id_customer'=>$this->primaryKey(),
            'kode_customer'=>$this->string()->notNull()->unique(),
            'nama_customer' => $this->string()->notNull(),
            'alamat_customer' => $this->text()->notNull(),
            'created_at'=>$this->datetime(),
             'updated_at'=>$this->datetime(),
 
        ]

        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tb_m_customer'
               );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180130_080911_create_tb_m_cust cannot be reverted.\n";

        return false;
    }
    */
}
