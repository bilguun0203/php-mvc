<?php
/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 2/4/17
 * Time: 7:16 PM
 */
//
//$custom_autoload = array();
//
//$system_dir = array_diff(scandir('App/System'), array('..', '.'));
//
//spl_autoload_register(function () {
//	global $system_dir;
//	global $custom_autoload;
//	foreach ($system_dir as $item) {
//		require_once 'App/System/'.$item;
//	}
//
//	foreach ($custom_autoload as $item) {
//		require_once $item . '.php';
//	}
//});

class Autoloader {
	static public function loader($className) {
		$filename = BASE . str_replace('\\', '/', $className) . ".php";
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