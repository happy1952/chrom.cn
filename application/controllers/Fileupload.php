<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Fileupload extends MY_Admin{

	public function __construct(){

		parent::__construct();
		$this->load->model('Fileupload_model', 'upfile');
	}

	public function index(){

		$this->load->view('admin/fileupload');
	}

	// 执行具体上传操作
	public function uploadFile(){

		// 格式化$_FILES数组
		$files = $this->_formatArr($_FILES['myfile']);

		// 上传Excel文件并将其内容转化为PHP数组
		foreach ($files as $file) {
			
			list($name, $path) = $this->_doUpload($file);
			$name = trim(trim($name, '.xls'), '.xlsx');
			$data[$name]  = $this->_excel2Array($path);
		}

		$ids 	 = $this->upfile->getNewID();
		$new_sid = $ids['spreadId'];
		$str = " VALUES"; // 初始化插入语句

		// 第一次遍历来创建推广位
		foreach ($data as $key => $items) {

			if(strstr($key, '#')){

				// 若推广位存在则判断是否有重复商品
				$old_id = trim(strstr($key, '#'), '#');
				$sid = $old_id; // 获取商品推广位ID
			}else{

				$new_sid = $new_sid + 1;
				// 若之前没有上传过，则新建推广位并返回最新ID
				$sid = $this->_saveSpread($new_sid, $key); 
			}

			// 第二次遍历插入商品
			foreach ($items as $val) {

				// 将推广位ID加入数组
				$val['sid'] = $sid;

				// 若向已存在推广位添加商品，则检查上传商品与数据库商品是否有重复
				if($old_id != ''){

					// 获取该推广位下所有商品ID
					$pro_ids = $this->upfile->getAllProductIDs($old_id);
				}

				// 判断同一推广位下已上传商品是否与当前上传商品重复
				if(in_array($val['A'], $pro_ids)){

					continue;
				}
				$id = '';
				$gid = $val['A'];
				$uid = $_SESSION['uid'];
				$gname = $val['B'];
				$gimage = $this->saveImg($val['C']);
				$descs = $this->getProductDesc($val['D']);
				$iscat = $descs['iscat'];
				$productDesc = $descs['productDesc'];
				$price = $val['F'];
				$pcommission = $val['I'];
				$mcommission = '';
				$link = $val['D'];
				$spreadId = $val['sid'];
				$downLink = $val['K'];
				$couponInfo = $val['P'];
				$couponLink = $val['S'];
				$monthSales = $val['G'];
				$Taocode = $val['M'];
				$createtime = time();
				$totalCoupon = $val['N'];
				$surplusCoupon = $val['O'];

				// 拼接SQL语句
				$str .= " ('{$id}', '{$gid}', '{$uid}', '{$gname}', '{$gimage}', '{$iscat}', '{$productDesc}', '{$price}', '{$pcommission}', '{$mcommission}', '{$link}', '{$spreadId}', '{$downLink}', '{$couponInfo}', '{$couponLink}', '{$monthSales}', '{$Taocode}', '{$createtime}', '{$totalCoupon}', '{$surplusCoupon}'),";

			}
			unset($old_id);
		}
		// 向数据库中插入商品
		if($this->upfile->saveProduct(trim($str, ','))){

			parent::echoMsg('OK', '');
			return TRUE;
		}
		parent::echoMsg('error', '上传失败');
		return FALSE;
	}

	// 创建推广位
	private function _saveSpread($key, $name){

		$data['spreadName'] = $name;
		$data['spreadKey'] 	= $key;
		$data['over'] 		= '0';
		$data['createtime'] = time();
		$data['updatetime'] = time();
		$data['operator'] 	= $_SESSION['uid'];
		return $this->upfile->saveSpread($data);
	}

	/**
	 * [doupload 具体上传操作]
	 * @return [type] [返回文件名]
	 */
	private function _doUpload($file){

		// 检验当前活动ID	
		if(!is_array($file)){

			parent::echoMsg('error', '非法文件');
			return FALSE;
		}

		// 接受图片信息	
		$picname = $file['name'];
		$picsize = $file['size'];
		$pictype = trim(strstr($picname, '.'), '.');
		
		if($picname == '') return FALSE; 		// 检查上传文件名
		$this->_checkSize($picsize);	 		// 检查上传图片的大小
		$filepath = str_replace('\\', '/', trim(trim(APPPATH, 'application\\'), '\\')).'/static/uploads/excel/';  // 图片保存路径

		if(!is_dir($filepath)){
			
			@mkdir($filepath);
		}

		// 整合图片路径和名称
		$filepath = iconv("UTF-8", "GB2312", $filepath.$picname);

		// 将上传文件移动到指定目录
		if(move_uploaded_file($file['tmp_name'], $filepath)){

			return array($picname, iconv("GB2312", "UTF-8", $filepath));
		}
		parent::echoMsg('error', '上传失败，请稍后再试~');
	}

	// 请求淘宝页面
	private function getProductDesc($url){

		if(empty($url)){

			return FALSE;
		}
		
		$ch = curl_init();
	
		curl_setopt($ch, CURLOPT_URL, $url);
	
		curl_setopt($ch, CURLOPT_HEADER, false);
	
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	
		curl_setopt($ch, CURLOPT_AUTOREFERER, true);
	
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	
		$res = curl_exec($ch);
	
		curl_close($ch);

		$res = $this->_cutDesc(iconv("GB2312", "UTF-8", $res));

		$res['productDesc'] = empty($res['productDesc']) ? '无' : $res['productDesc'];

		return $res;
	}

	// 截取文案
	private function _cutDesc($str){

		$tmall = strstr($str, 'class="tb-detail-hd"');
		
		if(!empty($tmall)){

			$data['iscat'] = 1; // 是天猫

			$str = strstr(strstr($str, 'class="tb-detail-hd"'), '</div>', true);

			$data['productDesc'] = trim(trim(strstr(strstr($str, '</p>', true), '<p>'), '<p>'));
		}else{

			$data['iscat'] = 0; // 非天猫

			$str = strstr(strstr($str, 'class="tb-subtitle"'), '</p>', true);

			$data['productDesc'] = trim(trim($str, 'class="tb-subtitle">'));
		}
		return $data;
	}

	// 检查上传文件大小
	private function _checkSize($size){
	
		if($size > 4096000){

			parent::echoMsg('error', '图片大小不能超过4MB！');
			return FALSE;	
		}
	}

	/*
	 * 根据图片链接将图片上传到本地服务器
	 */
	private function saveImg($url){
	
		$res    = base64_encode(@file_get_contents($url));
	
		$type   = $this->_getImgInfo($url);
	
		$imgPath = './static/uploads/images/'.$this->_getImgName().'.'.$type;
	
		@file_put_contents($imgPath, base64_decode($res));

		return trim($imgPath, '.');
	}
	
	// 获取图片MIME类型
	private function _getImgInfo($imgurl){
	
		$arr = getimagesize($imgurl);
	
		switch ($arr[2]) {
			case '1':
				$arr['type'] = 'gif';
				break;
			case '2':
				$arr['type'] = 'jpg';
				break;
			case '3':
				$arr['type'] = 'png';
				break;
			default:
				$arr['type'] = 'jpg';
				break;
		}
	
		return $arr['type'];
	}
	
	// 生成图片文件名
	private function _getImgName(){
	
		return md5(rand(1000, 9999).time().rand(100000, 999999));
	}

	/**
	 * [_formatArr 格式化数组]
	 * @param  [type] $arr [description]
	 * @return [type]      [description]
	 */
	private function _formatArr($arr){

		if(empty($arr) || !is_array($arr)){

			return FALSE;
		}

		$files 	= array();

		for ($i = 0; $i < count($arr['name']); $i++) { 
			
			foreach ($arr as $key => $val) {
				
				$files[$i][$key] = $val[$i];
			}
		}

		return $files;
	}

	/**
	 * [excel2Array 将EXCEL文件转换为PHP数组]
	 * @return [type] [description]
	 */
	private function _excel2Array($filepath=''){
		
		$filepath = iconv("UTF-8", "GB2312", $filepath);

		if(empty($filepath) || !is_file($filepath)){

			parent::echoMsg('error', '请输入正确的文件路径！');
			return FALSE;
		}

		$this->load->library('PHPExcel');

		$read = new PHPExcel_Reader_Excel2007();

		if(!$read->canRead($filepath)){

			$read = new PHPExcel_Reader_Excel5();

			if(!$read->canRead($filepath)){

				exit('Not Open Excel');
			}
		}

		$PHPExcel 		= $read->load($filepath); 				//建立excel对象
		
		$currentSheet 	= $PHPExcel->getSheet(0); 				//读取excel文件中的指定工作表
		
		$allColumn 		= $currentSheet->getHighestColumn(); 	//取得最大的列号
		
		$allRow 		= $currentSheet->getHighestRow(); 		//取得一共有多少行
		
		$data 			= array();

		for($rowIndex=2; $rowIndex <= $allRow; $rowIndex++){ 	//循环读取每个单元格的内容。注意行从1开始，列从A开始

			for($colIndex='A'; $colIndex <= $allColumn; $colIndex++){

				$addr = $colIndex.$rowIndex;

				$cell = $currentSheet->getCell($addr)->getValue();

				if($cell instanceof PHPExcel_RichText){ 		//富文本转换字符串

					$cell = $cell->__toString();

				}

				$data[$rowIndex][$colIndex] = $cell;
			}
		}
		
		return $data;
	}
}


?>