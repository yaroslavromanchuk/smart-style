<?php

use yii\db\Migration;

/**
 * Handles adding logo to table `user`.
 */
class m181221_102228_add_logo_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'logo', $this->string(255));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'logo');
    }
}
