<?php
/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 2/17/17
 * Time: 10:53 PM
 */

namespace App\Model;

use App\Model\Model;

class MyModel extends Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function test(){
		$this->db->setTrace (true);
		// As a second parameter it is possible to define prefix of the path which should be striped from filename
		// $db->setTrace (true, $_SERVER['SERVER_ROOT']);
		$this->db->get("test");
		return $this->db->trace;
	}

}