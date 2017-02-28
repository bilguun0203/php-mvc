<?php

/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 2/17/17
 * Time: 11:40 AM
 */

use App\System\View;
use App\Model\MyModel;
use App\System\Helper;

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

	public static function formDB(){
		$MyModel = new MyModel();
		$table = $MyModel->db->get('table1');

		$create = new MyModel();
//		$db = $create->db;
		$text = $create->db->table('category_post')
			->int('id', 'AUTO_INCREMENT')->primaryKey()
			->int('category_id', 'NOT NULL')->foreignKey('category(id)', 'postCat')
			->int('post_id', 'NOT NULL')->foreignKey('post(id)', 'postId')
			->createTable();

		$data = array(
			'text' => $text,
			'data' => $table,
		);
		return View::loadView('formDB', $data);
	}

	public static function formSubmit($post = array()){
		$Model = new MyModel();
		$Model->db->insert('table1', $post);
		return Helper::redirect('formdb');
	}

	public static function formDelete($id){
		$Model = new MyModel();
		$Model->db->where('id', $id)->delete('table1');
//		$Model->db->delete('table1');

		return Helper::redirect('formdb');
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

	// POST туршилт
	public static function postTest($post = array()){
		return Helper::redirect('page/'.$post['name']);
	}

}