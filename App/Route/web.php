<?php
/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 2/17/17
 * Time: 10:29 AM
 */

use App\System\Route;

/**
 * Холбоосонд бичигдсэн зүйлээс шалтгаалж Контроллерийн функцыг дуудна
 * {} ашиглан хувьсагчийг тэмдэглэнэ
 * хувьсагчид тухайн функцийн параметр болж орно
 *
 * Контроллерийг дуудах
 * функц@Контроллер
 * index@Controller - Controller класс доторх index функцийг дуудна
 *
 * GET
 * Route::get(string, string, string, array)
 * Route::get(хаяг, контроллер, дундын код, дундын кодонд ашиглагдах аргументууд);
 *
 * POST
 * Route::post(string, string, string, array)
 * Route::post(хаяг, контроллер, дундын код, дундын кодонд ашиглагдах аргументууд);
 *
 */
$routes = array(
	Route::get('', 'index@Controller'),
	Route::get('page', 'page@PagesController'),
	Route::get('page/{id}', 'page@PagesController'),
	Route::get('page/{id}/{asd}', 'page@PagesController'),
	Route::get('db', 'dbDummy@PagesController'),
	Route::get('testdb', 'pageDB@PagesController', 'Test', array('test' => 'Test Message')),
	Route::get('testdb/{page}', 'pageDB@PagesController', 'Test', array('test' => 'Test Message')),
	Route::post('postTest', 'postTest@PagesController'),
	Route::get('formdb', 'formDB@PagesController'),
	Route::get('formdb/delete/{id}', 'formDelete@PagesController'),
	Route::post('formdb/submit', 'formSubmit@PagesController'),
	Route::get('session', 'session@PagesController', 'Auth'),

	Route::get('login', 'login@Controller'),
	Route::get('register', 'register@Controller'),
	Route::get('logout', 'logout@Controller'),
	Route::post('authenticate', 'authenticate@Controller'),
	Route::post('registration', 'registration@Controller'),
);

//TODO: Authorization, Locale... Middleware