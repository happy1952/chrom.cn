<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AmArticlemanage extends MY_Admin {
	
	public function __construct(){
		
		parent::__construct();
	}

	public function index(){

		$this->load->view('admin/articlemanage');
	}

	public function addArticle(){

		$this->load->view('admin/addarticle');
	}
}

?>