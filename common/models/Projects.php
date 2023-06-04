<?php

namespace common\models;

use Yii;
use common\models\EpicsList;

/**
 * This is the model class for table "projects".
 *
 * @property int $id
 * @property string $customer_contact
 * @property string $customer_address
 * @property string $uniqueid
 * @property string $project_name
 * @property string|null $attachement
 * @property string|null $desc
 * @property string|null $notes
 * @property string|null $history
 * @property string $created_at
 * @property string $updated_at
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_contact', 'customer_address', 'uniqueid',  'project_name', 'created_at', 'updated_at'], 'required'],
            [['customer_contact', 'uniqueid'], 'string', 'max' => 100],
            [['customer_address'], 'string', 'max' => 1000],
            [['project_name', 'attachement'], 'string', 'max' => 500],
            [['desc', 'notes', 'history'], 'string', 'max' => 5000],
            [['created_at', 'updated_at'], 'string', 'max' => 191],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_contact' => 'Customer Contact',
            'customer_address' => 'Customer Address',
            'uniqueid' => 'Uniqueid',
            'project_name' => 'Project Name',
            'attachement' => 'Attachement',
            'desc' => 'Desc',
            // 'title' => 'Title',
            'notes' => 'Notes',
            'history' => 'History',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    // public  function getEpics()
    // {
    //     // return $this->hasMany(EpicsList::className(),'uniqueid' = 'epics_list.projectlist1');
    //     // return $this->hasMany(EpicsList::className(),'uniqueid', 'projectlist1');
    //     // return $this->hasOne(EpicsList::className(),['uniqueid' => 'projectlist1']);
    //     // return $this->hasOne(EpicsList::className(),['projectlist1' => 'uniqueid']);
    //     return $this->hasOne(EpicsList::className(),['projectlist1' => 'uniqueid']);
    // }

    /**
     * {@inheritdoc}
     * @return ProjectsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectsQuery(get_called_class());
    }
}
