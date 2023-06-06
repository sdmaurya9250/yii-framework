<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "expense".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $created_at
 */
class Expense extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'expense';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'required'],
            [['created_at'], 'safe'],
            [['title', 'description'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'created_at' => 'Created At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return ExpenseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ExpenseQuery(get_called_class());
    }
}
