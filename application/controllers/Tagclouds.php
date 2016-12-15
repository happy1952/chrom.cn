<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagclouds extends MY_Home {

	public function __construct(){

		parent::__construct();
	}

	public function index(){

		$this->load->view('shan/tagcloud');
	}
}

?>