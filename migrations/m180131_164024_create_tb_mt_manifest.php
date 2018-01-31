<?php

use yii\db\Migration;

/**
 * Class m180131_164024_create_tb_mt_manifest
 */
class m180131_164024_create_tb_mt_manifest extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tb_mt_manifest',[
            'id_manifest'=>$this->primaryKey(),
            'id_outlet' => $this->integer(),
            'no_manifest'=>$this->string()->notNull()->unique(),
            'tgl_manifest'=>$this->dateTime()->notNull(),
            'tujuan_manifest'=>$this->text()->notNull(),
            'nama_sopir'=>$this->string()->notNull(),
            'nomor_polisi'=>$this->string()->notNull(),
            'telepon_sopir'=>$this->string()->notNull(),
            'pembuat_manifest'=>$this->string()->notnull(),
            
            
            
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
        $this->dropTable('tb_mt_manifest');
   
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180131_164024_create_tb_mt_manifest cannot be reverted.\n";

        return false;
    }
    */
}
