<?php


use yii\db\Migration;
use yii\db\Schema;

class m150716_151335_init_db extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%users}}', [
            'id' => Schema::TYPE_INTEGER . '(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'auth_key' => Schema::TYPE_STRING . '(32) NOT NULL',
            'password_hash' => Schema::TYPE_STRING . ' NOT NULL',
            'password_reset_token' => Schema::TYPE_STRING,
            'email' => Schema::TYPE_STRING . ' NOT NULL',
            'status' => Schema::TYPE_SMALLINT . ' NOT NULL DEFAULT 10',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%cars}}', [
            'id' => Schema::TYPE_INTEGER . '(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'user_id' => Schema::TYPE_INTEGER . '(11) UNSIGNED NOT NULL',
            'model_id' => Schema::TYPE_INTEGER . '(11) UNSIGNED NOT NULL',
            'name' => Schema::TYPE_STRING . '(32) NOT NULL',
            'year' => Schema::TYPE_SMALLINT . ' UNSIGNED NOT NULL DEFAULT 0',
            'created_at' => Schema::TYPE_INTEGER . ' NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . ' NOT NULL',
        ], $tableOptions);

        $this->createTable('{{%cars_models}}', [
            'id' => Schema::TYPE_INTEGER . '(11) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY',
            'name' => Schema::TYPE_STRING . '(32) NOT NULL',
            'created_at' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'updated_at' => Schema::TYPE_INTEGER . '(11) NOT NULL',
        ], $tableOptions);

        $this->createIndex('car_user_model', '{{%cars}}', ['user_id', 'model_id'], false);
        $this->addForeignKey('car_link_model', '{{%cars}}', 'model_id', '{{%cars_model}}', 'id');
        $this->addForeignKey('car_link_user', '{{%cars}}', 'user_id', '{{%users}}', 'id');
    }

    public function down()
    {
        $this->dropTable('{{%cars_models}}');
        $this->dropTable('{{%cars}}');
        $this->dropTable('{{%user}}');

        echo "m150716_151335_init_db cannot be reverted.\n";

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
