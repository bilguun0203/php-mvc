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

	public static function up(){
		$model = new Model();
//		echo 'Creating Users Table...<br>';
		$model->db->table('users')
			->int('id', 'NOT NULL AUTO_INCREMENT')->primaryKey()
			->string('name', 'NOT NULL')
			->timestamp()
			->createTable();
//		echo 'Users Table Created';
	}

	public static function down(){
		$model = new Model();
//		echo 'Deleting Users Table...<br>';
		$model->db->table('users')->drop();
//		echo 'Users Table Dropped';
	}

}