<?php
/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 2/4/17
 * Time: 7:11 PM
 */

/**
 * Тохиргооны файл
 */

namespace App;

class Config {

	private $config = array();

	/**
	 * Config constructor.
	 */
	public function __construct()
	{
		$this->config = [
			/**
			 * Вебийн үндсэн хаяг /байрлаж буй хавтас, холбоос/
			 */
			'base_url' => 'dev.local/git/php-mvc/',

			/**
			 * Өгөгдлийн сангийн тохиргоо
			 */
			/**
			 * Шаардлагатай
			 */
//			'database_type' => 'mysql',
			'database_name' => 'smvc',
			'database_server' => 'localhost',
			'database_username' => 'root',
			'database_password' => '',
			'database_charset' => 'utf8',
			/**
			 * Чухал шаардлагагүй
			 */
			'database_port' => 3306,
			'database_prefix' => 'SMVC_',
//			'database_command' => [
//				'SET SQL_MODE=ANSI_QUOTES',
//			],
		];
	}


	/**
	 * @param $key - тохиргооны нэр
	 * @return mixed - тохиргооны утга
	 */
	public function getConfig($key){
		return $this->config[$key];
	}

}
