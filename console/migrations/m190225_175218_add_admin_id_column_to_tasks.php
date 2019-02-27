<?php

use yii\db\Migration;

/**
 * Class m190225_175218_add_admin_id_column_to_tasks
 */
class m190225_175218_add_admin_id_column_to_tasks extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("tasks", "admin_id", $this->integer());
        $this->addColumn("tasks", "ready_date", $this->dateTime());
        $this->addColumn("tasks", "ready", $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn("tasks", "admin_id");
        $this->dropColumn("tasks", "ready_date");
        $this->dropColumn("tasks", "ready");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190225_175218_add_admin_id_column_to_tasks cannot be reverted.\n";

        return false;
    }
    */
}
