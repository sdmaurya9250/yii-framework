<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "job_students".
 *
 * @property int $stu_id
 * @property int $job_id
 * @property string $created_at
 * @property string $updated_at
 */
class JobStudents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job_students';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['job_id'], 'required'],
            [['job_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'stu_id' => 'Stu ID',
            'job_id' => 'Job ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return JobStudentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new JobStudentsQuery(get_called_class());
    }
}
