<?php

use yii\db\Migration;

/**
 * Class m180204_130303_create_tb_dt_invoice
 */
class m180204_130303_create_tb_dt_invoice extends Migration
{
    public function safeUp()
    {
    $this->createTable('tb_dt_invoice',[
        'id_det_invoice'=>$this->primaryKey(),
        'id_invoice' => $this->integer()->notNull(),
        'id_resi' => $this->integer()->notNull(),
        'sub_total'=> $this->decimal(19,2)->notNull(),
         
        'keterangan' => $this->text(),
        'created_at'=>$this->datetime(),
        'updated_at'=>$this->datetime(),
    ]); $this->addForeignKey(
        'fk-invoicedetail',
        'tb_dt_invoice',
        'id_invoice',
        'tb_mt_invoice',
        'id_invoice',
        'CASCADE',
        'CASCADE'        
        );
        $this->addForeignKey(
            'fk-invoiceresi',
            'tb_dt_invoice',
            'id_resi',
            'tb_mt_resi',
            'id_resi',
            'RESTRICT',
            'CASCADE'        
            );
       
       

}

/**
 * {@inheritdoc}
 */
public function safeDown()
{
    $this->dropTable('tb_dt_invoice'); 
}


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180204_130303_create_tb_dt_invoice cannot be reverted.\n";

        return false;
    }
    */
}
