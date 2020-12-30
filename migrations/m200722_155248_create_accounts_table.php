<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%accounts}}`.
 */
class m200722_155248_create_accounts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%accounts}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string(),
            'avatar' => $this->string(),
            'phone' => $this->string(),
            'language' => $this->string(),
            'timezone' => $this->string(),
            'ip' => $this->string(),
            'device' => $this->string(),
            'location' => $this->string(),
            'last_activity' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%accounts}}');
    }
}
