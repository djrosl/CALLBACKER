<?php

use yii\db\Migration;

/**
 * Handles the creation of table `widget`.
 */
class m170117_152653_create_widget_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('widget', [
            'id' => $this->primaryKey(),
            'enabled' => $this->boolean()->defaultValue(0),
            'site_id' => $this->integer(),
            'shows' => $this->integer(),
            'clicks' => $this->integer(),
            'conversion' => $this->decimal(),
            'title' => $this->string(),
            'type' => $this->integer(),
            'calls' => $this->integer(),
            'calls_conversion' => $this->decimal(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('widget');
    }
}
