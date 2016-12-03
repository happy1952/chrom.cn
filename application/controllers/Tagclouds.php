<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagclouds extends CI_Controller {

	public function index(){

		$this->load->view('shan/tagcloud');
	}
}