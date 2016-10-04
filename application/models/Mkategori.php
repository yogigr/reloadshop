<?php  


/**
* 
*/
class Mkategori extends CI_Model
{
	
	public function __construct()
	{
		
	}

	public function jumlah_data()
	{
		$query = $this->db->query("select * from tkategori");
		return $query->num_rows(); 
	}

	public function lihat_data($perpage, $dari) 
	{
		$this->db->order_by('id_kategori', 'DESC');
		$query = $this->db->get('tkategori', $perpage, $dari);
		return $query->result_array();
	}

	public function tambah_data()
	{
		$data = array(
			'nama_kategori' => $this->input->post('nama_kategori')
		);

		$this->db->insert('tkategori', $data);
	}

	public function jumlah_data_cari($keyword)
	{
		$this->db->like('nama_kategori', $keyword);
		$query = $this->db->get('tkategori');
		return $query->num_rows();
	}

	public function cari_data($keyword, $perpage, $dari)
	{
		$this->db->like('nama_kategori', $keyword) ;
		$query = $this->db->get('tkategori', $perpage, $dari);
		return $query->result_array();
	}

	public function detail($id)
	{
		$query = $this->db->query("select * from tkategori where id_kategori = '".$id."'");
		return $query->row_array();
	}

	public function update_data($id)
	{
		$data = array(
        'nama_kategori' => $this->input->post('nama_kategori'),
		);

		$this->db->where('id_kategori', $id);
		$this->db->update('tkategori', $data);
	}

	public function delete_data($id)
	{
		$this->db->where('id_kategori', $id);
		$this->db->delete('tkategori');
	}
}