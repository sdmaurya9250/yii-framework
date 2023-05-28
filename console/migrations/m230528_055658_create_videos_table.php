<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%videos}}`.
 */
class m230528_055658_create_videos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%videos}}', [
            'id' => $this->primaryKey(),
            'video_id' => $this->string(16)->notNull(),
            'title' => $this->string(50)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%videos}}');
    }
}
