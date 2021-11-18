<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_album extends CI_Model
{ //pada $_table diberikan modifer private karena hanya akan digunakan pada class ini saja
    private $_table = "tb_album"; //nama tabel
    //nama atribut dibawah ini harus sesuai dengan nama atribut pada database yang telah dibuat melalui MySql
    public $Id_album;
    public $nama_album;
    public $tanggal_rilis;

    public function rules()
    { //akan digunakan untuk mengembalikan nilai arry yang berisi rules saat validasi proses input
        // rules => required artinya pada form harus wajib diisi
        return [
            [
                'field' => 'nama_album',
                'label' => 'Nama Album',
                'rules' => 'required'
            ],

            [
                'field' => 'tanggal_rilis',
                'label' => 'Tanggal Rilis',
                'rules' => 'date'
            ],

        ];
    }

    public function getAll()
    { // result : berfungsi untuk mengambil semua data hasil query
        return $this->db->get($this->_table)->result();
        // sama artinya dg :
        // SLECT * FROM tb_album
        // method ini akan mengembalikkan sebuah array yang berisi dari object row
    }

    public function getById($id)
    { // row : mengambil satu data dari hasil query
        return $this->db->get_where($this->_table, ["Id_album" => $id])->row();
        // sama dengan :
        // SELECT * FROM tb_albums WHERE Id_albums = $id 
    }

    public function save()
    {
        $post = $this->input->post(); //mengambil data dari form
        // $this->Id_album = uniqid();
        $this->nama_album = $post["nama_album"]; // isi field nama album
        $this->tanggal_rilis = $post["tanggal_rilis"]; // isi field tanggal rilis
        return $this->db->insert($this->_table, $this); // simpan data base
        // $this -> data yang akan disimpan
    }

    public function update()
    {
        $post = $this->input->post();
        $this->Id_album = $post["id"]; //kita mengisi $this->product_id dengan id yang didapatkan dari form ($post['id'])
        $this->nama_album = $post["nama_album"];
        $this->tanggal_rilis = $post["tanggal_rilis"];
        return $this->db->update($this->_table, $this, array('Id_album' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("Id_album" => $id));
    }
}
