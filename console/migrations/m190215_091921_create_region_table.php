<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%region}}`.
 */
class m190215_091921_create_region_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('region', [
            'id' => $this->primaryKey(),
            'x' => $this->double(),
            'y' => $this->double(),
        ]);

        $this->createTable('region_language', [
            'id' => $this->primaryKey(),
            'region_id' => $this->integer()->notNull(),
            'locale' => $this->string(10)->notNull(),
            'name' => $this->string()->notNull(),
            'annotation' => $this->text(),
        ]);

        $this->addForeignKey(
            'fk-region_language-region',
            'region_language',
            'region_id',
            'region',
            'id',
            'CASCADE'
        );

        $this->addColumn('site', 'region_id', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('site', 'region_id');

        $this->dropForeignKey(
            'fk-region_language-region',
            'region_language'
        );

        $this->dropTable('region_language');

        $this->dropTable('region');
    }
}
