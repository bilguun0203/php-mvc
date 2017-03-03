<?php
/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 3/2/17
 * Time: 11:53 AM
 */

namespace App\Database;

use App\Model\Model;

/**
 * Class Create_Users
 * @package App\Database
 *
 * Өгөгдлийн санд хүснэгт үүсгэх жишээ класс
 *
 */

class Create_Users
{

	public static function up(){
		$model = new Model();
		$model->db->table('users')
			->int('id', 'NOT NULL AUTO_INCREMENT')->primaryKey()
			->string('username', 'NOT NULL')
			->timestamp()
			->createTable();
	}

	public static function down(){
		$model = new Model();
		$model->db->table('users')->drop();
	}

}