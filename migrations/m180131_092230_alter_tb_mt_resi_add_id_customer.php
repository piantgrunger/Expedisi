<?php

use yii\db\Migration;

/**
 * Class m180131_092230_alter_tb_mt_resi_add_id_customer
 */
class m180131_092230_alter_tb_mt_resi_add_id_customer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tb_mt_resi', 'id_customer', $this->integer()->Null());
        $this->addForeignKey(
            'fk-resicust',
            'tb_mt_resi',
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
        $this->dropColumn('tb_mt_resi', 'id_customer');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180131_092230_alter_tb_mt_resi_add_id_customer cannot be reverted.\n";

        return false;
    }
    */
}
