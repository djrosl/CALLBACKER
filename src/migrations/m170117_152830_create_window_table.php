<?php

use yii\db\Migration;

/**
 * Handles the creation of table `window`.
 */
class m170117_152830_create_window_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('window', [
            'id' => $this->primaryKey(),
            'site_id' => $this->integer(),
            'type' => $this->integer(),
            'title' => $this->string(),
            'shows' => $this->integer(),
            'calls' => $this->integer(),
            'calls_conversion' => $this->decimal(),
            'conversion' => $this->decimal(),
            'enabled' => $this->boolean()->defaultValue(0),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('window');
    }
}
