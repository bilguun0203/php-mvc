<?php
/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 3/2/17
 * Time: 11:58 AM
 */

/**
 * Файлуудын үндсэн байрлал
 */
define('ROOT', dirname(dirname(__DIR__)) . '/');
define('BASE', __DIR__ . '/');

/**
 * Composer Package
 */
require ROOT . 'vendor/autoload.php';

/**
 * Алдааны мэдээлэл
 * 		Асаах /Хөгжүүлэлтийн үед тохиромжтой/
 * 		DEBUG = true
 *
 * 		Унтраах /Бүрэн ажиллагаанд орсон үед тохиромжтой/
 *		DEBUG = false
 */
define('DEBUG', true);
if(DEBUG == true)
{
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	// Алдааны мэдээлэл гаргагч
	$whoops = new \Whoops\Run;
	$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
	$whoops->register();
}
else
{
	ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	error_reporting(0);
}

/**
 * Class Autoloader
 * namespace-д бичигдсэн байрлалаар тухайн классыг уншина
 * Жишээ нь: 'use App\System\Route' нь App/System/Route.php -г дуудна
 */

class Autoloader {
	static public function loader($className) {
		$filename = ROOT . str_replace('\\', '/', $className) . ".php";
		if (file_exists($filename)) {
			require_once $filename;
			if (class_exists($className)) {
				return TRUE;
			}
		}
		return FALSE;
	}
}
spl_autoload_register('Autoloader::loader');