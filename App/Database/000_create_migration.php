<?php
/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 3/2/17
 * Time: 11:53 AM
 */

namespace App\Database;

use App\Model\Model;

class Create_Migration
{

	private static $model;

	public function __construct(){
		self::$model = new Model();
	}

	public static function up(){
		self::$model = new Model();
		echo 'Migration Table Created';
		self::$model->db->table('migration')
			->int('id', 'NOT NULL AUTO_INCREMENT')->primaryKey()
			->string('migration', 'NOT NULL')
			->timestamp()
			->createTable();
		echo 'Migration Table Created';
	}

	public static function down(){
		self::$model = new Model();
		echo 'Migration Table Created';
		self::$model->db->table('migration')->drop();
		echo 'Migration Table Dropped';
	}

	public static function say(){
		echo "Hi! I'm Create_Migration";
	}

}