<?php

use yii\db\Migration;

/**
 * Handles the creation of table `rule`.
 */
class m170117_153012_create_rule_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('rule', [
            'id' => $this->primaryKey(),
            'timezone' => $this->string(),
            'regions' => $this->string(),
            'show_everywhere' => $this->boolean()->defaultValue(0),
            'site_id' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('rule');
    }
}
