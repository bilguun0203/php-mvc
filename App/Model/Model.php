<?php
/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 2/17/17
 * Time: 10:26 PM
 */

namespace App\Model;

//require_once '../Autoloader.php';
//require 'Medoo.php';
//
//use App\Model\Medoo;
//use App\Config;
//
//class Model
//{
//
//	protected $database;
////	protected $config = new Config();
//
//	/**
//	 * Model constructor.
//	 */
//	public function __construct()
//	{
//		$config  = new Config();
//
//		$this->database = new Medoo([
//			// required
//			'database_type' => $config->getConfig('database_type'),
//			'database_name' => $config->getConfig('database_name'),
//			'server' => $config->getConfig('database_server'),
//			'username' => $config->getConfig('database_username'),
//			'password' => $config->getConfig('database_password'),
//			'charset' => $config->getConfig('database_charset'),
//
//			// [optional]
//			'port' => $config->getConfig('database_port'),
//
//			// [optional] Table prefix
//			'prefix' => $config->getConfig('database_prefix'),
//
//			// [optional] driver_option for connection, read more from http://www.php.net/manual/en/pdo.setattribute.php
//			'option' => [
//				PDO::ATTR_CASE => PDO::CASE_NATURAL,
//			],
//
//			// [optional] Medoo will execute those commands after connected to the database for initialization
//			'command' => $config->getConfig('database_command'),
//		]);
//	}
//}

//require '../Config.php';
require 'MysqliDb.php';
use App\Config;
use App\Model\MysqliDb;

class Model {

	public $db;

	/**
	 * Model constructor.
	 * @param $db
	 */
	public function __construct()
	{
		$config  = new Config();

		$this->db = new MysqliDb (Array (
			'host' => $config->getConfig('database_server'),
			'username' => $config->getConfig('database_username'),
			'password' => $config->getConfig('database_password'),
			'db'=> $config->getConfig('database_name'),
			'port' => $config->getConfig('database_port'),
			'prefix' => $config->getConfig('database_prefix'),
			'charset' => $config->getConfig('database_charset')));
	}


}