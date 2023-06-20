<?php

namespace common\models;
use common\models\Student;
use common\models\Users;
use Yii;

/**
 * This is the model class for table "inquiry".
 *
 * @property int $id
 * @property int $student_id
 * @property string|null $name
 */
class Inquiry extends \yii\db\ActiveRecord
{

    public $user_created_at;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inquiry';
    }

    public function getStudent()
    {
        return $this->hasOne(Student::class, ['inquiry_id' => 'id']);
    }


    public function getUsers(){

        return $this->hasMany(Student::class, ['id' => 'id'])->via('users');
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['student_id'], 'required'],
            [['student_id'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['created_at'],'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'student_id' => 'Student ID',
            'name' => 'Name',
            'created_at' => 'Created At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return InquiryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InquiryQuery(get_called_class());
    }
}
