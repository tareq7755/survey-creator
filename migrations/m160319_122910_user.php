<?php

use yii\db\Migration;

class m160319_122910_user extends Migration{

    public function up(){
        $this->createTable('user', [
            'id'                   => $this->primaryKey(),
            'first_name'           => $this->string('50'),
            'last_name'            => $this->string('50'),
            'email'                => $this->string('250')->notNull()->unique(),
            'gender'               => $this->boolean(),
            'role_id'              => $this->smallInteger()->unsigned(),
            'department_id'        => $this->smallInteger()->unsigned(),
            'age'                  => $this->smallInteger()->unsigned()->unsigned(),
            'university_id'        => $this->string('250'),
            'created_at'           => $this->dateTime(),
            'updated_at'           => $this->dateTime(),
            'password_hash'        => $this->string('250'),
            'password_reset_token' => $this->string('250'),
            'auth_key'             => $this->string('32'),
                ], "ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci");
    }

    public function down(){
        echo "m160319_122910_user cannot be reverted.\n";

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
