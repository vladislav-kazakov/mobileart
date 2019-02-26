<?php

use yii\db\Migration;

/**
 * Class m190226_093136_update_region_table
 */
class m190226_093136_update_region_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('region_language', 'publication', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('region_language', 'publication');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190226_093136_update_region_table cannot be reverted.\n";

        return false;
    }
    */
}
