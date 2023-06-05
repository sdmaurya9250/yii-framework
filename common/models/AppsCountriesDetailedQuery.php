<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[AppsCountriesDetailed]].
 *
 * @see AppsCountriesDetailed
 */
class AppsCountriesDetailedQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return AppsCountriesDetailed[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return AppsCountriesDetailed|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
