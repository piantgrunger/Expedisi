<?php

use yii\db\Migration;

/**
 * Class m180201_082217_create_tb_dt_manifest
 */
class m180201_082217_create_tb_dt_manifest extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_dt_manifest',[
            'id_det_manifest'=>$this->primaryKey(),
            'id_manifest' => $this->integer()->notNull(),
            'id_resi' => $this->integer()->notNull(),
            'keterangan' => $this->text(),
            'created_at'=>$this->datetime(),
            'updated_at'=>$this->datetime(),
        ]);
 
 
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('tb_dt_manifest'); 
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180201_082217_create_tb_dt_manifest cannot be reverted.\n";

        return false;
    }
    */
}
