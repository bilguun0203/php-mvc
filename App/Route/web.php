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
 * Route::get(хаяг, контроллер);
 *
 * POST
 * Route::post(хаяг, контроллер);
 *
 */
$views = array(
	Route::get('', 'index@Controller'),
	Route::get('page', 'page@PagesController'),
	Route::get('page/{id}', 'page@PagesController'),
	Route::get('page/{id}/{asd}', 'page@PagesController'),
	Route::get('db', 'dbDummy@PagesController'),
	Route::get('testdb', 'pageDB@PagesController'),
	Route::get('testdb/{page}', 'pageDB@PagesController'),
	Route::post('postTest', 'postTest@PagesController'),
	Route::get('formdb', 'formDB@PagesController'),
	Route::post('formdb/submit', 'formSubmit@PagesController'),
);