<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m200722_155601_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(64)->unique()->notNull(),
            'password_hash' => $this->string(512),
            'account_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
        
        $this->createIndex(
            'idx-users-account_id',
            'users',
            'account_id'
        );
        
        $this->addForeignKey(
            'fk-users-account_id',
            'users',
            'account_id',
            'accounts',
            'id',
            'RESTRICT',
            'CASCADE'
        );
    }
    
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        
        $this->dropForeignKey(
            'fk-users-account_id',
            'users'
        );
        
        $this->dropIndex(
            'idx-users-account_id',
            'users'
        );
        
        $this->dropTable('{{%users}}');
    }
}
