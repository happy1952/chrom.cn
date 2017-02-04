<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AmLogin_model extends CI_Model{

	public function __construct(){

		$this->load->database();
	}

	public function getKey($name, $key){

		$sql = "SELECT `{$key}` FROM ".$this->db->dbprefix."user ".
				"WHERE username = '{$name}' ".
				"LIMIT 1 ";

		$res = $this->db->query($sql);

		return $res->row_array();
	}
}

?>