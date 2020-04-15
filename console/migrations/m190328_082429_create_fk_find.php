<?php

use yii\db\Migration;

/**
 * Class m190328_082429_create_fk_find
 */
class m190328_082429_create_fk_find extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-site-region',
            'site',
            'region_id',
            'region',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-find-site',
            'find',
            'site_id',
            'site',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-find_language-find',
            'find_language',
            'find_id',
            'find',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-find_image-find',
            'find_image',
            'find_id',
            'find',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-find_image-find',
            'find_image'
        );

        $this->dropForeignKey(
            'fk-find_language-find',
            'find_language'
        );

        $this->dropForeignKey(
            'fk-find-site',
            'find'
        );

        $this->dropForeignKey(
            'fk-site-region',
            'site'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190328_082429_create_fk_find cannot be reverted.\n";

        return false;
    }
    */
}
