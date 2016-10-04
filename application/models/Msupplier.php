<?php  



/**
* 
*/
class Msupplier extends CI_Model
{
	
	public function __construct()
	{
		
	}

	public function jumlah_data()
	{
		$query = $this->db->get('tsupplier');
		return $query->num_rows();
	}

	public function lihat_data($perpage, $dari)
	{
		$this->db->order_by('id_supplier', 'DESC');
		$query = $this->db->get('tsupplier', $perpage, $dari);
		return $query->result_array();
	}

	public function insert_data($data=array())
	{
		$query = $this->db->insert('tsupplier', $data);
	}
	public function jumlah_data_cari($keyword)
	{
		$this->db->like('nama_supplier', $keyword);
		$query = $this->db->get('tsupplier');
		return $query->num_rows();
	}
	public function cari_data($keyword, $perpage, $dari)
	{
		$this->db->like('nama_supplier', $keyword) ;
		$query = $this->db->get('tsupplier', $perpage, $dari);
		return $query->result_array();
	}

	public function detail($id)
	{
		$query = $this->db->query("select * from tsupplier where id_supplier = '".$id."'");
		return $query->row_array();
	}

	public function update_data($id)
	{
		$data = array(
        'nama_supplier' => $this->input->post('nama_supplier'),
        'telp' => $this->input->post('telp'),
        'alamat' => $this->input->post('alamat')
		);

		$this->db->where('id_supplier', $id);
		$this->db->update('tsupplier', $data);
	}

	public function delete_data($id)
	{
		$this->db->where('id_supplier', $id);
		$this->db->delete('tsupplier');
	}
}