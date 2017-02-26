<?php
/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 2/23/17
 * Time: 9:09 PM
 */

namespace App\System;

use App\Config;

/**
 * Class Helper
 * Туслах функцуудын сан
 * @package App\System
 */

class Helper
{

	/**
	 * Холбоос үүсгэх
	 * Параметраар орж ирсэн утгыг тохиргооны файл дах үндсэн вебийн холбоостой нэгтгэн буцаана
	 * @param $url - Хаяг
	 * @return string - Үндсэн хаяг + Параметр дахь хаяг
	 */
	public static function url($url){
		$config = new Config();
		return $config->getConfig('base_url') . $url;
	}

	/**
	 * Хуудас шилжүүлэх
	 * Параметраар орж ирсэн холбоос руу хуудсыг шилжүүлнэ
	 * @param $url - Шилжих хаяг
	 * @return int
	 */
	public static function redirect($url){
		header('Location: ' . self::url($url));
		return 1;
	}

	/**
	 * @param $name
	 * @param string $value
	 * @return bool
	 */
	public static function session($name, $value = ''){
		if($value == ''){
			if(isset($_SESSION[$name])) {
				return $_SESSION[$name];
			}
			else {
				return false;
			}
		} else {
			$_SESSION[$name] = $value;
			return true;
		}
	}

}