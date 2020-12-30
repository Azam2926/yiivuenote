<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notes}}`.
 */
class m200722_155826_create_notes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%notes}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(512),
            'subtitle' => $this->string(255),
            'body' => $this->string(),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
        
        $this->createIndex(
            'idx-notes-user_id',
            'notes',
            'user_id'
        );
        
        $this->addForeignKey(
            'fk-notes-user_id',
            'notes',
            'user_id',
            'users',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-notes-user_id',
            'notes'
        );
        
        $this->dropIndex(
            'idx-notes-user_id',
            'notes'
        );
        
        $this->dropTable('{{%notes}}');
    }
}
