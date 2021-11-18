<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Members extends CI_Controller
{
    public function __construct() //  Method ini yang akan dieksekusi pertama kali saat Controller diakses.
    {
        parent::__construct();
        $this->load->model("M_member"); // load model member
        $this->load->library('form_validation'); //load library (form_validation)
        // Library form_validation akan digunakan untuk memvalidasi input pada method add() dan edit()
        $this->load->helper('tanggal'); //load helper tanggal
    }

    public function index()
    {
        $data["members"] = $this->M_member->getAll(); // mengambil data dari model dengan memanggil method M_member->getAll().
        $this->load->view("admin/member/list_member", $data); // view/menampilkan list dari data member
    }

    public function add() // menampilkan form add dan menyimpan data ke database
    {
        $member = $this->M_member; // objek model
        $validation = $this->form_validation; // objek form validation
        $validation->set_rules($member->rules()); // terapkan rules

        if ($validation->run()) { // melakukan validasi
            $member->save(); //simpan data ke database
            $this->session->set_flashdata('success', 'Berhasil disimpan'); // pesan berhasil
        }

        $this->load->view("admin/member/add_member"); // menampilkan form add
    }

    public function edit($id = null) // $id -> data yang akan diedit , 
    { // dilakukan rederict ke route admin/members jika $id bernilai null
        if (!isset($id)) redirect('admin/members');

        $member = $this->M_member; // objek model
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($member->rules()); //menerapkan rules

        if ($validation->run()) { // melakukan validasi
            $member->update(); // menyim[an data yang telah di edit
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["member"] = $member->getById($id); // mengambil data untuk ditampilkan pada form edit
        if (!$data["member"]) show_404(); // apabila data tidak ada maka akan eror 404

        $this->load->view("admin/member/edit_member", $data); // menampilkan form edit
    }


    // $id untuk menentukkan data mana yang akan dihapus
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->M_member->delete($id)) {
            redirect(site_url('admin/members')); // apabila berhasil akan menredirect ke halaman admin/members
        }
    }
}
