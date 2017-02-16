<?php

use yii\db\Migration;

/**
 * Handles the creation of table `site`.
 */
class m170117_152449_create_site_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('site', [
            'id' => $this->primaryKey(),
            'url' => $this->string(),
            'enabled' => $this->boolean()->defaultValue(1),
            'registered_at' => $this->datetime(),
            'visits_count' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('site');
    }
}
