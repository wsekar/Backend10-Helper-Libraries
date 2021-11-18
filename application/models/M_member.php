<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_member extends CI_Model
{
    private $_table = "tb_member";

    public $id_member;
    public $nama_asli;
    public $nama_panggung;
    public $tanggal_lahir;
    public $sub_unit;

    public function rules()
    {
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
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id_member" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        // $this->id_member = uniqid();
        $this->nama_asli = $post["nama_asli"];
        $this->nama_panggung = $post["nama_panggung"];
        $this->tanggal_lahir = $post["tanggal_lahir"];
        $this->sub_unit = $post["sub_unit"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id_member = $post["id"];
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
