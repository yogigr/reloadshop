<?php  


/**
* 
*/
class Mbarang extends CI_Model
{
	
	public function __construct()
	{
		
	}

	public function jumlah_data()
	{
		$query = $this->db->get('tbarang');
		return $query->num_rows();
	}

	public function lihat_data($perpage, $dari)
	{
		$this->db->order_by('id_barang', 'DESC');
		$query = $this->db->get('tbarang', $perpage, $dari);
		return $query->result_array();
	}

	public function max_kb()
	{
		$query = $this->db->query('select max(kode_barang) as maxkode from tbarang');
		return $query->row_array();
	}

	public function insert_data($data=array())
	{
		$this->db->insert('tbarang', $data);
	}

	public function search_byKode($kodebarang)
	{
		$this->db->where('kode_barang', $kodebarang);
		$query = $this->db->get('tbarang');
		return $query->result_array();
	}

	public function search_byNama($namabarang, $order_key, $order_value)
	{
		$this->db->like('nama_barang', $namabarang);
		if (!empty($order_key)) {
			$this->db->order_by($order_key, $order_value);
		}
		$query = $this->db->get('tbarang');
		return $query->result_array();
	}

	public function search_byKategori($kategori, $order_key, $order_value)
	{
		$this->db->where('kategori', $kategori);
		if (!empty($order_key)) {
			$this->db->order_by($order_key, $order_value);
		}
		$query = $this->db->get('tbarang');
		return $query->result_array();
	}

	public function search_urutkan($order_key, $order_value)
	{
		if (!empty($order_key)) {
			$this->db->order_by($order_key, $order_value);
		}
		$query = $this->db->get('tbarang');
		return $query->result_array();
	}

	public function detail($id)
	{
		$query = $this->db->query("select * from tbarang where id_barang ='".$id."'");
		return $query->row_array();
	}

	public function update_data($id, $data=array())
	{
		$this->db->where('id_barang', $id);
		$this->db->update('tbarang', $data);
	}

	public function delete_data($id)
	{
		$this->db->where('id_barang', $id);
		$this->db->delete('tbarang');
	}

	public function ambil_nama_barang($kode_barang)
	{
		$query = $this->db->query("select nama_barang from tbarang where kode_barang = '".$kode_barang."'");
		return $query->row_array();
	}

	public function update_harga_beli($kode_barang, $data)
	{
		$this->db->where('kode_barang', $kode_barang);
		$this->db->update('tbarang', $data);
	} 
	
	
}