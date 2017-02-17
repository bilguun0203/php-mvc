<?php
/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 2/17/17
 * Time: 11:34 AM
 */

//namespace App\Controller;

use App\System\View;

class Controller {

	/**
	 * Controller constructor.
	 */
	public function __construct()
	{
	}

	public static function index() {
		return View::loadView('welcome');
	}
}