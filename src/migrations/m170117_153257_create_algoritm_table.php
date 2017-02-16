<?php

use yii\db\Migration;

/**
 * Handles the creation of table `algoritm`.
 */
class m170117_153257_create_algoritm_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('algoritm', [
            'id' => $this->primaryKey(),
            'type' => $this->integer(),
            'shows' => $this->integer(),
            'clicks' => $this->integer(),
            'conversion' => $this->decimal(),
            'calls' => $this->integer(),
            'calls_conversion' => $this->decimal(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('algoritm');
    }
}
