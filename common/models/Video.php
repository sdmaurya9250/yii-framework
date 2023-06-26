<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "videos".
 *
 * @property int $id
 * @property string $video_id
 * @property string $title
 */
class Video extends \yii\db\ActiveRecord
{

    // const MY_CONSTANT = 1;
    // const MY_CONSTANT1 = 2;

    const STATUS_APPLIED = 3;
    const STATUS_SELECTED = 2;
    const STATUS_REJECTED = 1;


    // public static $details = [
    //     self::MY_CONSTANT => 'Hey This is me',
    //     self::MY_CONSTANT1 => 'Hey This is you',
    // ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'videos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['video_id', 'title'], 'required'],
            [['video_id'], 'string', 'max' => 16],
            [['title'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'video_id' => 'Video ID',
            'title' => 'Title',
            'description' => 'Description',
            'status' => 'Status Me',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\VideoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\VideoQuery(get_called_class());
    }
}
