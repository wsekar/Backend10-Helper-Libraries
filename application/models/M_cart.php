<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_cart extends CI_Model
{

	public function get_produk_all() //fungsi untuk mendapatkan semua produk
	{
		//variabel query untuk menyimpan produk yang didapatkan dari tb_produk
		$query = $this->db->get('tb_produk');
		//mengembalikan nilai dari variabel query dalam bentuk array
		return $query->result_array();
	}

	public function get_produk_kategori($kategori) //fungsi untuk mendapatkan produk kategori
	{
		//kondisi jika kategori > 0
		if ($kategori > 0) {
			//mendapatkan produk dari kategori
			$this->db->where('kategori_produk', $kategori);
		}
		//variabel query menyimpan produk yang didapatkan dari tb_produk
		$query = $this->db->get('tb_produk');
		//mengembalikan nilai dari variabel query dalam bentuk array
		return $query->result_array();
	}

	public function get_kategori_all() //fungsi untuk mendapatkan semua kategori
	{
		//variabel query untuk menyimpan kategori yang didapatkan dari tb_kategori
		$query = $this->db->get('tb_kategori');
		return $query->result_array();
	}

	public  function get_produk_id($id) //fungsi untuk mendapatkan produk berdasarkan id nya
	{
		//select semua dari tb_produk dan select nama_kategori
		$this->db->select('tb_produk.*,nama_kategori');
		//dari tb_produk
		$this->db->from('tb_produk');
		//join(menggabungkan) kategori_produk dari tb_kategori
		$this->db->join('tb_kategori', 'kategori_produk=tb_kategori.id_kategori', 'left');
		//di mana id_produk
		$this->db->where('id_produk', $id);
		//mengembalikan nilainya
		return $this->db->get();
	}
}
