<?php

use yii\db\Migration;

/**
 * Class m180206_085457_alter_all_tanggal
 */
class m180206_085457_alter_all_tanggal extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('tb_mt_resi', 'tgl_resi', $this->date()->notNull());
        $this->alterColumn('tb_mt_manifest', 'tgl_manifest', $this->date()->notNull());
        $this->alterColumn('tb_mt_invoice', 'tgl_invoice', $this->date()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('tb_mt_resi', 'tgl_resi', $this->dateTime()->notNull());
        $this->alterColumn('tb_mt_manifest', 'tgl_manifest', $this->dateTime()->notNull());
        $this->alterColumn('tb_mt_invoice', 'tgl_invoice', $this->dateTime()->notNull());
  
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180206_085457_alter_all_tanggal cannot be reverted.\n";

        return false;
    }
    */
}
