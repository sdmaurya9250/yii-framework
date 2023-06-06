<?php

namespace common\models;
use common\models\JobStudents;
use Yii;

/**
 * This is the model class for table "job_openings".
 *
 * @property int $id
 * @property int $company_id
 * @property string $title
 * @property string $deadline
 * @property string $created_at
 * @property string $updated_at
 * @property string $status
 */
class JobOpenings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job_openings';
    }

    public function getJobStudents()
    {
        return $this->hasMany(JobStudents::class, ['job_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'title', 'deadline', 'status'], 'required'],
            [['company_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'deadline'], 'string', 'max' => 50],
            [['status'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Company ID',
            'title' => 'Title',
            'deadline' => 'Deadline',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }

    /**
     * {@inheritdoc}
     * @return JobOpeningsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new JobOpeningsQuery(get_called_class());
    }
}
