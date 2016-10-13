<?php 


/**
* 
*/
class Latihan extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
	}


	public function index()
	{
		$kode_pembelian = @$_GET['kode_pembelian'];
		$tanggal_pembelian = @$_GET['tanggal_pembelian'];
		$kode_barang = @$_GET['kode_barang'];
		$qty = @$_GET['quantity'];
		$total_harga = @$_GET['total_harga'];
		$harga_satuan = @$_GET['harga_satuan'];

		if (!isset($kode_pembelian)) {
			$this->load->view('latihan/pembelian');
		} else {
			$data = array(
				
				'kode_barang' => $kode_barang,
				'qty' => $qty,
				'harga_satuan' => $harga_satuan,
				'total_harga' => $total_harga
				
			);

			$this->cart->insert($data);
			$this->load->view('latihan/pembelian2');
		}
	}
}