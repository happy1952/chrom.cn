<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller{

	private $arr = array();

	public function __construct(){

		parent::__construct();

		$this->load->helper('url');

		$this->load->model('Test_model', 'test');

		$this->arr = array('表ID', '用户ID', '商品ID', '商品信息', '掌柜旺旺', '所属店铺', '商品数', '商品单价', '订单状态', '订单类型', '收入比率', '分成比率', '付款金额', '效果预估', '结算金额', '预估收入', '结算时间', '点击时间', '佣金比率', '佣金金额', '补贴比率', '补贴金额', '补贴类型', '成交平台', '第三方服务来源', '订单编号', '类目名称', '来源媒体ID', '来源媒体名称', '广告位ID', '广告位名称', '创建时间');
	}

	public function pullExcel(){

		$res = $this->test->getOrder();

		$res[] = $this->arr;

		$data = array_reverse($res);

		$this->load->library('PHPExcel');

		// Create new PHPExcel object
		$objPHPExcel = new PHPExcel();

		// Set properties
		$objPHPExcel->getProperties()->setCreator("TaileInternet");
		$objPHPExcel->getProperties()->setLastModifiedBy("TaileInternet");
		$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX");
		$objPHPExcel->getProperties()->setSubject("Office 2007 XLSX Test Document");
		$objPHPExcel->getProperties()->setDescription("Test document for Office 2007 XLSX");

		//添加数据
		$objPHPExcel->setActiveSheetIndex(0);

		$arr = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$i 	 = 1;
		foreach ($data as $items) {

			$j = 0;
			foreach ($items as $key => $val) {

				if($j >= 26){
					$m = floor($j / 26) - 1;
					$n = $j - 26;
					$ruler = $arr[$m].$arr[$n];
				}else{
					$ruler = $arr[$j];
				}
				$objPHPExcel->getActiveSheet()->getColumnDimension($ruler)->setAutoSize(TRUE);
				$objPHPExcel->getActiveSheet()->SetCellValue($ruler.$i, ' '.$val);
				$j++;
			}
			$i++;
		}

		// Rename sheet
		$objPHPExcel->getActiveSheet()->setTitle('订单报表');

		$filename = date('Y-m-d-His', time()).'.xls';

		$objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);
		
		$objWriter->save(str_replace('.php', '.xls', __FILE__));
		
		$this->_setHeader($filename);

		$objWriter->save("php://output");
	}

	private function _setHeader($filename){
		
		header("Pragma: public");
		
		header("Expires: 0");
		
		header("Cache-Control:must-revalidate,post-check=0,pre-check=0");
		
		header("Content-Type:application/force-download");
		
		header("Content-Type:application/vnd.ms-execl");
		
		header("Content-Type:application/octet-stream");
		
		header("Content-Type:application/download");
		
		header("Content-Disposition:attachment;filename={$filename}");
		
		header("Content-Transfer-Encoding:binary");
	}
}

?>