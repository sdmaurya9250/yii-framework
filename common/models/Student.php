<?php

namespace common\models;
// use common\models\Student;
use common\models\Users;
use common\models\Inquiry;
use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $job_id
 * @property string|null $fees
 * @property string|null $gender
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'student';
    }


    // public static function getInquiry()
    // {
    //     return $this->hasOne(Inquiry::class, ['student_id' => 'id']);
       
    // }
    // public function getInquiries()
    // {
    //     return $this->hasMany(Inquiry::class, ['student_id' => 'id']);
    // }


    // public static function getUsers()
    // {
    //     return $this->hasOne(Student::class, ['id' => 'id']);
       
    // }

    public function getInquiry()
        {
            return $this->hasOne(Inquiry::class, ['id' => 'inquiry_id']);
        }

        public function getUser()
        {
            return $this->hasOne(Users::class, ['id' => 'id']);
        }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['job_id'], 'integer'],
            [['name', 'fees'], 'string', 'max' => 20],
            [['gender'], 'string', 'max' => 1],
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
            'job_id' => 'Job ID',
            'fees' => 'Fees',
            'gender' => 'Gender',
        ];
    }

    /**
     * {@inheritdoc}
     * @return StudentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StudentQuery(get_called_class());
    }
}
