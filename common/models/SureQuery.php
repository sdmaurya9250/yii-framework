<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Sure]].
 *
 * @see Sure
 */
class SureQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Sure[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Sure|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
