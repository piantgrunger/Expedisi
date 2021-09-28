<?php

use yii\db\Migration;

/**
 * Class m180207_153246_update_tb_m_kota
 */
class m180207_153246_update_tb_m_kota extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
      $this->execute("update tb_m_kota set nama_kota=replace(nama_kota,'KOTA ','')");
      $this->execute("update tb_m_kota set nama_kota=replace(nama_kota,'KABUPATEN ','')");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180207_153246_update_tb_m_kota cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180207_153246_update_tb_m_kota cannot be reverted.\n";

        return false;
    }
    */
}
