<?php
/**
 * Created by PhpStorm.
 * User: bilguun
 * Date: 3/10/17
 * Time: 11:17 PM
 */

namespace App\Lib;

use App\Model\Model;
use App\System\Helper;
use App\Model\MyModel;

class UserAuth
{

	private $userID;
	private $token;
	private $loggedin = false;

	private $Model;

	private $user;

	public function __construct(){
		$this->Model = new MyModel();
		$this->Model = $this->Model->db;
	}

	public function login($email = null, $password = null, $remember = false) {

		$Model = new MyModel();
		$tok = uniqid();

		if($email == null && $password == null) {
			if (Helper::session('user_id') != false && Helper::session('user_remember_token') != false) {
				$this->userID = Helper::session('user_id');
				$this->token = Helper::session('user_remember_token');
				$this->Model->where('id', $this->userID);
				$result = $this->Model->getOne('users', 'remember_token');
				if($result != null) {
					if ($result['remember_token'] == $this->token) {
						$this->loggedin = true;
						return true;
					}
					else {
						$this->reset();
						return false;
					}
				}
				else {
					$this->reset();
					return false;
				}
			} elseif (Helper::cookie('user_id') != false && Helper::cookie('user_remember_token') != false) {
				$this->userID = Helper::cookie('user_id');
				$this->token = Helper::cookie('user_remember_token');
				$this->Model->where('id', $this->userID);
				$result = $this->Model->getOne('users', 'remember_token');
				if($result != null) {
					if ($result['remember_token'] == $this->token) {
						$this->Model->where('id', Helper::cookie('user_id'));
						$this->Model->update('users',array('remember_token' => $tok));
						Helper::session('user_id', Helper::cookie('user_id'));
						Helper::session('user_remember_token', $tok);
						Helper::cookie('user_id', Helper::cookie('user_id'), 604800);
						Helper::cookie('user_remember_token', $tok, 604800);
						$this->token = $tok;
						$this->loggedin = true;
						return true;
					}
					else {
						$this->reset();
						return false;
					}
				}
				else {
					$this->reset();
					return false;
				}
			} else {
				$this->loggedin = false;
				return false;
			}
		}
		else {
			$this->Model->where('email', $email);
			$result = $this->Model->getOne('users', '*');
			if($result != null) {
				if(password_verify($password, $result['password'])){
					Helper::session('user_id', $result['id']);
					Helper::session('user_remember_token', $tok);
					if($remember){
						Helper::cookie('user_id', $result['id'], 604800);
						Helper::cookie('user_remember_token', $tok, 604800);
					}
					else {
						Helper::cookieDelete('user_id');
						Helper::cookieDelete('user_remember_token');
					}
					$this->Model->where('email', $email);
					$this->Model->update('users',array('remember_token' => $tok));
					$this->loggedin = true;
					return true;
				}
				else {
					return false;
				}
			}
			else {
				return false;
			}
		}
	}

	public function register($name, $email, $password){
		$Model = new MyModel();
		$name_exists = false;
		$email_exists = false;
		if($name != "" && filter_var($email, FILTER_VALIDATE_EMAIL) && $password != ""){
			$this->Model->where('username', $name);
			$result = $this->Model->getOne('users');
			if($result != null){
				Helper::flush('name_exists', "Username already registered");
				$name_exists = true;
			}
			$this->Model->where('email', $email);
			$result = $this->Model->getOne('users');
			if($result != null){
				Helper::flush('email_exists', "Email already registered");
				$email_exists = true;
			}
			if($name_exists == true || $email_exists == true){
//				Helper::redirect('register');
				return false;
			}
			else {
				$result = $this->Model->insert('users', array(
					'username' => $name,
					'email' => $email,
					'password' => password_hash($password, PASSWORD_DEFAULT)
				));
				if($result){
					Helper::flush('registered', 'Successfully registered');
//					Helper::redirect('login');
					return true;
				}
			}
		}
		else {
//			Helper::redirect('register');
			Helper::flush('empty', "Empty");
			return false;
		}
	}

	public function isloggedin(){
		$this->login();
		$this->userID = Helper::session('user_id');
		$this->token = Helper::session('user_remember_token');
		$this->Model->where('id', $this->userID)->where('remember_token', $this->token);
		$result = $this->Model->getOne('users');
		if($result != null){
			return true;
		}
		else {
			return false;
		}
	}
	
	public function logout(){
		$this->userID = Helper::session('user_id');
		$this->token = Helper::session('user_remember_token');
		$this->Model->where('id', $this->userID)->where('remember_token', $this->token);
		$result = $this->Model->getOne('users', '*');
		if($result != null) {
			$this->Model->where('id', $this->userID)->where('remember_token', $this->token);
			$this->Model->update('users',array('remember_token' => uniqid()));
		}
		Helper::sessionDelete('user_id');
		Helper::sessionDelete('user_remember_token');
		Helper::cookieDelete('user_id');
		Helper::cookieDelete('user_remember_token');
		$this->reset();
	}

	private function reset() {
		$this->userID = null;
		$this->token = null;
		$this->loggedin = false;
	}

}