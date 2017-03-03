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
 * Class Alter_Users
 * @package App\Database
 *
 * Өгөгдлийн санд байгаа хүснэгт засварлах жишээ функц
 */

class Alter_Users
{

	public static function up(){
		$model = new Model();
		$model->db->table('users')
			->addColumn()->string('email', 'NOT NULL AFTER username')->alterTable();
		$model->db->table('users')
			->addColumn()->string('password', 'NOT NULL AFTER email')->alterTable();
		$model->db->table('users')
			->addColumn()->string('remember_token', 'NOT NULL AFTER password')->alterTable();
	}

	public static function down(){
		$model = new Model();
		$model->db->table('users')
			->dropColumn('password')->alterTable();
		$model->db->table('users')
			->dropColumn('remember_token')->alterTable();
		$model->db->table('users')
			->dropColumn('email')->alterTable();
	}

}