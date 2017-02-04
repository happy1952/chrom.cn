<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Amlogout extends CI_Controller{

	public function __construct(){
	
		if(!session_id()) session_start();

		parent::__construct();
	}

	public function index(){
	
		$_SESSION = array();
		
		header('Location:'.site_url('Amlogin'));
		
		exit;
	}
}
