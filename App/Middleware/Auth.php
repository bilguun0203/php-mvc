<?php
/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 3/10/17
 * Time: 11:13 PM
 */

namespace App\Middleware;

use App\Lib\UserAuth;
use App\System\Helper;

class Auth
{

	private $args;

	public function __construct($args)
	{
		$this->args = $args;
	}

	public function run(){
		$user = new UserAuth();
		if($user->isloggedin()) {
			return array(
				'run' => true,
				'message' => 'Logged in!',
			);
		}
		else {
			return array(
				'run' => false,
				'message' => 'Not logged in!',
			);
		}
	}
}