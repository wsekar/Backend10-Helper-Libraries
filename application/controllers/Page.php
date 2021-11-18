<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart'); //load library cart
		$this->load->model('M_cart'); //load model M_cart
	}
	public function index()
	{
		$data['produk'] = $this->M_cart->get_produk_all(); //get all produk dari M_cart dan disimpan dalam variabel produk
		$data['kategori'] = $this->M_cart->get_kategori_all();//get all kategori dari M_cart dan disimpan dalam variabel kategori
		$this->load->view('themes/header', $data); //load view themes/header
		$this->load->view('shopping/list_produk', $data); //load view shopping/list_produk, dan menampilkan data dari produk dan kategori
		$this->load->view('themes/footer');//load view themes/footer
	}
}
