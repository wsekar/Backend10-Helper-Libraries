<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Albums extends CI_Controller
{
    public function __construct() //  Method ini yang akan dieksekusi pertama kali saat Controller diakses.
    {
        parent::__construct();
        $this->load->model("M_album"); // load model album
        $this->load->library('form_validation'); //load library (form_validation)
        // Library form_validation akan digunakan untuk memvalidasi input pada method add() dan edit()
        $this->load->helper('tanggal'); //load helper tanggal
    }

    public function index()
    {
        $data["albums"] = $this->M_album->getAll(); // mengambil data dari model dengan memanggil method M_album->getAll().
        $this->load->view("admin/album/list_album", $data); // view/menampilkan list dari data mlbum
    }

    public function add() // menampilkan form add dan menyimpan data ke database
    {
        $this->load->library("form_validation"); //load library form validation
        $this->form_validation->set_rules('nama_album', 'Nama Album', 'required|min_length[5]'); //set rules form validation Nama album, harus diisi dengan panjang minimal 5 karakter
        $this->form_validation->set_rules('tanggal_rilis', 'Tanggal Rilis', 'required'); //set rules form validation tanggal rilis, harus diisi

        if ($this->form_validation->run() == FALSE) { // melakukan validasi
            $this->load->view('admin/album/add_album'); // menampilkan form add
        } else {
            echo "proses simpan data album";
        }
    }
    // $id -> data yang akan diedit , 
    public function edit($id = null)
    { // dilakukan rederict ke route admin/members jika $id bernilai null
        if (!isset($id)) redirect('admin/albums');

        $album = $this->M_album; // objek model album
        $validation = $this->form_validation; // objek validation
        $validation->set_rules($album->rules()); //menerapkan rules

        if ($validation->run()) { // melakukan validasi
            $album->update(); // menyim[an data yang telah di edit
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["album"] = $album->getById($id); // mengambil data untuk ditampilkan pada form edit
        if (!$data["album"]) show_404(); // apabila data tidak ada maka akan eror 404

        $this->load->view("admin/album/edit_album", $data); // menampilkan form edit
    }
    // $id untuk menentukkan data mana yang akan dihapus
    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->M_album->delete($id)) {
            redirect(site_url('admin/albums')); // apabila berhasil akan menredirect ke halaman admin/albums
        }
    }
}
