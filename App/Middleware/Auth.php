<?php
/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 2/25/17
 * Time: 11:53 PM
 */

namespace App\Middleware;

use App\System\Helper;

class Auth
{

	private $args;

	/**
	 * Auth constructor.
	 */
	public function __construct($args)
	{
		$this->args = $args;
	}

	public function run(){
		if($this->args == null) {
			return array(
				'run' => false,
				'message' => 'Hello Middleware',
			);
		}
		else {
			return array(
				'run' => true,
				'message' => 'Hello Middleware',
				'args' => $this->args,
			);
		}
	}

}