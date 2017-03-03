<?php
/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 3/2/17
 * Time: 11:53 AM
 */

namespace App\Database;

use App\Model\Model;

class Alter_Users
{

	public static function up(){
		$model = new Model();
		$model->db->table('users')
			->dropColumn('name')->alterTable();
		$model->db->table('users')
			->addColumn()->string('username', 'NOT NULL AFTER id')->alterTable();
		$model->db->table('users')
			->addColumn()->string('password', 'NOT NULL AFTER username')->alterTable();
	}

	public static function down(){
		$model = new Model();
		$model->db->table('users')
			->dropColumn('password')->alterTable();
		$model->db->table('users')
			->dropColumn('username')->alterTable();
		$model->db->table('users')
			->addColumn()->string('name', 'NOT NULL AFTER id')->alterTable();
	}

}