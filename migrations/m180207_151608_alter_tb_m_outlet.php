<?php

use yii\db\Migration;

/**
 * Class m180207_151608_alter_tb_m_outlet
 */
class m180207_151608_alter_tb_m_outlet extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tb_m_outlet', 'id_propinsi', $this->integer());
        $this->addColumn('tb_m_outlet', 'id_kota', $this->integer());
        $this->addColumn('tb_m_outlet', 'id_kecamatan', $this->integer());
        $this->addColumn('tb_m_outlet', 'id_kelurahan', $this->bigInteger());
   
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tb_m_outlet', 'id_propinsi');
        $this->dropColumn('tb_m_outlet', 'id_kota');
        $this->dropColumn('tb_m_outlet', 'id_kecamatan');
        $this->dropColumn('tb_m_outlet', 'id_kelurahan');
   
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180207_151608_alter_tb_m_outlet cannot be reverted.\n";

        return false;
    }
    */
}
