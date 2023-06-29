<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sure".
 *
 * @property int $id
 * @property string $name
 * @property int $age
 * @property int $status
 */
class Sure extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sure';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'age', 'status'], 'required'],
            [['age', 'status'], 'integer'],
            [['name'], 'string', 'max' => 21],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'age' => 'Age',
            'status' => 'Status',
        ];
    }

    /**
     * {@inheritdoc}
     * @return SureQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SureQuery(get_called_class());
    }
}
