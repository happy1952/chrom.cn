<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {

	public function index(){

		$this->load->view('shan/author');
	}
}
