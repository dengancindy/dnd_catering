<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HalamanUtama extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_halaman_utama');
	}
	public function index()
	{
		$data = array(
			'title' => "Halaman Utama",
			'paket' => $this->M_halaman_utama->get_all_with_category(),
			'kategori_item' => $this->M_halaman_utama->get_data_kategori()
		);
		$this->load->view('template_pembeli/header', $data);
		$this->load->view('template_pembeli/navbar', $data);
		$this->load->view('pembeli/halaman_utama', $data);
		$this->load->view('template_pembeli/footer', $data);
	}

public function add_to_cart()
{
    $id = $this->input->post('id');
    $qty = 20; // Default quantity to add
    $price = $this->input->post('price');
    $name = $this->input->post('name');

    // Check if the item is already in the cart
    $cart = $this->cart->contents();
    $found = false;
    
    foreach ($cart as $item) {
        if ($item['id'] == $id) {
            // Item found, update the quantity
            $found = true;
            $qty = $item['qty'] + 20; // Increase quantity by 20
            $this->cart->update(array(
                'rowid' => $item['rowid'],
                'qty' => $qty
            ));
            break;
        }
    }

    if (!$found) {
        // Item not found, add it to the cart with initial quantity
        $data = array(
            'id' => $id,
            'qty' => $qty,
            'price' => $price,
            'name' => $name
        );
        $this->cart->insert($data);
    }

    $this->session->set_flashdata('pesan', 'Menu Berhasil Ditambahkan');
    redirect($_SERVER['HTTP_REFERER']);
}


	public function lihat_keranjang () 
	{
		$data = array (
			'title' => "Halaman Keranjang",
			'kategori_item' => $this->M_halaman_utama->get_data_kategori()
		);
		$this->load->view('template_pembeli/header', $data);
		$this->load->view('template_pembeli/navbar', $data);
		$this->load->view('pembeli/halaman_keranjang', $data);
		$this->load->view('template_pembeli/footer', $data);
	}

	public function kategori($idKategori) {
		$data = array(
			'title' => 'Halaman Kategori',
			'kategori' => $this->M_halaman_utama->get_kategori($idKategori),
			'kategori_item' => $this->M_halaman_utama->get_data_kategori()
		);
		$this->load->view('template_pembeli/header', $data);
		$this->load->view('template_pembeli/navbar', $data);
		$this->load->view('pembeli/halaman_kategori', $data);
		$this->load->view('template_pembeli/footer', $data);
	}
	public function contact(){
		$data = array(
            'title' => 'Contact Us',
            'kategori_item' => $this->M_halaman_utama->get_data_kategori() 
        );
        $this->load->view('template_pembeli/header', $data);
        $this->load->view('template_pembeli/navbar', $data);
		$this->load->view('pembeli/contact', $data);
        $this->load->view('template_pembeli/footer', $data);
    }
	
}
