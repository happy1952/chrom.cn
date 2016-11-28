<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Getproductdesc extends CI_Controller{
		
	public function __construct(){
		
		parent::__construct();
	}
	
	// 请求淘宝页面
	public function getProductDesc($url=''){

		$url = empty($url) ? 'https://item.taobao.com/item.htm?id=522125608739' : $url;

		if(empty($url)){

			return FALSE;
		}

		$arr = get_headers($url, 1);

		$urls = empty($arr['Location']) ? $arr['location'] : $arr['Location'];

		if(is_array($urls)){
			
			$url = end($urls);	
		}else{
			
			$url = $urls;
		}

		$ch = curl_init();
	
		curl_setopt($ch, CURLOPT_URL, $url);
	
		curl_setopt($ch, CURLOPT_HEADER, false);
	
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

		curl_setopt($ch, CURLOPT_AUTOREFERER, true);

		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	
		$res = curl_exec($ch);

		$res = $this->_cutDesc($res);

		echo empty($res) ? '无' : $res;
	}

	// 截取文案
	private function _cutDesc($str){
		
		$tmall = strstr($str, 'class="tb-detail-hd"');
		
		if(!empty($tmall)){

			$data['isTmall'] = 1; // 天猫

			$str = strstr(strstr($str, 'class="tb-detail-hd"'), '</div>', true);

			$str = iconv('GB2312', 'UTF-8', $str);

			return trim(trim(strstr(strstr($str, '</p>', true), '<p>'), '<p>'));
		}else{

			$data['isTmall'] = 0; // 淘宝

			$str = strstr(strstr($str, 'class="tb-subtitle"'), '</p>', true);

			$str = iconv('GB2312', 'UTF-8', $str);

			return trim(trim($str, 'class="tb-subtitle">'));
		}
	}

	// echo getProductDesc('https://item.taobao.com/item.htm?id=522125608739');
	// echo getProductDesc('http://item.taobao.com/item.htm?id=539338308618');
}
?>