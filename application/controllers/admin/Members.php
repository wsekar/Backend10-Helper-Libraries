<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Members extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_member");
        $this->load->library('form_validation');
        $this->load->helper('tanggal');
    }

    public function index()
    {
        $data["members"] = $this->M_member->getAll();
        $this->load->view("admin/member/list_member", $data);
    }

    public function add()
    {
        $member = $this->M_member;
        $validation = $this->form_validation;
        $validation->set_rules($member->rules());

        if ($validation->run()) {
            $member->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("admin/member/add_member");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('admin/members');

        $member = $this->M_member;
        $validation = $this->form_validation;
        $validation->set_rules($member->rules());

        if ($validation->run()) {
            $member->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $data["member"] = $member->getById($id);
        if (!$data["member"]) show_404();

        $this->load->view("admin/member/edit_member", $data);
    }

    public function delete($id = null)
    {
        if (!isset($id)) show_404();

        if ($this->M_member->delete($id)) {
            redirect(site_url('admin/members'));
        }
    }
}
