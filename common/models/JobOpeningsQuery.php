<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[JobOpenings]].
 *
 * @see JobOpenings
 */
class JobOpeningsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return JobOpenings[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return JobOpenings|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
