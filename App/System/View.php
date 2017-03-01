<?php
/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 2/17/17
 * Time: 12:59 PM
 */

namespace App\System;

class View
{

	/**
	 * Харагдац файлыг байгаа эсэхийг Views хавтаснаас шалгах
	 * @param $view - Харагдац файлын нэр
	 * @return bool - Харагдац файл байгаа эсэх
	 */
	public static function checkView($view){
		if(file_exists('Views/' . $view . '.php')){
			return true;
		}
		else {
			return false;
		}
	}

	/**
	 * Харагдац файлыг Views хавтаснаас унших
	 * @param $view - Харагдац файлын нэр
	 * @param array $data - Харагдац руу өгөгдөл дамжуулах
	 * @return bool - Харагдац уншигдсан эсэх
	 */
	public static function loadView($view, $data = array()){
		if(View::checkView($view)) {
			extract($data);
			include_once 'Views/' . $view . '.php';
			return true;
		}
		else {
			return false;
		}
	}

	/**
	 * Алдааны хуудас
	 */
	public static function show404(){
		View::loadView('404');
	}

}