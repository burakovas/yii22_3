<?php

use yii\db\Migration;

/**
 * Class m190218_111130_add_project_id_column_to_tasks
 */
class m190218_111130_add_project_id_column_to_tasks extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn("tasks", "project_id", $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn("tasks", "project_id");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190218_111130_add_project_id_column_to_tasks cannot be reverted.\n";

        return false;
    }
    */
}
