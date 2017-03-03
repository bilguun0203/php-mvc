<?php
/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 3/2/17
 * Time: 11:53 AM
 */

namespace App\Database;

use App\Model\Model;

class Create_Users
{

	private static $model;

	public function __construct(){
		self::$model = new Model();
	}

	public static function up(){
		self::$model = new Model();
		echo 'Users Table Created';
		self::$model->db->table('users')
			->int('id', 'NOT NULL AUTO_INCREMENT')->primaryKey()
			->string('name', 'NOT NULL')
			->timestamp()
			->createTable();
		echo 'Users Table Created';
	}

	public static function down(){
		self::$model = new Model();
		echo 'Users Table Created';
		self::$model->db->table('users')->drop();
		echo 'Users Table Dropped';
	}

	public static function say(){
		echo "Hi! I'm Create_Users";
	}

}