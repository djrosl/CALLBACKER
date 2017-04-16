<?php

use yii\db\Migration;

class m170313_213347_add_fields extends Migration
{
    public function up()
    {

    }

    public function down()
    {
        $this->addColumn('schedule', 'lunch_start', $this->string);
        $this->addColumn('schedule', 'lunch_end', $this->string);

        return true;
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
