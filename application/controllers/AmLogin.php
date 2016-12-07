<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AmLogin extends MY_Controller{

	public function __construct(){

		if(!session_id()){
			
			session_start();
		}

		if(@$_SESSION['isLogin'] === TRUE){

			header('Location:'.site_url('Amwelcome'));
		}

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
		$this->_isLogin($username);

		parent::echoMsg('OK', '登录成功！');
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

		$res = $this->amlogin->getKey($name, 'password');

		if(parent::toSha1($pswd) !== $res['password']){

			parent::echoMsg('error', '用户名或密码不正确！');
		}
	}

	private function _setRemember(){
	
		// 记住用户名和密码
	}

	private function _isLogin($username){

		$_SESSION['username'] = $username;
		$_SESSION['isLogin'] = TRUE;
	}

	private function _checkEmpty($str, $msg){

		if(empty($str)){

			parent::echoMsg('error', $msg.'不得为空！');
		}
	}

	/**
	 * [_getRealIP 获取当前登录用户真实IP地址]
	 * @return [string] [返回用户IP地址]
	 */
	private function _getRealIP(){
		
		if(getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknow")){
			
			$ip = getenv("HTTP_CLIENT_IP");
		}else if(getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknow")){
			
			$ip = getenv("HTTP_X_FORWARDED_FOR");
		}else if(getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknow")){
			
			$ip = getenv("REMOTE_ADDR");
		}else if(isset($_SERVER["REMOTE_ADDR"]) && $_SERVER["REMOTE_ADDR"] && strcasecmp($_SERVER["REMOTE_ADDR"],"unknow")){
			
			$ip = $_SERVER["REMOTE_ADDR"];
		}else{
			
			$ip = "unknow";
		}
		return $ip;
	}

	/**
	 * [_getArea 根据用户IP获取用户所在地址]
	 * @param  [string] $ip [用户IP地址]
	 * @return [string]     [description]
	 */
	private function _getArea($ip=''){

		if(empty($ip)) return '未知地址';
		
		$str = parent::getUrlSource('http://ip.taobao.com/service/getIpInfo.php?ip='.$ip);

		if(!empty($str)){

			$areas = json_decode($str, true);
			$areas = $areas['data'];
			
			if(!empty($areas)){
				
				return $areas['country'].$areas['region'].$areas['city'];
			}
			return '未知地址';
		}
		return '未知地址';
	}
}

?>