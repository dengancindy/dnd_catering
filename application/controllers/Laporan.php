<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_laporan');
	}
	public function index()
	{
		$data = array(
			'laporan' => $this->M_laporan->get_all_data()
		);
		$this->load->view('admin/layout/sidebar');
		$this->load->view('admin/layout/header');
		$this->load->view('admin/laporan',$data);
		$this->load->view('admin/layout/footer');
	}
}
