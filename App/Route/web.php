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
 * index@Controller - Controller класс доторх index функцийг дуудна
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
);