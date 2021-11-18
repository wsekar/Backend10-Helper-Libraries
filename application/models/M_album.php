<?php defined('BASEPATH') or exit('No direct script access allowed');

class M_album extends CI_Model
{
    private $_table = "tb_album";

    public $Id_album;
    public $nama_album;
    public $tanggal_rilis;

    public function rules()
    {
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
    {
        return $this->db->get($this->_table)->result();
    }

    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["Id_album" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        // $this->Id_album = uniqid();
        $this->nama_album = $post["nama_album"];
        $this->tanggal_rilis = $post["tanggal_rilis"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->Id_album = $post["id"];
        $this->nama_album = $post["nama_album"];
        $this->tanggal_rilis = $post["tanggal_rilis"];
        return $this->db->update($this->_table, $this, array('Id_album' => $post['id']));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array("Id_album" => $id));
    }
}
