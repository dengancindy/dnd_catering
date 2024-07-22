<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('M_belanja');
		$this->load->model('M_halaman_utama');
	}
	public function index()
	{
		$data = array(
			'title' => "halaman Belanja",
			'kategori_item' => $this->M_halaman_utama->get_data_kategori()
		);
		$this->load->view('template_pembeli/header',$data);
		$this->load->view('template_pembeli/navbar',$data);
		$this->load->view('pembeli/halaman_belanja');
		$this->load->view('template_pembeli/footer');
	}

	public function process() 
	{
		 // Load the Midtrans library
    require_once dirname(__FILE__) . '/../../midtrans/Midtrans.php';

    // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = 'SB-Mid-server-T-zCEThxbTCK-2y1Ep2gm47P';
    \Midtrans\Config::$isProduction = false;
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

    $alamat = $this->input->post('alamatPengiriman');
	$gross_amount = $this->input->post('totalHarga');


    // Calculate total price
    $total_price = 0;
    foreach($this->cart->contents() as $item) {
        $total_price += $item['price'] * $item['qty'];
    }

    // Prepare transaction data
   $data = array(
	'alamatPengiriman' => $this->input->post('alamatPengiriman'),
	'tglPesan' => $this->input->post('tglPesan'),
	'tglPengiriman' => $this->input->post('tglPengiriman'),
	'jam' => $this->input->post('jam'),
	'totalHarga' => $this->input->post('totalHarga'),
	'idPembeli' => $this->session->userdata('idPembeli'),
	'idPaketMenu' => $this->input->post('idPaketMenu')
   );
   $id_pesanan = $this->M_belanja->simpan_pesanan($data);

	$i = 1;

    foreach($this->cart->contents() as $item) {
        $data_rincian = array(
           'idPesanan' => $id_pesanan,
		   'idPaketMenu' => $item['id'],
		   'quantity' => $item['qty'],
		   'subtotal' => $item['price'],
        );
        $this->M_belanja->simpan_rincian_pesanan($data_rincian);
    }

    // Prepare parameters for Midtrans Snap API
    $params = array(
        'transaction_details' => array(
            'order_id' => $id_pesanan,
            'gross_amount' => $gross_amount,
        ),
        'customer_details' => array(
            'first_name' => "Zelina",
            // 'first_name' => $this->session->userdata('nama'),
            'email' => 'zelinacindy40@gmail.com',
            'phone' => '08111222333',
            'billing_address' => array(
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'address' => $alamat,
                // 'city' => $kota,
                'postal_code' => '12345',
                'phone' => '08111222333',
                'country_code' => 'IDN'
            ),
            'shipping_address' => array(
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'address' => $alamat,
                // 'city' => $kota,
                'postal_code' => '12345',
                'phone' => '08111222333',
                'country_code' => 'IDN'
            ),
        ),
        'item_details' => array()
    );

    // Add each cart item to item_details
    foreach($this->cart->contents() as $item) {
        $params['item_details'][] = array(
            'id' => $item['id'],
            'price' => $item['price'],
            'quantity' => $item['qty'],
            'name' => $item['name']
        );
    }

    // Get the Snap Redirect URL
    $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;

	// Destroy the cart
    $this->cart->destroy();

    // Redirect to Midtrans payment page
    redirect($paymentUrl);
	}

	public function delete_cart($rowid)
	{
		$this->cart->update(array(
			'rowid' => $rowid,
			'qty' => 0
		));
		redirect($_SERVER['HTTP_REFERER']);
	}

	
}

?>
