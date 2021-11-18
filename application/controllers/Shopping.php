<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shopping extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('M_cart');
	}

	public function index()
	{
		$kategori = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['produk'] = $this->M_cart->get_produk_kategori($kategori);
		$data['kategori'] = $this->M_cart->get_kategori_all();
		$this->load->view('themes/header', $data);
		$this->load->view('shopping/list_produk', $data);
		$this->load->view('themes/footer');
	}
	public function tampil_cart()
	{
		$data['kategori'] = $this->M_cart->get_kategori_all();
		$this->load->view('themes/header', $data);
		$this->load->view('shopping/tampil_cart', $data);
		$this->load->view('themes/footer');
	}


	public function detail_produk()
	{
		$id = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['kategori'] = $this->M_cart->get_kategori_all();
		$data['detail'] = $this->M_cart->get_produk_id($id)->row_array();
		$this->load->view('themes/header', $data);
		$this->load->view('shopping/detail_produk', $data);
		$this->load->view('themes/footer');
	}


	function tambah()
	{
		$data_produk = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('nama'),
			'price' => $this->input->post('harga'),
			'gambar' => $this->input->post('gambar'),
			'qty' => $this->input->post('qty')
		);
		$this->cart->insert($data_produk);
		redirect('shopping');
	}

	function hapus($rowid)
	{
		if ($rowid == "all") {
			$this->cart->destroy();
		} else {
			$data = array(
				'rowid' => $rowid,
				'qty' => 0
			);
			$this->cart->update($data);
		}
		redirect('shopping/tampil_cart');
	}

	function ubah_cart()
	{
		$cart_info = $_POST['cart'];
		foreach ($cart_info as $id => $cart) {
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$gambar = $cart['gambar'];
			$amount = $price * $cart['qty'];
			$qty = $cart['qty'];
			$data = array(
				'rowid' => $rowid,
				'price' => $price,
				'gambar' => $gambar,
				'amount' => $amount,
				'qty' => $qty
			);
			$this->cart->update($data);
		}
		redirect('shopping/tampil_cart');
	}
}
