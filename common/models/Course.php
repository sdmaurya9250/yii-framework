<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "course".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $total_fees
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'course';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['total_fees'], 'string', 'max' => 20],
            [['name','user_id'], 'string', 'max' => 20],
            [['id'], 'unique'],
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
            'total_fees' => 'Total Fees',
        ];
    }

    /**
     * {@inheritdoc}
     * @return CourseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CourseQuery(get_called_class());
    }
}
