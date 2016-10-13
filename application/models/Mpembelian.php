<?php  


/**
* 
*/
class Mpembelian extends CI_Model
{
	
	public function __construct()
	{
		# code...
	}

	public function jumlah_data_pembelian()
	{
		return $this->db->get('tpembelian')->num_rows();
	}
	public function lihat_data_pembelian($limit, $dari)
	{
		$this->db->order_by('id_pembelian', 'desc');
		return $this->db->get('tpembelian', $limit, $dari)->result_array();
	}

	public function lihat_data_cari_pembelian($keyword){
		$this->db->like('kode_pembelian', $keyword);
		return $this->db->get('tpembelian')->result_array();
	}

	public function max_pb($date)
	{
		$query = $this->db->query("select max(kode_pembelian) as maxpb from tpembelian where kode_pembelian like '%$date%'");
		return $query->row_array();
	}

	public function insert_dtlpembelian($insert = array())
	{
		$this->db->insert('tdtlpembelian', $insert);
	}

	public function tampil_dtlpembelian($kode)
	{
		$this->db->where('kode_pembelian', $kode);
		$this->db->order_by('id_dtlpembelian', 'asc');
		return $this->db->get('tdtlpembelian')->result_array();
	}

	public function total_qty($kode){
		$query = $this->db->query("select sum(qty_beli) as total_qty from tdtlpembelian where kode_pembelian = '".$kode."'");
		return $query->row_array();
	}

	public function total_beli($kode){
		$query = $this->db->query("select sum(total) as total_beli from tdtlpembelian where kode_pembelian ='".$kode."'");
		return $query->row_array();
	}

	public function detail_item_beli($id)
	{
		$this->db->where('id_dtlpembelian', $id);
		return $this->db->get('tdtlpembelian')->row_array();
	}

	public function update_dtlpembelian($id, $data)
	{
		$this->db->where('id_dtlpembelian', $id);
		$this->db->update('tdtlpembelian', $data);
	}

	public function hapus_dtlpembelian($id)
	{
		$this->db->where('id_dtlpembelian', $id);
		$this->db->delete('tdtlpembelian');
	}

	public function simpan_order_beli($data)
	{
		$this->db->insert('tpembelian', $data);
	}

	// apabila batal order, maka data item pembelian dengan kode pembelian tertentu akan terhapus.
	public function batal_order_beli($kode)
	{
		$this->db->where('kode_pembelian', $kode);
		$this->db->delete('tdtlpembelian');
	}

	public function detail_pembelian($kode)
	{
		$this->db->where('kode_pembelian', $kode);
		return $this->db->get('tpembelian')->row_array();
	}

	public function update_order_beli($kode, $update)
	{
		$this->db->where('kode_pembelian', $kode);
		$this->db->update('tpembelian', $update);
	}

	public function total_dtlpembelian($kode)
	{
		$query = $this->db->query("select sum(total) as total_pembelian from tdtlpembelian where kode_pembelian ='".$kode."'");
		return $query->row_array();
	}

	public function hapus_order_beli($kode)
	{
		$this->db->where('kode_pembelian', $kode);
		$this->db->delete('tpembelian');
	}

}