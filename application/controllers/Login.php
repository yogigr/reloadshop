<?php 

/**
* 
*/
class Login extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mlogin');

		if ($this->session->userdata('level') == 'admin') {
			redirect('admin');
		} else {
			if ($this->session->userdata('level') == 'kasir') {
				redirect('kasir');
			} else {
				return true;
			}
		}
	}

	public function index()
	{
		$data['title'] = "login" ;
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('login/header', $data);
			$this->load->view('login/form-login');
			$this->load->view('login/footer');
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			# cek ada tidak nya user
			if ($this->mlogin->check_user($username, $password) > 0) {
				#cek level user
				$level = $this->mlogin->check_level($username);
				if ($level['level'] == 'admin') {
					#set session
					$newData = array('username' => $username, 'level' => $level['level']);
					$this->session->set_userdata($newData);

					# lempar ke admin
					redirect('admin');
				} else {
					#kasir
					$newData = array('username' => $username, 'level' => $level['level']);
					$this->session->set_userdata($newData);
					echo "ini kasir";
				}
			} else {
				$data['gagal'] = "Login gagal, username dan password tidak cocok." ;
				$this->load->view('login/header', $data);
				$this->load->view('login/alert', $data);
				$this->load->view('login/form-login');
				$this->load->view('login/footer');
			}

		}
	}

	
}