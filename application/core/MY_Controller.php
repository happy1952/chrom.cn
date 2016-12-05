<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

	public function __construct(){

		parent::__construct();
	}

	protected function echoMsg($status='error', $msg=''){

		$arr['isOk'] = $status;
		
		$arr['message'] = $msg;

		exit(json_encode($arr));
	}

	protected function formatStr($str){

		return addslashes(htmlspecialchars(trim($str)));
	}

	protected function strFormat($str){

		return stripcslashes(htmlspecialchars_decode(trim($str)));
	}

	protected function toSha1($str){

		return sha1(md5($str));
	}
}

class MY_Home extends MY_Controller{

	public function __construct(){

		parent::__construct();
	}
}

class MY_Admin extends MY_Controller{

	public function __construct(){

		parent::__construct();
		
		if(!session_id()){
			
			session_start();
		}

		if(@$_SESSION['isLogin'] !== TRUE){

			header('Location:'.site_url('AmLogin'));
		}
	}
}

?>