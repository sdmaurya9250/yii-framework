<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "epics_list".
 *
 * @property int $id
 * @property string|null $uniqueid
 * @property string|null $memberid
 * @property string|null $title
 * @property string|null $projectlist1
 * @property string|null $projectname
 * @property string|null $action
 * @property string|null $note
 * @property string|null $desc
 * @property string|null $history
 * @property string|null $noteslog
 * @property string|null $createddate
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class EpicsList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'epics_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uniqueid'], 'string', 'max' => 100],
            [['memberid'], 'string', 'max' => 10],
            [['title', 'projectlist1', 'projectname', 'action', 'createddate', 'created_at', 'updated_at'], 'string', 'max' => 500],
            [['note', 'desc', 'history'], 'string', 'max' => 5000],
            [['noteslog'], 'string', 'max' => 20000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uniqueid' => 'Uniqueid',
            'memberid' => 'Memberid',
            'title' => 'Title',
            'projectlist1' => 'Projectlist1',
            'projectname' => 'Projectname',
            'action' => 'Action',
            'note' => 'Note',
            'desc' => 'Desc',
            'history' => 'History',
            'noteslog' => 'Noteslog',
            'createddate' => 'Createddate',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return EpicsListQuery the active query used by this AR class.
     */
    // public static function find()
    // {
    //     return new EpicsListQuery(get_called_class());
    // }
}
