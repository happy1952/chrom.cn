<?php

class Test extends MY_Home{
	
	public function __construct(){
		
		parent::__construct();
	}

	public function index(){

		$this->load->view('shan/test');
	}
}

?>