<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%telegram_subscript}}`.
 */
class m190218_084736_create_telegram_subscript_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('telegram_subscribe', [
                'id' => $this->primaryKey(),
                'chat_id' => $this->integer(),
                'channel' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('telegram_subscribe');
    }
}
