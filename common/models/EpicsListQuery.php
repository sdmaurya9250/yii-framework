<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[EpicsList]].
 *
 * @see EpicsList
 */
class EpicsListQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return EpicsList[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return EpicsList|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
