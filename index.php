<?php
/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 2/4/17
 * Time: 7:06 PM
 */

/**
 * Файлуудын үндсэн байрлал
 */
define('ROOT', dirname(__DIR__));
define('BASE', __DIR__ . '/');

/**
 * Composer Package
 */
require BASE . 'vendor/autoload.php';

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
 * Хэрэгцээт файлуудыг унших
 */
require_once 'App/Autoloader.php';
require_once 'App/Config.php';

use App\System\Route;
use App\System\View;
use App\Config;

$config = new Config();

/**
 * Хаягаас утгуудыг авах
 */
$get = explode('/', str_replace($config->getConfig('base_url'), '', "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"));
Route::$GET = $get;
Route::$POST = $_POST;

/**
 * Замчлагчийг ажиллуулах
 */
require_once BASE . 'App/Route/web.php';

/**
 * Харагдац гаргах
 */
$flag = true;
foreach ($views as $view){
	if($view != 0){
		$flag = false;
	}
}
if($flag) {
	echo View::show404();
}