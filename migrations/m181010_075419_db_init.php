<?php

use yii\db\Migration;

/**
 * Class m181010_075419_db_init
 */
class m181010_075419_db_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('asset_owner', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%asset_owner}}', [
                    'id' => 'INT(11) UNSIGNED NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'asset_id' => 'INT(11) NULL',
                    'status' => 'INT(11) NULL',
                    'user_id' => 'INT(11) NULL',
                    'created_at' => 'DATETIME NULL',
                    'updated_at' => 'DATETIME NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('assets', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%assets}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(100) NULL',
                    'created_at' => 'DATETIME NULL DEFAULT CURRENT_TIMESTAMP ',
                    'updated_at' => 'DATETIME NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('borrow', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%borrow}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'user_id' => 'INT(11) NULL',
                    'asset_id' => 'INT(11) NULL',
                    'desc' => 'VARCHAR(200) NULL',
                    'created_at' => 'DATETIME NULL DEFAULT CURRENT_TIMESTAMP ',
                    'updated_at' => 'DATETIME NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('profile', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%profile}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'user_id' => 'INT(11) NOT NULL',
                    'created_at' => 'TIMESTAMP NULL',
                    'updated_at' => 'TIMESTAMP NULL',
                    'full_name' => 'VARCHAR(255) NULL',
                    'timezone' => 'VARCHAR(255) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('role', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%role}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'name' => 'VARCHAR(255) NOT NULL',
                    'created_at' => 'TIMESTAMP NULL',
                    'updated_at' => 'TIMESTAMP NULL',
                    'can_admin' => 'SMALLINT(6) NOT NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('user', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%user}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'role_id' => 'INT(11) NOT NULL',
                    'status' => 'SMALLINT(6) NOT NULL',
                    'email' => 'VARCHAR(255) NULL',
                    'username' => 'VARCHAR(255) NULL',
                    'password' => 'VARCHAR(255) NULL',
                    'auth_key' => 'VARCHAR(255) NULL',
                    'access_token' => 'VARCHAR(255) NULL',
                    'logged_in_ip' => 'VARCHAR(255) NULL',
                    'logged_in_at' => 'TIMESTAMP NULL',
                    'created_ip' => 'VARCHAR(255) NULL',
                    'created_at' => 'TIMESTAMP NULL',
                    'updated_at' => 'TIMESTAMP NULL',
                    'banned_at' => 'TIMESTAMP NULL',
                    'banned_reason' => 'VARCHAR(255) NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('user_auth', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%user_auth}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'user_id' => 'INT(11) NOT NULL',
                    'provider' => 'VARCHAR(255) NOT NULL',
                    'provider_id' => 'VARCHAR(255) NOT NULL',
                    'provider_attributes' => 'TEXT NOT NULL',
                    'created_at' => 'TIMESTAMP NULL',
                    'updated_at' => 'TIMESTAMP NULL',
                ], $tableOptions_mysql);
            }
        }

        /* MYSQL */
        if (!in_array('user_token', $tables))  {
            if ($dbType == "mysql") {
                $this->createTable('{{%user_token}}', [
                    'id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                    0 => 'PRIMARY KEY (`id`)',
                    'user_id' => 'INT(11) NULL',
                    'type' => 'SMALLINT(6) NOT NULL',
                    'token' => 'VARCHAR(255) NOT NULL',
                    'data' => 'VARCHAR(255) NULL',
                    'created_at' => 'TIMESTAMP NULL',
                    'expired_at' => 'TIMESTAMP NULL',
                ], $tableOptions_mysql);
            }
        }


        $this->createIndex('idx_asset_id_1928_00','asset_owner','asset_id',0);
        $this->createIndex('idx_user_id_1928_01','asset_owner','user_id',0);
        $this->createIndex('idx_user_id_2054_02','borrow','user_id',0);
        $this->createIndex('idx_asset_id_2054_03','borrow','asset_id',0);
        $this->createIndex('idx_user_id_2103_04','profile','user_id',0);
        $this->createIndex('idx_UNIQUE_email_2246_05','user','email',1);
        $this->createIndex('idx_UNIQUE_username_2246_06','user','username',1);
        $this->createIndex('idx_role_id_2246_07','user','role_id',0);
        $this->createIndex('idx_provider_id_2295_08','user_auth','provider_id',0);
        $this->createIndex('idx_user_id_2295_09','user_auth','user_id',0);
        $this->createIndex('idx_UNIQUE_token_234_10','user_token','token',1);
        $this->createIndex('idx_user_id_234_11','user_token','user_id',0);

        $this->execute('SET foreign_key_checks = 0');
        $this->addForeignKey('fk_assets_1916_00','{{%asset_owner}}', 'asset_id', '{{%assets}}', 'id', 'CASCADE', 'CASCADE' );
        $this->addForeignKey('fk_user_1917_01','{{%asset_owner}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE' );
        $this->addForeignKey('fk_assets_2045_02','{{%borrow}}', 'asset_id', '{{%assets}}', 'id', 'CASCADE', 'CASCADE' );
        $this->addForeignKey('fk_user_2046_03','{{%borrow}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE' );
        $this->addForeignKey('fk_user_2097_04','{{%profile}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE' );
        $this->addForeignKey('fk_role_2229_05','{{%user}}', 'role_id', '{{%role}}', 'id', 'CASCADE', 'CASCADE' );
        $this->addForeignKey('fk_user_2288_06','{{%user_auth}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE' );
        $this->addForeignKey('fk_user_2334_07','{{%user_token}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE' );
        $this->execute('SET foreign_key_checks = 1;');

        $this->execute('SET foreign_key_checks = 0');
        $this->insert('{{%assets}}',['id'=>'1','name'=>'Pensil','created_at'=>'2018-10-10 12:21:24','updated_at'=>'']);
        $this->insert('{{%assets}}',['id'=>'2','name'=>'Pemadam','created_at'=>'2018-10-10 12:21:43','updated_at'=>'']);
        $this->insert('{{%profile}}',['id'=>'1','user_id'=>'1','created_at'=>'2018-10-10 03:39:53','updated_at'=>'','full_name'=>'the one','timezone'=>'']);
        $this->insert('{{%profile}}',['id'=>'2','user_id'=>'2','created_at'=>'2018-10-10 04:23:06','updated_at'=>'2018-10-10 04:23:06','full_name'=>'','timezone'=>'']);
        $this->insert('{{%role}}',['id'=>'1','name'=>'Admin','created_at'=>'2018-10-10 03:39:53','updated_at'=>'','can_admin'=>'1']);
        $this->insert('{{%role}}',['id'=>'2','name'=>'User','created_at'=>'2018-10-10 03:39:53','updated_at'=>'','can_admin'=>'0']);
        $this->insert('{{%user}}',['id'=>'1','role_id'=>'1','status'=>'1','email'=>'neo@neo.com','username'=>'neo','password'=>'$2y$13$dyVw4WkZGkABf2UrGWrhHO4ZmVBv.K4puhOL59Y9jQhIdj63TlV.O','auth_key'=>'3sfhuec_eqJHXjTE-s-Pau5liqCNb-B7','access_token'=>'nCTVCeKtJpOznAzSNa4k8QRLoxTFteRT','logged_in_ip'=>'::1','logged_in_at'=>'2018-10-10 03:50:13','created_ip'=>'','created_at'=>'2018-10-10 03:39:53','updated_at'=>'','banned_at'=>'','banned_reason'=>'']);
        $this->insert('{{%user}}',['id'=>'2','role_id'=>'2','status'=>'1','email'=>'ali@yahoo.com','username'=>'ali','password'=>'$2y$13$jba67KvynPFP/0WSTOIRA.V0F6U0/fd9sV3.FD20EXembhrM0pQca','auth_key'=>'4rzaS7zZpTFl5o1q6FE3mrubSuJKv3jN','access_token'=>'2IGpU6SVlHdf0ded7D2cIYbOvUA8Ze21','logged_in_ip'=>'::1','logged_in_at'=>'2018-10-10 04:24:33','created_ip'=>'::1','created_at'=>'2018-10-10 04:23:05','updated_at'=>'2018-10-10 04:23:05','banned_at'=>'','banned_reason'=>'']);
        $this->insert('{{%user_token}}',['id'=>'1','user_id'=>'2','type'=>'1','token'=>'Ad4BGMRu9any-vWQFmVNi7y9bmjkM4cQ','data'=>'','created_at'=>'2018-10-10 04:24:19','expired_at'=>'']);
        $this->execute('SET foreign_key_checks = 1;');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m181010_075419_db_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181010_075419_db_init cannot be reverted.\n";

        return false;
    }
    */
}
