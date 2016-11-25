<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AmLogin extends MY_Controller{

	public function __construct(){

		parent::__construct();
	}

	public function index(){

		if(!session_id()){
			session_start();
			$_SESSION['isLogin'] = TRUE;
		}
		$this->load->view('admin/login');
	}
}

?>