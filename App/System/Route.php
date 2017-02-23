<?php

/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 2/4/17
 * Time: 7:15 PM
 */

namespace App\System;

//use App\Controller\Controller;

class Route
{

	public static $GET;
	public static $POST;
	private static $args = array();

	public function __construct()
	{
	}

	/**
	 * Орж ирсэн хаягийг задалж унших
	 * @param $url - Холбоос
	 * @return bool - замчлагч дотор тохирох утга байгаа бол үнэн байхгүй бол худлаа утга буцаана
	 */
	private static function extractUrl($url){
		$GET = Route::$GET;
		$url = explode('/', $url);
		// args counter - j
		$j = 0;
		if(count($url) == count($GET)){
			for($i = 0; $i < count($GET); $i++){
				if($url[$i] == $GET[$i]){
				}
				elseif (preg_match( '/{(.*)}/', $url[$i], $match)){
					self::$args[$j] = $GET[$i];
					$j++;
				}
				else return false;
			}
			return true;
		}
		else {
			return false;
		}
	}

	/**
	 * Route::get();
	 * GET method - Хаягаас замчлагчтай тохирох утга байгаа эсэхийг шалган байгаа тохиолдолт тохирох контроллерийг
	 * дуудаж хаяг дахь параметрүүдийг дамжуулна
	 * @param $url - Холбоос
	 * @param $controller - Контроллер, функц
	 * @return int|mixed|string - Холбоосд харгалзах замчлагч байгаа бол үнэн байхгүй бол худал утга буцаана
	 */
	public static function get($url, $controller){
		$view = 0;
		if(self::extractUrl($url)){
			// Тохирох Контроллерийг олох
			$controller = explode('@', $controller);
			$C = $controller[1];
			$function = $controller[0];
			require_once 'App/Controller/' . $C . '.php';
			if(count(self::$args) > 0) {
				$view = call_user_func_array("$C::$function", self::$args);
			}
			else {
				$view = $C::$function();
			}
		}
		return $view;
	}

	/**
	 * Route::post();
	 * POST method - Хаягаас замчлагчтай тохирох утга байгаа эсэхийг шалган байгаа тохиолдолд контроллерийг
	 * дуудаж POST хүснэгтийг параметраар дамжуулна
	 * @param $url
	 * @param $controller
	 * @return int
	 */
	public static function post($url, $controller) {
		$view = 0;
		if(self::extractUrl($url)){
			self::$POST;
			// Тохирох Контроллерийг олох
			$controller = explode('@', $controller);
			$C = $controller[1];
			$function = $controller[0];
			require_once 'App/Controller/' . $C . '.php';
			print_r(self::$POST);
			if(count(self::$POST) > 0) {
				$C::$function(self::$POST);
			}
			else {
				$view = $C::$function();
			}
		}
		return $view;
	}

}