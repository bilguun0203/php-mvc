<?php

/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 2/17/17
 * Time: 11:40 AM
 */

use App\System\View;
use App\Model\MyModel;

class PagesController
{

	public static function index(){
		echo "<h1>Pages</h1>";
	}

	public static function page($id = '', $test = ''){

		$MyModel = new MyModel();
		$db_test = $MyModel->test();
		$data = array(
			'id' => $id,
			'test' => $test,
			'db_test' => $db_test,
		);
		return View::loadView('page', $data);
	}

	public static function pageDB($page = 1){
		$MyModel = new MyModel();
		$MyModel->db->pageLimit = 10;
		$test = $MyModel->db->paginate('test', $page);
		$data = array(
			'test' => $test,
			'total_page' => $MyModel->db->totalPages,
			'page' => $page,
		);
		return View::loadView('testDB', $data);
	}

	public static function dbDummy(){
		$MyModel = new MyModel();
		for($i=50; $i>0; $i--){
				$data = Array ("name" => rand(1000,9999),
					"created" => $MyModel->db->now('-'.$i.'d'),
					"modified" => $MyModel->db->now('-'.$i*10 .'h'),
				);
				$id = $MyModel->db->insert('test', $data);
				if($id)
					echo 'user was created. Id=' . $id;
		}
		return true;
	}

}