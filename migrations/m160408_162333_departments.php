<?php

use yii\db\Migration;

class m160408_162333_department extends Migration{

    public function up(){
        $this->createTable('department', [
            'id'         => $this->primaryKey(),
            'name'       => $this->string('100'),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
                ], "ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
    }

    public function down(){
        echo "m160408_162333_departments cannot be reverted.\n";

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
