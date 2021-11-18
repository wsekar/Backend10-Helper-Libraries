<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('M_cart');
	}
	public function index()
	{
		$data['produk'] = $this->M_cart->get_produk_all();
		$data['kategori'] = $this->M_cart->get_kategori_all();
		$this->load->view('themes/header', $data);
		$this->load->view('shopping/list_produk', $data);
		$this->load->view('themes/footer');
	}
}
