<?php

use yii\db\Migration;

/**
 * Handles adding lastName_firstName_middleName_birthday_sex to table `user`.
 */
class m181221_093136_add_lastName_firstName_middleName_birthday_sex_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'lastName', $this->string(100));
        $this->addColumn('user', 'firstName', $this->string(100));
        $this->addColumn('user', 'middleName', $this->string(100));
        $this->addColumn('user', 'birthday', $this->date());
        $this->addColumn('user', 'sex', $this->string(10));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('user', 'lastName');
        $this->dropColumn('user', 'firstName');
        $this->dropColumn('user', 'middleName');
        $this->dropColumn('user', 'birthday');
        $this->dropColumn('user', 'sex');
    }
}
