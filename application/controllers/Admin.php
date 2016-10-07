<?php 


/**
* 
*/
class Admin extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') == 'admin') {
			return true;
		} else {
			if ($this->session->userdata('level') == 'kasir') {
				redirect('kasir');
			} else {
				redirect('login');
			}
		}
	}

	public function index()
	{
		$data['induk'] = 'Admin';
		$data['title'] = 'Dashboard';
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');	
		$this->load->view('admin/footer');
	}

	public function logout()
	{

		$data['title'] = "Logout";
		#destroy session
		$array = array("username", "level");
		$this->session->unset_userdata($array);

		$data['berhasil'] = "Berhasil Logout";
		$this->load->view('login/header', $data);
		$this->load->view('login/alert-berhasil', $data);
		$this->load->view('login/form-login');
		$this->load->view('login/footer');

	}
}