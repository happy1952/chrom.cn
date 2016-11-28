<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Fileupload_model extends CI_Model{

	public function __construct(){

		parent::__construct();
		
		$this->load->database();
		
	}

	public function getNewID(){

		$sql = "SELECT `spreadId` FROM ".$this->db->dbprefix."spread ".
				"WHERE 1 = 1 ".
				"ORDER BY `spreadId` DESC ".
				"LIMIT 1 ";
		
		$res = $this->db->query($sql);

		return $res->row_array();
	}

	public function saveSpread($data){

		if($this->db->insert('spread', $data)){

			return $this->db->insert_id();
		}else{

			$ids = $this->getNewID();
			return $ids['spreadId'];
		}
	}

	/**
	 * [getAllProductIDs 获取当前用户已上传推广位下所有商品ID]
	 * @param  [type] $old_id [推广位ID]
	 * @return [type]         [description]
	 */
	public function getAllProductIDs($old_id){

		$sql = "SELECT gid FROM ".$this->db->dbprefix."goods ".
				"WHERE 1 = 1 ".
				"AND spreadId = {$old_id} ".
				"AND uid = {$_SESSION['uid']} ";
		
		$res = $this->db->query($sql);

		foreach ($res->result_array() as $key => $val) {
			
			$arr[$key] = $val['gid'];
		}

		return $arr;
	}

	public function saveProduct($str){

		$sql = "INSERT INTO ".$this->db->dbprefix."goods (`id`, `gid`, `uid`, `gname`, `gimage`, `iscat`, `productDesc`, `price`, `pcommission`, `mcommission`, `link`, `spreadId`, `downLink`, `couponInfo`, `couponLink`, `monthSales`, `Taocode`, `createtime`, `totalCoupon`, `surplusCoupon`) ".$str;

		return $this->db->query($sql);
	}
}

?>
