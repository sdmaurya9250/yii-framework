<?php

namespace common\models;
use Yii;
use yii\base\BaseObject;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */
// class Smsjob extends \yii\db\ActiveRecord
// {

// }

class Smsjob extends BaseObject implements \yii\queue\JobInterface
{
    public $url;
    public $file;
    
    public function execute($queue)
    {
        // file_put_contents($this->file, file_get_contents($this->url));

        for($i = 0; $i<=5;$i++){

            echo $i . 'Insert';
            $sql = Yii::$app->db->createCommand()->insert('videos',[
                'video_id' => 1,
                'title' => 'This is me',
                'description' => 'hey how is going on'
            ]);
        }


    }
}
