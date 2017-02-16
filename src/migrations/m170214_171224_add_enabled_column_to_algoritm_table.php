<?php

use yii\db\Migration;

/**
 * Handles adding enabled to table `algoritm`.
 */
class m170214_171224_add_enabled_column_to_algoritm_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('algoritm', 'enabled', $this->boolean());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('algoritm', 'enabled');
    }
}
