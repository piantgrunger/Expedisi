<?php

use yii\db\Migration;

/**
 * Class m180204_121932_tb_mt_invoice
 */
class m180204_121932_tb_mt_invoice extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_mt_invoice',[
            'id_invoice'=>$this->primaryKey(),
            'id_outlet' => $this->integer(),
            'no_invoice'=>$this->string()->notNull()->unique(),
            'tgl_invoice'=>$this->dateTime()->notNull(),
            'id_customer' => $this->integer()->notNull(),
            
            
            
            'created_at'=>$this->datetime(),
             'updated_at'=>$this->datetime(),
 
        ]        );
        $this->addForeignKey(
            'fk-invoice1',
            'tb_mt_invoice',
            'id_outlet',
            'tb_m_outlet',
            'id_outlet',
            'RESTRICT',
            'CASCADE'        
            );
            $this->addForeignKey(
                'fk-invoice2',
                'tb_mt_invoice',
                'id_customer',
                'tb_m_customer',
                'id_customer',
                'RESTRICT',
                'CASCADE'        
                );
               

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tb_mt_invoice');
   
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180204_121932_tb_mt_invoice cannot be reverted.\n";
222222222222222222222222222222222222221
        return false;
    }
    */
}
