<?php

use yii\db\Migration;

class m160422_162437_question_options extends Migration
{
    public function up()
    {
        $this->createTable('question_options', [
            'id'         => $this->primaryKey(),
            'body'       => $this->string('100'),
            'question_id'=> $this->integer(),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
                ], "ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
    }

    public function down()
    {
        echo "m160422_162437_question_options cannot be reverted.\n";

        return false;
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
