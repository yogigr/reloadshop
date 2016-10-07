<?php  


/**
* 
*/
class Users extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('musers');
		if ($this->session->has_userdata('level')) {
			if ($this->session->userdata('level') == 'admin') {
				return true;
			} else {
				redirect('kasir');
			}
		} else {
			redirect('login');
		}
	}

	public function index()
	{
		$data['induk'] = 'Master' ;
		$data['title'] = 'Users' ;

		$jumlah_data = $this->musers->jumlah_data();


		#pagination
		$config['base_url'] = base_url('users/index');
		$config['total_rows'] = $jumlah_data ;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);

		$data['users'] = $this->musers->lihat_data($config['per_page'], $from);
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('users/table', $data);
		$this->load->view('admin/footer');
	}

	public function insert()
	{
		$data['induk'] = "Users";
		$data['title'] = 'Tambah User';

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[tusers.username]');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Konfirmasi Password', 'required|matches[password]');
		$this->form_validation->set_rules('telp', 'No Telp', 'required|numeric|min_length[6]|max_length[12]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar');
			$this->load->view('users/form-insert');
			$this->load->view('admin/footer');
		} else {
			$insert = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'telp' => $this->input->post('telp'),
				'alamat' => $this->input->post('alamat'),
				'level' => $this->input->post('level')
			);

			$this->musers->insert_data($insert);
			# session massage berhasil
			$this->session->set_userdata('berhasil', 'Berhasil menambahkan user baru');
			redirect('users');
		}
	}

	public function search()
	{
		$data['induk'] = 'Users';
		$data['title'] = 'Cari User' ;
		if (isset($_GET['keyword'])) {
			$keyword = $this->input->get('keyword');
			# set session keyword
			$this->session->set_tempdata('keyword', $keyword, 30);
		} else {
			$keyword = $this->session->tempdata('keyword');
		}

		$jumlah_data = $this->musers->jumlah_data_cari($keyword);
		

		#pagination
		$config['base_url'] = base_url('users/search');
		$config['total_rows'] = $jumlah_data ;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);

		$data['users'] = $this->musers->cari_data($keyword, $config['per_page'], $from);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('users/table', $data);
		$this->load->view('admin/footer');
	}

	public function edit($id)
	{
		$data['induk'] = 'Users';
		$data['title'] = 'Edit User' ;
		$data['user'] = $this->musers->detail($id);

		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('telp', 'No Telp', 'required|numeric|min_length[6]|max_length[12]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('level', 'Level', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar');
			$this->load->view('users/form-edit', $data);
			$this->load->view('admin/footer');
		} else {
			$this->musers->update_data($id);
			$berhasil = "Berhasil update data" ;

			# set session pesan berhasil
			$this->session->set_userdata('berhasil', $berhasil);
			redirect('users');	
		}
	}

	public function delete($id)
	{
		$username = $this->musers->detail($id);
		if ($username['username'] == $this->session->userdata('username')) {
			# set session pesan gagal
			$this->session->set_userdata('gagal', 'User ini sedang login, jadi tidak bisa dihapus');
			redirect('users');
		}
		
		
		$this->musers->delete_data($id);
		$berhasil = "Berhasil delete data";

		# set session
		$this->session->set_userdata('berhasil', $berhasil);
		redirect('users');
	}
}