<?php

namespace backend\models;

/**
 * This is the ActiveQuery class for [[AutoModels]].
 *
 * @see AutoModels
 */
class AutoModelsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AutoModels[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AutoModels|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
