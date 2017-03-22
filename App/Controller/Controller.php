<?php
/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 2/17/17
 * Time: 11:34 AM
 */

//namespace App\Controller;

use App\System\View;
use App\Model\MyModel;
use App\System\Helper;
use App\Lib\UserAuth;

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

	public static function login() {
		$userAuth = new UserAuth();
		if(!$userAuth->isloggedin()) {
			$data = array(
				'page_title' => 'Login',
				'section_body' => 'login',
			);
			return View::loadView('auth/_main_layout', $data);
		} else {
			Helper::redirect('session');
		}
	}

	public static function register() {
		$userAuth = new UserAuth();
		if(!$userAuth->isloggedin()) {
			$data = array(
				'page_title' => 'Register',
				'section_body' => 'register',
			);
			return View::loadView('auth/_main_layout', $data);
		} else {
			Helper::redirect('session');
		}
	}

	public static function authenticate($user_info = array()){
		$userAuth = new UserAuth();
		$remember = false;
		if(isset($user_info['remember'])){
			$remember = true;
		}
		if($userAuth->login($user_info['email'], $user_info['password'], $remember)){
			Helper::redirect('session');
		}
		else {
			Helper::flush('error', 'Not Found');
			Helper::redirect('login');
		}
	}

	public static function registration($user_info = array()){
		$userAuth = new UserAuth();
		var_dump($user_info);
//		$userAuth->register($user_info['name'], $user_info['email'], $user_info['password']);
		if($userAuth->register($user_info['name'], $user_info['email'], $user_info['password'])){
			Helper::redirect('login');
		}
		else {
//			Helper::flush('error', 'Not Found');
			Helper::redirect('register');
		}
	}

	public static function logout(){
		$userAuth = new UserAuth();
		$userAuth->logout();
		Helper::redirect('login');
	}

}