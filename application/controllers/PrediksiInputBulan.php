<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrediksiInputBulan extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->database();
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->model('Mprediksi');
	}

	public function index()
	{
		$c = $this->Mprediksi->Mambilbulantahun(); 	// memanggil method getAll
	    $data['c'] = $c; 							// menampung di variable $data
	    $this->load->view('admin/vheader');
		$this->load->view('admin/vmenu');
	    $this->load->view('admin/vprediksi',$data); // passing $data ke view article
	}

	public function tampilkan()
	{
		$this->load->view('admin/vheader');
		$this->load->view('admin/vmenu');
		$data['tampilkan']= $this->Mprediksi->Mtampilkan();
		$this->load->view('admin/tampilkan', $data);
	}

	// public function prediksibulan()
	// {
		
	// 	$bulan_input 	= $this->input->post('bulan');
	// 	$data 			= $this->Mprediksi->Minputbulan($bulan_input);

	// 	$row = array();
	// 	foreach ($data as $res)
	// 	{
	// 		$row['nama_produk'] 		= $res['nama_produk'];
	// 		$row['tanggal_transaksi'] 	= $res['tanggal_transaksi'];
	// 		$row['jumlah_penjualan'] 	= $res['jumlah_penjualan'];
	// 		$row['stock'] 				= $res['stock'];
	// 		$props1[] = $row;
	// 	}

	// 	// mencari jumlah periode
	// 	$sp = $this->Mprediksi->Mbanyak($bulan_input);
	// 	foreach ($sp as $s)
	// 	{
 //        	$sumperiode = $s;
 //        }

	// 	echo $sumperiode;
	// }

	// public function y()
	// {
	// 	$this->load->view('admin/vheader');
	// 	$this->load->view('admin/vmenu');
	// 	$data['query']= $this->Mprediksi->nasgor();
	// 	$this->load->view('admin/vprediksi_2', $data);

	// }


}