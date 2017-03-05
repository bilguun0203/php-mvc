<?php

/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 2/4/17
 * Time: 7:15 PM
 */

namespace App\System;

use App\Middleware;

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
					self::$args[$j] = urldecode($GET[$i]);
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
	 * дуудаж хаяг дахь параметрүүдийг дамжуулна.
	 * Middleware зааж өгсөн тохиолдолт контроллер ажиллахаас өмнө middleware ажиллаж цааш үйлдэл гүйцэтгэх эсэх
	 * мөн өөрчлөлт оруулах зэргийг тодорхойлно.
	 * @param $url - Холбоос
	 * @param $controller - Контроллер, функц
	 * @param string $middleware - Контроллер ажиллахаас өмнө дуудагдах скрипт
	 * @param array $mw_args - Middleware-д өгөх нэмэлт аргументууд
	 * @return int|mixed|string - Холбоосд харгалзах замчлагч байгаа бол үнэн байхгүй бол худал утга буцаана
	 */
	public static function get($url, $controller, $middleware = '', $mw_args = null){
		$view = 0;
		if(self::extractUrl($url)){
			$mw = array('run' => true);
			if($middleware != ''){
				unset($mw['run']);
				$classname = "App\\Middleware\\$middleware";
				$mwobj = new $classname($mw_args);
				$mw = $mwobj->run();
			}
			if($mw['run']) {
				// Тохирох Контроллерийг олох
				$controller = explode('@', $controller);
				$C = $controller[1];
				$function = $controller[0];
				require_once 'App/Controller/' . $C . '.php';
				if (count(self::$args) > 0) {
					$C::$mw_values = $mw;
					$view = call_user_func_array("$C::$function", self::$args);
				} else {
					$C::$mw_values = $mw;
					$view = $C::$function();
				}
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
	public static function post($url, $controller, $middleware = '', $mw_args = null) {
		$view = 0;
		if(self::extractUrl($url)){
			$mw = array('run' => true);
			if($middleware != ''){
				unset($mw['run']);
				$classname = "App\\Middleware\\$middleware";
				$mwobj = new $classname($mw_args);
				$mw = $mwobj->run();
			}
			if($mw['run']) {
				self::$POST;
				// Тохирох Контроллерийг олох
				$controller = explode('@', $controller);
				$C = $controller[1];
				$function = $controller[0];
				require_once 'App/Controller/' . $C . '.php';
				print_r(self::$POST);
				if (count(self::$POST) > 0) {
					$C::$function(self::$POST);
				} else {
					$view = $C::$function();
				}
			}
		}
		return $view;
	}

}