<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cobatab extends CI_Controller
{

	function  __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->library('pagination');
		$this->load->helper('url');
			
	}

	public function index()
	{
		$this->load->view('admin/vheader');
		$this->load->view('admin/vmenu');
		$this->load->view('admin/vtab');

	}

}