<?php

namespace common\models;
use yii\helpers\Json;
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

    // public $name;
    // public $total_fees;

    // public static $details = [
    //     self::MY_CONSTANT => 'Hey This is me',
    //     self::MY_CONSTANT1 => 'Hey This is you',
    // ];

    /**
     * {@inheritdoc}
     */

     public $checkboxValues ;public $check;
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
            [['checkboxValues'], 'safe'],
        ];
    }
  

    public function getOptions()
    {
        return Json::decode($this->getAttribute('checkboxValues'));
    }

    public function setOptions($value)
    {
        $this->setAttribute('checkboxValues', Json::encode($value));
    }

    
    // public function getMultipleSelection()
    // {
    //     return Json::decode($this->checkboxValues);
    // }

    // public function setMultipleSelection($value)
    // {
    //     $this->checkboxValues = Json::encode($value);
    // }

    // public function save($runValidation = true, $attributeNames = null)
    // {
    //     $this->checkboxValues = Json::encode($this->checkboxValues);
    //     return parent::save($runValidation, $attributeNames);
    // }
    // Override the `beforeSave` method to encode the checkbox values as JSON
    // public function afterFind()
    // {
    //     parent::afterFind();

    //     // Decode the JSON data from the database and assign it to the checkboxes property
    //     $this->checkboxes = json_decode($this->json_data, true);
    // }

    // public function beforeSave($insert)
    // {
    //     if (parent::beforeSave($insert)) {
    //         // Encode the checkboxes property as JSON and save it to the database
    //         $this->json_data = json_encode($this->checkboxes);

    //         return true;
    //     }

    //     return false;
    // }

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
