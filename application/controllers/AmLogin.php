<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AmLogin extends MY_Controller{

	public function __construct(){

		parent::__construct();

		$this->load->model('AmLogin_model', 'amlogin');
	}

	public function index(){

		if(empty($_POST)){
			
			$this->load->view('admin/login');
			return FALSE;
		}

		$username = @$_POST['username'];
		$password = @$_POST['password'];
		$remember = @$_POST['remember'];

		$this->_checkName($username);
		$this->_checkPswd($username, $password);

		$this->load->view('admin/login');
	}

	private function _checkName($name){
	
		self::_checkEmpty($name, '用户名');

		$strlen = mb_strlen($name, 'UTF-8');
		
		if($strlen < 2 || $strlen > 20){

			parent::echoMsg('error', '用户名或密码不正确！');
		}
	}

	private function _checkPswd($name, $pswd){
	
		self::_checkEmpty($pswd, '密码');

		$strlen = mb_strlen($pswd, 'UTF-8');
		
		if($strlen < 2 || $strlen > 20){

			parent::echoMsg('error', '用户名或密码不正确！');
		}

		$password = $this->amlogin->getKey($name, 'password');
	}

	private function _setRemember(){
	
		// 记住用户名和密码
	}

	private function _checkEmpty($str, $msg){

		if(empty($str)){

			parent::echoMsg('error', $msg.'不得为空！');
		}
	}
}

?>