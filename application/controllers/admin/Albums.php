<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Albums extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_album");
        $this->load->library('form_validation');
        $this->load->helper('tanggal');
    }

    public function index()
    {
        $data["albums"] = $this->M_album->getAll();
        $this->load->view("admin/album/list_album", $data);
    }

    // public function add()
    // {
    //     $album = $this->M_album;
    //     $validation = $this->form_validation->set_rules('nama_album', 'Nama Album', 'required|min_length[5]');
    //     $validation = $this->form_validation;
    //     $validation->set_rules($album->rules());

    //     if ($validation->run()) {
    //         $album->save();
    //         $this->session->set_flashdata('success', 'Berhasil disimpan');
    //     }

    //     $this->load->view("admin/album/add_album");
    // }
    public function add()
    {
        $this->load->library("form_validation");
        $this->form_validation->set_rules('nama_album', 'Nama Album', 'required|min_length[5]');
        $this->form_validation->set_rules('tanggal_rilis', 'Tanggal Rilis', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/album/add_album');
        } else {
            echo "proses simpan data album";
        }
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/albums');

        $album = $this->M_album;
        $validation = $this->form_validation;
        $validation->set_rules($album->rules());

        if ($validation->run()) {
            $album->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["album"] = $album->getById($id);
        if (!$data["album"]) show_404();

        $this->load->view("admin/album/edit_album", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->M_album->delete($id)) {
            redirect(site_url('admin/albums'));
        }
    }
}
