<?php

use yii\db\Migration;

/**
 * Handles the creation of table `session`.
 */
class m181221_075259_create_session_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
		$tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
		
        $this->createTable('{{%session}}', [
           // 'id' => $this->primaryKey(),
            'id' => $this->char(40)->notNull(),
            'expire' => $this->integer()->notNull(),
            'data' => $this->dateTime(),
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('session');
    }
}
