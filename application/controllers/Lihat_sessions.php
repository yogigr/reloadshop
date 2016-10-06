<?php  

/**
* 
*/
class Lihat_sessions extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		
		#print_r($this->session->userdata());
		
	}
}