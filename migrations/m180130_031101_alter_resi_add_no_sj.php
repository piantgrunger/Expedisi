<?php

use yii\db\Migration;

/**
 * Class m180130_031101_alter_resi_add_no_sj
 */
class m180130_031101_alter_resi_add_no_sj extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('tb_mt_resi', 'no_sj', $this->string()->Null());
     
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('tb_mt_resi', 'no_sj');
     
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180130_031101_alter_resi_add_no_sj cannot be reverted.\n";

        return false;
    }
    */
}
