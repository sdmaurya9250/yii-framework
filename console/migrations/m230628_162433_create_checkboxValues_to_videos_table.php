<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%checkboxValues_to_videos}}`.
 */
class m230628_162433_create_checkboxValues_to_videos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // $this->createTable('{{%checkboxValues_to_videos}}', [
        //     'id' => $this->primaryKey(),
        // ]);
        $this->addColumn('videos', 'checkboxValues', $this->json());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('videos', 'checkboxValues');
    }
}
