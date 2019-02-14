<?php

use yii\db\Migration;

/**
 * Handles the creation of table `site`.
 */
class m190213_050502_create_site_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('site', [
            'id' => $this->primaryKey(),
            'image' => $this->string(),
            'x' => $this->double(),
            'y' => $this->double(),
        ]);

        $this->createTable('site_language', [
            'id' => $this->primaryKey(),
            'site_id' => $this->integer()->notNull(),
            'locale' => $this->string(10)->notNull(),
            'name' => $this->string()->notNull(),
            'annotation' => $this->text(),
            'description' => $this->text(),
            'publication' => $this->text(),
        ]);

        $this->addForeignKey(
            'fk-site_language-site',
            'site_language',
            'site_id',
            'site',
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
            'fk-site_language-site',
            'site_language'
        );

        $this->dropTable('site_language');

        $this->dropTable('site');
    }
}
