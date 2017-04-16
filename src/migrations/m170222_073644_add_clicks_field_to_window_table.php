<?php

use yii\db\Migration;

class m170222_073644_add_clicks_field_to_window_table extends Migration
{
    public function up()
    {
        $this->addColumn('window', 'clicks', $this->integer());
    }

    public function down()
    {

        $this->dropColumn('window', 'clicks');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
