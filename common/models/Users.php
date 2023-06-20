<?php

namespace common\models;

use Yii;
use common\models\Student;
/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $job_id
 * @property string|null $fees
 * @property string|null $gender
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }
    // public static function getStudent()
    // {
    //     return $this->hasOne(Student::class, ['id' => 'id']);
       
    // }
    public function getStudent()
    {
        return $this->hasOne(Student::class, ['id' => 'id']);
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
            [['id'], 'required'],
            [['id', 'job_id'], 'integer'],
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
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersQuery(get_called_class());
    }
}
