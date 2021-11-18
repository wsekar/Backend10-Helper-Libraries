<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_member extends CI_Model
{ //pada $_table diberikan modifer private karena hanya akan digunakan pada class ini saja
    private $_table = "tb_member"; //nama tabel
    //nama atribut dibawah ini harus sesuai dengan nama atribut pada database yang telah dibuat melalui MySql
    public $id_member;
    public $nama_asli;
    public $nama_panggung;
    public $tanggal_lahir;
    public $sub_unit;

    public function rules()
    {
        //akan digunakan untuk mengembalikan nilai arry yang berisi rules saat validasi proses input
        // rules => required artinya pada form harus wajib diisi
        return [
            [
                'field' => 'nama_asli',
                'label' => 'Nama Asli',
                'rules' => 'required'
            ],

            [
                'field' => 'nama_panggung',
                'label' => 'Nama Panggung',
                'rules' => 'required'
            ],
            [
                'field' => 'tanggal_lahir',
                'label' => 'Tanggal Lahir',
                'rules' => 'date'
            ],

            [
                'field' => 'sub_unit',
                'label' => 'Sub Unit',
                'rules' => 'required'
            ]
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
        return $this->db->get_where($this->_table, ["id_member" => $id])->row();
        // sama dengan :
        // SELECT * FROM tb_albums WHERE Id_albums = $id 
    }

    public function save()
    {
        $post = $this->input->post(); //mengambil data dari form
        // $this->id_member = uniqid();
        $this->nama_asli = $post["nama_asli"]; // isi field nama asli
        $this->nama_panggung = $post["nama_panggung"]; // isi field nama panggung
        $this->tanggal_lahir = $post["tanggal_lahir"]; // isi field tanggal lahir
        $this->sub_unit = $post["sub_unit"]; // isi field sub unit
        return $this->db->insert($this->_table, $this); // simpan data base
        // $this -> data yang akan disimpan
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_member = $post["id"]; //kita mengisi $this->product_id dengan id yang didapatkan dari form ($post['id'])
        $this->nama_asli = $post["nama_asli"];
        $this->nama_panggung = $post["nama_panggung"];
        $this->tanggal_lahir = $post["tanggal_lahir"];
        $this->sub_unit = $post["sub_unit"];
        return $this->db->update($this->_table, $this, array('id_member' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("id_member" => $id));
    }
}
