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
 */
$views = array(
	Route::get('', 'index@Controller'),
	Route::get('page', 'page@PagesController'),
	Route::get('page/{id}', 'page@PagesController'),
	Route::get('page/{id}/{asd}', 'page@PagesController'),
);