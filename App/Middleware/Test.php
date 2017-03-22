<?php
/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 2/25/17
 * Time: 11:53 PM
 */

namespace App\Middleware;

use App\System\Helper;

class Test
{

	private $args;

	public function __construct($args)
	{
		$this->args = $args;
	}

	public function run(){
		$session = Helper::session('test');
		if($session==false) {
			return array(
				'run' => false,
				'message' => 'Hello Middleware',
				'session' => $session,
			);
		}
		else {
			return array(
				'run' => true,
				'message' => 'Hello Middleware',
				'args' => $this->args,
				'session' => $session,
			);
		}
	}

}