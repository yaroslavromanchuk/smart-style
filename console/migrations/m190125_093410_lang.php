<?php

use yii\db\Migration;

/**
 * Class m190125_093410_lang
 */
class m190125_093410_lang extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

    $this->createTable('{{%lang}}', [
        'id' => $this->primaryKey(),
        'url' => $this->string(32)->notNull(),
        'local' => $this->string(32)->notNull(),
        'name' => $this->string(100)->notNull(),
        'default' => $this->smallInteger()->notNull()->defaultValue(0),
        'date_update' => $this->integer()->notNull(),
        'date_create' => $this->integer()->notNull(),
    ], $tableOptions);

    $this->batchInsert('lang', ['url', 'local', 'name', 'default', 'date_update', 'date_create'], [
        ['en', 'en-EN', 'English', 0, time(), time()],
        ['ua', 'ua-UA', 'Українська', 1, time(), time()],
    ]);
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
         $this->dropTable('{{%lang}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190125_093410_lang cannot be reverted.\n";

        return false;
    }
    */
}
