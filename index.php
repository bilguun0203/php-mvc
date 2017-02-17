<?php
/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 2/4/17
 * Time: 7:06 PM
 */

/**
 * Composer Package
 */
require __DIR__ . '/vendor/autoload.php';
// Алдааны мэдээлэл гаргагч
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

use App\System\Route;
use App\System\View;

/**
 * Файлуудын үндсэн байрлал
 */
define('ROOT', dirname(__DIR__));
define('BASE', __DIR__ . '/');

/**
 * Хэрэгцээт файлуудыг унших
 */
require_once 'App/Autoloader.php';
require_once 'App/config.php';

/**
 * Хаягаас утгуудыг авах
 */
$get = explode('/', str_replace($config['base_url'], '', "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"));
Route::$GET = $get;

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