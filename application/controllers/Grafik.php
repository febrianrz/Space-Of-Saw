<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik extends CI_Controller {


	public function index()
	{
		$this->load->view('admin/vheader');
		$this->load->view('admin/vmenu');
		$this->load->view('cobagrafik');
		$this->load->view('admin/vfooter');
	}
}
