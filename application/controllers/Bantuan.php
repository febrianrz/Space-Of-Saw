<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bantuan extends CI_Controller {


	public function index()
	{
		// $this->load->view('vheader');
		// $this->load->view('vmenu');
		// $this->load->view('vbantuan');
		$this->load->view('admin/vheader');
		$this->load->view('admin/vmenu');
		$this->load->view('admin/vbantuan');
	}
}
