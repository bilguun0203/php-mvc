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

	public static function up(){
		$model = new Model();
//		echo 'Migration Table Created';
		$model->db->table('migration')
			->int('id', 'NOT NULL AUTO_INCREMENT')->primaryKey()
			->string('migration', 'NOT NULL')
			->char('edit', "DEFAULT '000'", 3)
			->timestamp()
			->createTable();
//		echo 'Migration Table Created';
	}

	public static function down(){
		$model = new Model();
//		echo 'Migration Table Created';
		$model->db->table('migration')->drop();
//		echo 'Migration Table Dropped';
	}

}