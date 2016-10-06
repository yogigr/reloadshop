<?php  


/**
* 
*/
class Kategori extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mkategori');
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
		$data['induk'] = 'Master';
		$data['title'] = 'Kategori' ;
		$jumlah_data = $this->mkategori->jumlah_data();


		#pagination
		$config['base_url'] = base_url('kategori/index');
		$config['total_rows'] = $jumlah_data ;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);

		$data['kategories'] = $this->mkategori->lihat_data($config['per_page'], $from);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('kategori/form-insert');
		$this->load->view('kategori/table', $data);
		$this->load->view('admin/sidebar2');
		$this->load->view('admin/footer');
	}

	public function insert()
	{
		$data['induk'] = 'Kategori';
		$data['title'] = 'Tambah Kategori' ;
		$jumlah_data = $this->mkategori->jumlah_data();

		#pagination
		$config['base_url'] = base_url('kategori/index');
		$config['total_rows'] = $jumlah_data ;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);

		$data['kategories'] = $this->mkategori->lihat_data($config['per_page'], $from);

		

		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|is_unique[tkategori.nama_kategori]');
		

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar');
			$this->load->view('kategori/form-insert');
			$this->load->view('kategori/table', $data);
			$this->load->view('admin/sidebar2');
			$this->load->view('admin/footer');
		} else {
			$this->mkategori->tambah_data();
			$berhasil = "Berhasil menambahkan data" ;

			# set session pesan berhasil
			$this->session->set_userdata('berhasil', $berhasil);
			redirect('kategori');
			
		}
	}

	public function search()
	{
		$data['induk'] = 'Kategori';
		$data['title'] = 'Cari Kategori' ;
		if (isset($_GET['keyword'])) {
			$keyword = $this->input->get('keyword');
			# set session keyword
			$this->session->set_tempdata('keyword', $keyword, 30);
		} else {
			$keyword = $this->session->tempdata('keyword');
		}

		$jumlah_data = $this->mkategori->jumlah_data_cari($keyword);
		

		#pagination
		$config['base_url'] = base_url('kategori/search');
		$config['total_rows'] = $jumlah_data ;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);

		$data['kategories'] = $this->mkategori->cari_data($keyword, $config['per_page'], $from);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('kategori/form-insert');
		$this->load->view('kategori/table', $data);
		$this->load->view('admin/sidebar2');
		$this->load->view('admin/footer');
	}

	public function edit($id)
	{
		$data['induk'] = 'Kategori';
		$data['title'] = 'Edit Kategori' ;
		$data['kategori'] = $this->mkategori->detail($id);

		$this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
		
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar');
			$this->load->view('kategori/form-edit', $data);
			$this->load->view('admin/sidebar2');
			$this->load->view('admin/footer');
		} else {
			$this->mkategori->update_data($id);
			$berhasil = "Berhasil update data" ;

			# set session pesan berhasil
			$this->session->set_userdata('berhasil', $berhasil);
			redirect('kategori');	
		}
	}

	public function delete($id)
	{
		$this->mkategori->delete_data($id);
		$berhasil = "Berhasil delete data";

		# set session
		$this->session->set_userdata('berhasil', $berhasil);
		redirect('kategori');
	}
}