<?php

use yii\db\Migration;

/**
 * Class m171222_092813_create_tb_mt_resi
 */
class m171222_092813_create_tb_mt_resi extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
         $this->createTable('tb_mt_resi',[
             'id_resi'=>$this->primaryKey(),
             'id_outlet' => $this->integer(),
             'no_resi'=>$this->string()->notNull()->unique(),
             'tgl_resi'=>$this->dateTime()->notNull(),
             'nama_shipper' => $this->string()->notNull(),
             'alamat_shipper' => $this->text()->notNull(),
             'id_propinsi_shipper' => $this->integer()->notNull(),
             'id_kota_shipper' => $this->integer()->notNull(),
             'id_kecamatan_shipper' => $this->integer(),
             'id_kelurahan_shipper' => $this->biginteger(),
             'nama_consignee' => $this->string()->notNull(),
             'alamat_consignee' => $this->text()->notNull(),
             'id_propinsi_consignee' => $this->integer()->notNull(),
             'id_kota_consignee' => $this->integer()->notNull(),
             'id_kecamatan_consignee' => $this->integer(),
             'id_kelurahan_consignee' => $this->bigInteger(),
             'isi_barang' => $this->string(200)->notNull(),
             'berat_barang'=> $this->decimal(5,2)->notNull(),
             'volume_barang'=> $this->decimal(5,2),
             'penerima' => $this->string(200),
             'tgl_diterima'=>$this->dateTime(),
             
             'charge'=> $this->decimal(19,2)->notNull(),
             'packing'=> $this->decimal(19,2)->notNull(),
             'other'=> $this->decimal(19,2)->notNull(),
             'vat'=> $this->decimal(19,2)->notNull(),
             'total'=> $this->decimal(19,2)->notNull(),
             
             
             
             'created_at'=>$this->datetime(),
              'updated_at'=>$this->datetime(),
  
         ]

         );
         
        
        $this->addForeignKey(
        'fk-resi1',
        'tb_mt_resi',
        'id_outlet',
        'tb_m_outlet',
        'id_outlet',
        'RESTRICT',
        'CASCADE'        
        );
        
         
        $this->addForeignKey(
        'fk-resi2',
        'tb_mt_resi',
        'id_propinsi_shipper',
        'tb_m_propinsi',
        'id_propinsi',
        'RESTRICT',
        'CASCADE'        
        );
        
        $this->addForeignKey(
        'fk-resi3',
        'tb_mt_resi',
        'id_propinsi_consignee',
        'tb_m_propinsi',
        'id_propinsi',
        'RESTRICT',
        'CASCADE'        
        );
        
            
        $this->addForeignKey(
        'fk-resi4',
        'tb_mt_resi',
        'id_kota_shipper',
        'tb_m_kota',
        'id_kota',
        'RESTRICT',
        'CASCADE'        
        );
        
        $this->addForeignKey(
        'fk-resi5',
        'tb_mt_resi',
        'id_kota_consignee',
        'tb_m_kota',
        'id_kota',
        'RESTRICT',
        'CASCADE'        
        );
        
            
        $this->addForeignKey(
        'fk-resi6',
        'tb_mt_resi',
        'id_kecamatan_shipper',
        'tb_m_kecamatan',
        'id_kecamatan',
        'RESTRICT',
        'CASCADE'        
        );
        
        $this->addForeignKey(
        'fk-resi7',
        'tb_mt_resi',
        'id_kecamatan_consignee',
        'tb_m_kecamatan',
        'id_kecamatan',
        'RESTRICT',
        'CASCADE'        
        );
        
            
        $this->addForeignKey(
        'fk-resi8',
        'tb_mt_resi',
        'id_kelurahan_shipper',
        'tb_m_kelurahan',
        'id_kelurahan',
        'RESTRICT',
        'CASCADE'        
        );
        
        $this->addForeignKey(
        'fk-resi9',
        'tb_mt_resi',
        'id_kelurahan_consignee',
        'tb_m_kelurahan',
        'id_kelurahan',
        'RESTRICT',
        'CASCADE'        
        );
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
             $this->dropTable('tb_mt_resi');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171222_092813_create_tb_mt_resi cannot be reverted.\n";

        return false;
    }
    */
}
