<?php

use yii\db\Migration;

class m160401_172643_surveys extends Migration{

    public function up(){
        $this->createTable('surveys', [
            'id'                     => $this->primaryKey(),
            'title'                  => $this->string('100'),
            'targeted_role_id'       => $this->smallInteger('2')->unsigned()->notNull(),
            'targeted_department_id' => $this->smallInteger('2')->unsigned()->notNull(),
            'publish_date'           => $this->dateTime(),
            'end_date'               => $this->dateTime(),
            'created_at'             => $this->dateTime(),
            'updated_at'             => $this->dateTime(),
                ], "ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
    }

    public function down(){
        echo "m160401_172643_surveys cannot be reverted.\n";

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
