<?php 


/**
* 
*/
class Pembelian extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mpembelian');
		$this->load->model('musers');
		$this->load->model('msupplier');
		$this->load->model('mbarang');

		if ($this->session->has_userdata('level')) {
			if ($this->session->userdata('level') == 'admin') {
				return true;
			} else {
				redirect('kasir');
			}
		} else {
			redirect('login');
		}

		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		$data['induk'] = "Transaksi";
		$data['title'] = 'Pembelian';

		#pagination
		$config['base_url'] = base_url('pembelian/index');
		$config['total_rows'] = $this->mpembelian->jumlah_data_pembelian();
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);

		$data['pembelians'] = $this->mpembelian->lihat_data_pembelian($config['per_page'], $from);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('pembelian/table', $data);
		$this->load->view('admin/footer');
	}

	public function insert()
	{
		$data['induk'] = 'Pembelian';
		$data['title'] = 'Pembelian Baru';
		$data['users'] = $this->musers->lihat_semua_data();
		$data['suppliers'] = $this->msupplier->lihat_semua_data();
		
		# membuat kode pembelian berdasarkan tanggal
		$date = date('Ymd');
		$kodepembelian = $this->mpembelian->max_pb($date)['maxpb'];
		if (empty($kodepembelian)) {
			$nomorurut = '00000';
		} else {
			$nomorurut = substr($kodepembelian, 16, strlen($kodepembelian)-16);
		}
		$nomorurut++ ;
		$char = 'PB-RLD';
		$data['kode_pembelian'] = $char.$date.sprintf("%05s", $nomorurut);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('pembelian/insert/data-pembelian', $data);
		$this->load->view('admin/footer');	
	}

	public function ambil_nama_barang()
	{
		$kodebarang = $this->input->get('kode');
		$namabarang = $this->mbarang->ambil_nama_barang($kodebarang)['nama_barang'];

		if (strlen($kodebarang) >= 6 && empty($namabarang)) {
			echo "Barang belum terdaftar";
		} else {
			echo $namabarang;
		}
	}

	public function form_simpan_item_beli()
	{
		$this->load->view('pembelian/insert/vformsimpanitembeli');
	}

	public function simpan_item_beli()
	{
		$array = array(
			'kode_pembelian' => $this->input->post('kode_pembelian'),
			'kode_barang' => $this->input->post('kode_barang'),
			'qty_beli' => $this->input->post('qty_beli'),
			'harga_beli' => $this->input->post('harga_beli'),
			'total' => $this->input->post('total')
		);

		$this->mpembelian->insert_dtlpembelian($array);
		//update harga beli di tbarang
		$update = array('harga_beli' => $array['harga_beli']);
		$this->mbarang->update_harga_beli($array['kode_barang'], $update);
	}

	public function table_item_beli($kode)
	{
		if (isset($kode)) {
			$data['item_belis'] = $this->mpembelian->tampil_dtlpembelian($kode);
			$this->load->view('pembelian/insert/vtableitembeli', $data);
		}
	}

	public function total_qty($kode)
	{
		
		if (isset($kode)) {
			$total = $this->mpembelian->total_qty($kode);
			echo $total['total_qty'];
		}
	}

	public function total_beli($kode)
	{
		
		if (isset($kode)) {
			$total = $this->mpembelian->total_beli($kode);
			echo $total['total_beli'];
		}
	}

	public function edit_item_beli($id)
	{
		$data['item_beli'] = $this->mpembelian->detail_item_beli($id);
		$this->load->view('pembelian/insert/vedititembeli', $data);
	}

	public function update_item_beli($id)
	{
		$array = array(
			'kode_pembelian' => $this->input->post('kode_pembelian'),
			'kode_barang' => $this->input->post('kode_barang'),
			'qty_beli' => $this->input->post('qty_beli'),
			'harga_beli' => $this->input->post('harga_beli'),
			'total' => $this->input->post('total')
		);

		$this->mpembelian->update_dtlpembelian($id, $array);
		//update harga beli di tbarang
		$update = array('harga_beli' => $array['harga_beli']);
		$this->mbarang->update_harga_beli($array['kode_barang'], $update);
	}

	public function hapus_item_beli($id)
	{
		$this->mpembelian->hapus_dtlpembelian($id);
	}

	public function simpan_order_beli()
	{
		date_default_timezone_set('Asia/Jakarta');
		$simpan = array(
			'kode_pembelian' => $this->input->post('kode_pembelian'),
			'no_nota' => $this->input->post('no_nota'),
			'id_supplier' => $this->input->post('id_supplier'),
			'id_user' => $this->input->post('id_user'),
			'tanggal_beli' => $this->input->post('tanggal_beli'),
			'tanggal_input' => date('m/d/Y H:i:s')
		);
		$this->mpembelian->simpan_order_beli($simpan);
		echo "Berhasil Menyimpan Order Pembelian";
	}

	public function batal_order_beli($kode)
	{
		$this->mpembelian->batal_order_beli($kode);
	}

	public function view($kode)
	{
		$data['induk'] = 'Pembelian';
		$data['title'] = 'View Pembelian '.$kode;
		$data['users'] = $this->musers->lihat_semua_data();
		$data['suppliers'] = $this->msupplier->lihat_semua_data();
		$data['pembelian'] = $this->mpembelian->detail_pembelian($kode);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('pembelian/edit/view-pembelian', $data);
		$this->load->view('admin/footer');	
	}

	public function update_order_beli($kode)
	{
		$update = array(
			'no_nota' => $this->input->post('no_nota'),
			'id_supplier' => $this->input->post('id_supplier'),
			'id_user' => $this->input->post('id_user'),
			'tanggal_beli' => $this->input->post('tanggal_beli'),
		);

		$this->mpembelian->update_order_beli($kode, $update);
		echo "Berhasil Update Order Pembelian";
	}

	public function hapus($kode)
	{
		// hapus tpembelian 
		$this->mpembelian->hapus_order_beli($kode);
		// hapus item pembelian / tdtlpembelian
		$this->mpembelian->batal_order_beli($kode);

		$berhasil = "Berhasil delete Order Beli ". $kode;

		# set session
		$this->session->set_userdata('berhasil', $berhasil);
		redirect('pembelian');
	}

	public function search()
	{
		$data['induk'] = "Transaksi";
		$data['title'] = 'Pembelian';

		$keyword = $this->input->get('kode_pembelian');

		$data['pembelians'] = $this->mpembelian->lihat_data_cari_pembelian($keyword);
		$this->load->view('admin/header', $data);
		$this->load->view('admin/sidebar');
		$this->load->view('pembelian/table', $data);
		$this->load->view('admin/footer');
	}
}