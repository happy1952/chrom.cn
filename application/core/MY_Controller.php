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

	protected function getUrlSource($url, $timeout=3, $useragent=''){

		$useragent = empty($useragent) ? 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.143 Safari/537.36' : $useragent;

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

		curl_setopt($ch, CURLOPT_HEADER, false);

		curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);

		curl_setopt($ch, CURLOPT_USERAGENT, $useragent);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 将CURL获取的内容赋值给变量

		curl_setopt($ch, CURLOPT_AUTOREFERER, true); 	// 根据Location:重定向时，自动设置header中的Referer

		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // 将服务器返回的"Location: "放在header中递归的返回给服务器

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// 对认证证书来源的检查

		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);// 从证书中检查SSL加密算法是否存在

		$res = curl_exec($ch);

		curl_close($ch);

		return $res;
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