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

	public static $mw_values = null;

	/**
	 * Controller constructor.
	 */
	public function __construct()
	{
	}

	public static function index() {
		/**
		 * Views хавтаснаас welcome.php-г уншина
		 *
		 * $data хүснэгт доторх элемент харагдацад хувьсагч болон очино.
		 * Жишээ нь: 'title' => 'Welcome' нь welcome.php-д $title болно.
		 */
		$data = array(
			'title' => 'Welcome',
		);
		return View::loadView('welcome', $data);
	}
}