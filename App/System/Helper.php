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
	 * Session утга олгох болон утгыг авах функц
	 * session(name) - name нэртэй session үүссэн байвал утгыг буцаана. Үүсээгүй бол false буцаана.
	 * session(name, value) - name нэртэй session-нд value утгыг олгоно.
	 * @param $name - Session нэр
	 * @param string $value - Session утга
	 * @return bool|string
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

	/**
	 * Session устгах
	 * @param $name - нэр
	 * @return bool
	 */
	public static function sessionDelete($name){
		if(isset($_SESSION[$name])) {
			unset($_SESSION[$name]);
			return true;
		}
		return false;
	}

	/**
	 * Түр зуурын session үүсгэнэ
	 * flush(name) - name нэртэй session үүссэн байвал утгыг буцааж session-ыг устгана. Үүсээгүй бол false буцаана.
	 * flush(name, value) - name нэртэй session-нд value утгыг олгоно.
	 * @param $name - нэр
	 * @param string $value - утга
	 * @return bool|string
	 */
	public static function flush($name, $value = ''){
		if($value == ''){
			if(isset($_SESSION[$name])) {
				$flush = $_SESSION[$name];
				unset($_SESSION[$name]);
				return $flush;
			}
			else {
				return false;
			}
		} else {
			$_SESSION[$name] = $value;
			return true;
		}
	}

	/**
	 * Күүкий хадгалах, утгыг авах функц
	 * @param $name - Нэр
	 * @param string $value - Утга
	 * @param int $time - Хадгалах хугацаа /секунд/
	 * @param string $path - Байрлал
	 * @param string $domain - Домайн
	 * @return bool|string
	 */
	public static function cookie($name, $value = '', $time = 86400, $path = '', $domain = ''){
		if($value == ''){
			if(isset($_COOKIE[$name])) {
				return $_COOKIE[$name];
			}
			else {
				return false;
			}
		} else {
			if($path != ''){
				if($domain != '') {
					setcookie($name, $value, time() + $time, $path, $domain);
				}
				else {
					setcookie($name, $value, time() + $time, $path);
				}
			}
			setcookie($name, $value, time() + $time);
			return true;
		}
	}

	/**
	 * Күүкий устгах
	 * @param $name - нэр
	 * @return bool
	 */
	public static function cookieDelete($name) {
		if(isset($_COOKIE[$name])){
			unset($_COOKIE[$name]);
			setcookie($name, "", time() - 3600);
			return true;
		}
		return false;
	}

}