<?php  


/**
* 
*/
class Barang extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mbarang');
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
		$data['title'] = 'Barang' ;
		$jumlah_data = $this->mbarang->jumlah_data();


		#pagination
		$config['base_url'] = base_url('barang/index');
		$config['total_rows'] = $jumlah_data ;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);

		$data['barangs'] = $this->mbarang->lihat_data($config['per_page'], $from);
		$data['kategoris'] = $this->mkategori->lihat_semua_data();
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('barang/table', $data);
		$this->load->view('admin/sidebar2');
		$this->load->view('admin/footer');
	}

	public function insert()
	{
		$data['induk'] = 'Barang' ;
		$data['title'] = 'Tambah Barang';
		$data['kategoris'] = $this->mkategori->lihat_semua_data();
		# membuat kode barang
		$kodebarang = $this->mbarang->max_kb()['maxkode'];
		$nomorurut = substr($kodebarang, 1, strlen($kodebarang)-1);
		$nomorurut++ ;
		$char = 'B';
		$data['kode_barang'] = $char.sprintf("%05s", $nomorurut);

		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required|is_unique[tbarang.kode_barang]');
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|is_unique[tbarang.nama_barang]');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar');
			$this->load->view('barang/form-insert', $data);
			$this->load->view('admin/sidebar2');
			$this->load->view('admin/footer');
		} else {
			$insert = array(
				'kode_barang' =>$this->input->post('kode_barang'),
				'nama_barang' =>$this->input->post('nama_barang'),
				'kategori' =>$this->input->post('kategori'),
				'stok' =>$this->input->post('stok'),
				'harga_beli' =>$this->input->post('harga_beli'),
				'harga_jual' => $this->input->post('harga_jual')
			);

			$this->mbarang->insert_data($insert);
			# session massage berhasil
			$this->session->set_userdata('berhasil', 'Berhasil menambahkan barang baru');
			redirect('barang');
		}
		
		
			
	}

	public function search()
	{
		$data['induk'] = 'Barang' ;
		$data['title'] = 'Cari Barang';
		$data['kategoris'] = $this->mkategori->lihat_semua_data();

		if (!empty($_GET['kode_barang'])) {
			$data['barangs'] = $this->mbarang->search_byKode($_GET['kode_barang']);
		} else {
			if (!empty($_GET['nama_barang'])) {
				$data['barangs'] = $this->mbarang->search_byNama($_GET['nama_barang'], @$_GET['order_key'], @$_GET['order_value']);
			} else {
				if (!empty($_GET['kategori'])) {
					$data['barangs'] = $this->mbarang->search_byKategori($_GET['kategori'], @$_GET['order_key'], @$_GET['order_value']);
				} else {
					$data['barangs'] = $this->mbarang->search_urutkan(@$_GET['order_key'], @$_GET['order_value']);
				}
			}
		}

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('barang/table', $data);
		$this->load->view('admin/sidebar2');
		$this->load->view('admin/footer');
	}

	public function edit($id)
	{
		$data['induk'] = 'Barang' ;
		$data['title'] = 'Edit Barang';
		$data['barang'] = $this->mbarang->detail($id);
		$data['kategoris'] = $this->mkategori->lihat_semua_data();
		


		$this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
		$this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('admin/header', $data);
			$this->load->view('admin/sidebar');
			$this->load->view('barang/form-edit', $data);
			$this->load->view('admin/sidebar2');
			$this->load->view('admin/footer');
		} else {
			$edit = array(
				'kode_barang' =>$this->input->post('kode_barang'),
				'nama_barang' =>$this->input->post('nama_barang'),
				'kategori' =>$this->input->post('kategori'),
				'stok' =>$this->input->post('stok'),
				'harga_beli' =>$this->input->post('harga_beli'),
				'harga_jual' => $this->input->post('harga_jual')
			);

			$this->mbarang->update_data($id, $edit);
			# session massage berhasil
			$this->session->set_userdata('berhasil', 'Berhasil Mengupdate barang');
			redirect('barang');
		}
	}

	public function delete($id)
	{
		$this->mbarang->delete_data($id);
		$berhasil = "Berhasil delete Barang";

		# set session
		$this->session->set_userdata('berhasil', $berhasil);
		redirect('barang');
	}
}