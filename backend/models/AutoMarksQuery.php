<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[AutoMarks]].
 *
 * @see AutoMarks
 */
class AutoMarksQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AutoMarks[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AutoMarks|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
