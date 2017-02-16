<?php

use yii\db\Migration;

/**
 * Handles the creation of table `schedule`.
 */
class m170117_153133_create_schedule_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('schedule', [
            'id' => $this->primaryKey(),
            'rule_id' => $this->integer(),
            'day' => $this->integer(),
            'start_time' => $this->time(),
            'end_time' => $this->time(),
            'no_break' => $this->boolean()->defaultValue(0),
            'day_and_night' => $this->boolean()->defaultValue(0),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('schedule');
    }
}
