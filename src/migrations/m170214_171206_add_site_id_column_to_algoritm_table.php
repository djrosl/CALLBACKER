<?php

use yii\db\Migration;

/**
 * Handles adding site_id to table `algoritm`.
 */
class m170214_171206_add_site_id_column_to_algoritm_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('algoritm', 'site_id', $this->integer());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('algoritm', 'site_id');
    }
}
