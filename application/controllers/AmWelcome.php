<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AmWelcome extends MY_Admin{

	public function __construct(){

		parent::__construct();
	}

	public function index(){

		$this->load->view('admin/index');
	}
}

?>
