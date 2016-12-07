<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct(){

		parent::__construct();
	}

	protected function echoMsg($isOk='error', $msg=''){

		exit(json_encode(array('isOk'=>$isOk, 'message'=>$msg)));
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

	public function error($msg=''){

		$data['message'] = empty($msg) ? '非法操作！' : $msg;

		$this->load->view('errors/zdy/errortpl', $data);
	}

	protected function success($msg='', $url){

		$data['message'] = empty($msg) ? '执行成功！' : $msg;

		$data['waitsecond'] = 1;

		$data['jumpurl'] = empty($url) ? current_url() : site_url($url);

		$this->load->view('errors/zdy/successtpl', $data);
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
			exit;
		}
	}
}

?>