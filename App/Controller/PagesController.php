<?php

/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 2/17/17
 * Time: 11:40 AM
 */

use App\System\View;

class PagesController
{

	public static function index(){
		echo "<h1>Pages</h1>";
	}

	public static function page($id = '', $test = ''){
		$data = array(
			'id' => $id,
			'test' => $test,
		);
		return View::loadView('page', $data);
	}

}