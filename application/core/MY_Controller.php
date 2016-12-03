<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

	public function __construct(){

		parent::__construct();
	}
}

class MY_Home extends MY_Controller{

	public function __construct(){

		parent::__construct();
	}
}

class MY_Admin extends MY_Controller{

	public function __construct(){

		parent::__construct();
		
		if(!session_id()){
			
			session_start();
		}

		if(@$_SESSION['isLogin'] !== TRUE){

			header('Location:'.site_url('AmLogin'));
		}
	}
}

?>