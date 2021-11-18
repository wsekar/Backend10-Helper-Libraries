<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_cart extends CI_Model
{

	public function get_produk_all()
	{
		$query = $this->db->get('tb_produk');
		return $query->result_array();
	}

	public function get_produk_kategori($kategori)
	{
		if ($kategori > 0) {
			$this->db->where('kategori_produk', $kategori);
		}
		$query = $this->db->get('tb_produk');
		return $query->result_array();
	}

	public function get_kategori_all()
	{
		$query = $this->db->get('tb_kategori');
		return $query->result_array();
	}

	public  function get_produk_id($id)
	{
		$this->db->select('tb_produk.*,nama_kategori');
		$this->db->from('tb_produk');
		$this->db->join('tb_kategori', 'kategori_produk=tb_kategori.id_kategori', 'left');
		$this->db->where('id_produk', $id);
		return $this->db->get();
	}

	public function tambah_pelanggan($data)
	{
		$this->db->insert('tb_pelanggan', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}

	public function tambah_order($data)
	{
		$this->db->insert('tb_order', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}

	public function tambah_detail_order($data)
	{
		$this->db->insert('tb_detail_order', $data);
	}
}
