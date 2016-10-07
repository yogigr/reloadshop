<?php  


/**
* 
*/
class Supplier extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('msupplier');
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
		$data['title'] = 'Supplier';

		$jumlah_data = $this->msupplier->jumlah_data();


		#pagination
		$config['base_url'] = base_url('supplier/index');
		$config['total_rows'] = $jumlah_data ;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);

		$data['suppliers'] = $this->msupplier->lihat_data($config['per_page'], $from);
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('supplier/table', $data);
		$this->load->view('admin/footer');
	}

	public function insert()
	{
		$data['induk'] = "Supllier";
		$data['title'] = 'Tambah Supplier';

		$this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required|is_unique[tsupplier.nama_supplier]');
		$this->form_validation->set_rules('telp', 'Nomor Telp', 'required|min_length[4]|max_length[12]|numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar');
			$this->load->view('supplier/form-insert');
			$this->load->view('admin/footer');
		} else {
			$insert = array(
				'nama_supplier' => $this->input->post('nama_supplier'),
				'telp' => $this->input->post('telp'),
				'alamat' => $this->input->post('alamat')
			);

			$this->msupplier->insert_data($insert);
			# session massage berhasil
			$this->session->set_userdata('berhasil', 'Data supplier berhasil diinput');
			redirect('supplier');
		}
	}

	public function search()
	{
		$data['induk'] = 'Supplier';
		$data['title'] = 'Cari Supplier' ;
		if (isset($_GET['keyword'])) {
			$keyword = $this->input->get('keyword');
			# set session keyword
			$this->session->set_tempdata('keyword', $keyword, 30);
		} else {
			$keyword = $this->session->tempdata('keyword');
		}

		$jumlah_data = $this->msupplier->jumlah_data_cari($keyword);
		

		#pagination
		$config['base_url'] = base_url('supplier/search');
		$config['total_rows'] = $jumlah_data ;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);

		$data['suppliers'] = $this->msupplier->cari_data($keyword, $config['per_page'], $from);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('supplier/table', $data);
		$this->load->view('admin/footer');
	}

	public function edit($id)
	{
		$data['induk'] = 'Supplier';
		$data['title'] = 'Edit Supplier' ;
		$data['supplier'] = $this->msupplier->detail($id);

		$this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required');
		$this->form_validation->set_rules('telp', 'Nomor Telp', 'required|min_length[4]|max_length[12]|numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar');
			$this->load->view('supplier/form-edit', $data);
			$this->load->view('admin/footer');
		} else {
			$this->msupplier->update_data($id);
			$berhasil = "Berhasil update data" ;

			# set session pesan berhasil
			$this->session->set_userdata('berhasil', $berhasil);
			redirect('supplier');	
		}
	}

	public function delete($id)
	{
		$this->msupplier->delete_data($id);
		$berhasil = "Berhasil delete data";

		# set session
		$this->session->set_userdata('berhasil', $berhasil);
		redirect('supplier');
	}

}