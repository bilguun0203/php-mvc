<?php

/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 2/4/17
 * Time: 7:15 PM
 */

namespace App\System;

use App\System\View;

//use App\Controller\Controller;

class Route
{

	public static $GET;

	public function __construct()
	{
	}

	/**
	 * @param $url - Холбоос
	 * @param $controller - Контроллер, функц
	 * @return int|mixed|string - Холбоосд харгалзах замчлагч байгаа бол үнэн байхгүй бол худал утга буцаана
	 */
	public static function get($url, $controller){
		$GET = Route::$GET;
		$url = explode('/', $url);
//		print_r($url);
		$args = array();
		// args counter - j
		$j = 0;
		$view = 0;
		if(count($url) == count($GET)){
			for($i = 0; $i < count($GET); $i++){
				if($url[$i] == $GET[$i]){
				}
				elseif (preg_match( '/{(.*)}/', $url[$i], $match)){
					$args[$j] = $GET[$i];
					$j++;
				}
				else return $view;
			}

			// Тохирох Контроллерийг олох
			$controller = explode('@', $controller);
			$C = $controller[1];
			$function = $controller[0];
			require_once 'App/Controller/' . $C . '.php';
			if(count($args) > 0) {
				$view = call_user_func_array("$C::$function", $args);
			}
			else {
				$view = $C::$function();
			}
		}
		else {
			return $view;
		}
		return $view;
	}

}