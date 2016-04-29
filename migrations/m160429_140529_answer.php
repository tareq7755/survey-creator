<?php

use yii\db\Migration;

class m160429_140529_answer extends Migration{

    public function up(){
        $this->createTable('answer', [
            'id'          => $this->primaryKey(),
            'survey_id'   => $this->integer(),
            'question_id' => $this->integer(),
            'option_id'   => $this->integer(),
            'user_id'     => $this->integer(),
            'body'        => $this->text(),
            'created_at'  => $this->dateTime(),
            'updated_at'  => $this->dateTime(),
                ], "ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
    }

    public function down(){
        echo "m160429_140529_answer cannot be reverted.\n";

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
