<?php

use yii\db\Migration;

/**
 * Class m171228_165311_alter_tb_mt_brg_add_colly_brg
 */
class m171228_165311_alter_tb_mt_brg_add_colly_brg extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('tb_mt_resi', 'colly_barang', $this->decimal(6,2));
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
         $this->dropColumn('tb_mt_resi', 'colly_barang');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171228_165311_alter_tb_mt_brg_add_colly_brg cannot be reverted.\n";

        return false;
    }
    */
}
