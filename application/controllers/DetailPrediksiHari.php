<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailPrediksiHari extends CI_Controller
{

	public function  __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->database();
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->model('Mdetailhari');
	}

	public function index()
	{
		$data['proses'] = $this->Mdetailhari->proses_tampil();
		$data['content'] = "admin/cobadetail";
		$this->load->view('admin/cobadetail', $data);
	}
 
	public function detail($id)
	{
		$this->load->model('Mdetailhari');
 
		$detail = $this->Mdetailhari->get_detail($id);
		$data['detail'] = $detail;
		$this->load->view('admin/tampildetail', $data);
	}

} //SELESAI CONTROLLER