<?php  

/**
* 
*/
class Musers extends CI_Model
{
	
	public function __construct()
	{
		
	}

	public function jumlah_data()
	{
		$query = $this->db->get('tusers');
		return $query->num_rows();
	}

	public function lihat_data($perpage, $dari)
	{
		$this->db->order_by('id_user', 'DESC');
		$query = $this->db->get('tusers', $perpage, $dari);
		return $query->result_array();
	}

	public function insert_data($data=array())
	{
		$query = $this->db->insert('tusers', $data);
	}

	public function jumlah_data_cari($keyword)
	{
		$this->db->like('username', $keyword);
		$this->db->or_like('nama_lengkap', $keyword);
		$query = $this->db->get('tusers');
		return $query->num_rows();
	}

	public function cari_data($keyword, $perpage, $dari)
	{
		$this->db->like('username', $keyword) ;
		$this->db->or_like('nama_lengkap', $keyword) ;
		$query = $this->db->get('tusers', $perpage, $dari);
		return $query->result_array();
	}

	public function detail($id)
	{
		$query = $this->db->query("select * from tusers where id_user = '".$id."'");
		return $query->row_array();
	}

	public function update_data($id)
	{
		$data = array(
        'nama_lengkap' => $this->input->post('nama_lengkap'),
        'username' => $this->input->post('username'),
        'telp' => $this->input->post('telp'),
        'alamat' => $this->input->post('alamat'),
        'level' => $this->input->post('level')
		);

		$this->db->where('id_user', $id);
		$this->db->update('tusers', $data);
	}

	public function delete_data($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('tusers');
	}

}