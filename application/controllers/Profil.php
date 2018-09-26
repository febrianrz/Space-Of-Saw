<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

	function  __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->model('Mprofil');		
	}

	public function index()
	{
		$this->load->view('admin/vheader');
		$this->load->view('admin/vmenu');
		$data['profil']= $this->Mprofil->Mlihat_profil();
		$this->load->view('admin/vprofil', $data);
	}

	public function ubah_profil()
	{

		$query = $this->uri->segment(3);
		$id_admin=1;
		$this->load->view('admin/vheader');
		$this->load->view('admin/vmenu');
		$data['ubah_profil'] = $this->Mprofil->Mubah_profil($id_admin);
		$this->load->view('admin/vubah_profil', $data);
	}

	public function simpan_profil($id_admin)
	{
		$config['upload_path']          = './upload/';
	    $config['allowed_types']        = 'gif|jpg|png';
	    $config['max_size']             = 5000;

	    $this->load->library('upload', $config);
	    $this->upload->initialize($config);


		$nama		= $this->input->post('nama');
		$deskripsi	= $this->input->post('deskripsi');
		$alamat		= $this->input->post('alamat');
		$email		= $this->input->post('email');
		$telepon	= $this->input->post('telepon');
		$username	= $this->input->post('username');
		$password	= $this->input->post('password');
		
		if($this->upload->do_upload('gambar_admin')) 
		{
	    	$dataf = array('upload_data' => $this->upload->data());	
		

			$data = array
			(
				'nama'				=> $nama,
				'deskripsi'			=> $deskripsi,
				'alamat'			=> $alamat,
				'email'				=> $email,
				'telepon'			=> $telepon,
				'username'			=> $username,
				'password'			=> $password,
				'gambar_admin' 		=> 'upload/'.$dataf['upload_data']['file_name'],
			);
		}

		else

		{
			$data = array
			(
				'nama'				=> $nama,
				'deskripsi'			=> $deskripsi,
				'alamat'			=> $alamat,
				'email'				=> $email,
				'telepon'			=> $telepon,
				'username'			=> $username,
				'password'			=> $password,
				'gambar_admin' 		=> 'upload/'.$dataf['upload_data']['file_name'],
			);
		}

		$this->Mprofil->Msimpan_profil($id_admin,$data);
	}

}
