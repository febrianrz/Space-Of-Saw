<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	function  __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->database();
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->model('Mproduk');		
	}

	public function index()
	{
		$this->load->view('admin/vheader');
		$this->load->view('admin/vmenu');
		$data['produk']= $this->Mproduk->Mlihat_produk();
		$this->load->view('admin/vproduk', $data);

	}

	public function hapus_produk($id_produk)
	{
		// $this->Mproduk->Mhapus_produk($id_produk);
		// redirect('Produk/index');		
		if($this->Mproduk->Mhapus_produk($id_produk) == null)
		{
			$this->session->set_flashdata('pesan',
				'<div class="alert alert-danger role="alert">
				<p>Data Kue Gagal Dihapus</p>
				</div>
				');
			redirect('Produk/index');
		}

		else

		{
			$this->session->set_flashdata('pesan',
				'<div class="alert alert-success" role="alert">
				<p>Data Kue Berhasil Dihapus</p>
				</div>
				');
			redirect('Produk/index');
		}
	}

	public function formtambah_produk()
	{
		$this->load->view('admin/vheader');
		$this->load->view('admin/vmenu');
		$this->load->view('admin/vtambah_produk');
	}

	public function tambah_produk()
	{
		$id_produk		= $this->input->post('id_produk');
		$nama_produk 	= $this->input->post('nama_produk');
		// $harga_produk 	= $this->input->post('harga_produk');

		$data = array
		(
			'id_produk' 	=> $id_produk,
			'nama_produk' 	=> $nama_produk,
			// 'harga_produk'	=> $harga_produk
		);

		// $this->Mproduk->Mtambah_produk($data);
		// $this->session->set_flashdata('pesan','Data Kue Berhasil Ditambahkan.');
		// redirect('Produk/index');
		$tambah = $this->Mproduk->Mtambah_produk($data);

		if($tambah == null)
		{
			$this->session->set_flashdata('pesan',
				'<div class="alert alert-danger role="alert">
				<p>Data Kue Gagal Ditambahkan</p>
				</div>
				');
			redirect('Produk/index');
		}

		else

		{
			$this->session->set_flashdata('pesan',
				'<div class="alert alert-success" role="alert">
				<p>Data Kue Berhasil Ditambahkan</p>
				</div>
				');
			redirect('Produk/index');
		}
	}

	public function ubah_produk()
	{
		$this->load->view('admin/vheader');
		$this->load->view('admin/vmenu');
		$id_produk				= $this->uri->segment(3);
		$data['ubah_produk'] 	= $this->Mproduk->Mubah_produk($id_produk);
		$this->load->view('admin/vubah_produk',$data);
	}

	public function simpan_produk() //MENYIMPAN DATA ADMIN YANG SUDAH DIUBAH
	{
		$id_produk		= $this->input->post('id_produk');
		$nama_produk	= $this->input->post('nama_produk');
		// $harga_produk	= $this->input->post('harga_produk');


		$data = array
		(
			// 'id_produk' 	=> $id_produk,
			'nama_produk' 	=> $nama_produk
			// 'harga_produk'	=> $harga_produk
		);

		// $this->Mproduk->Msimpan_produk($id_produk,$data)
		// $this->session->set_flashdata('pesan','Data Kue Berhasil Diubah.');

		$simpan = $this->Mproduk->Msimpan_produk($id_produk,$data);
		if ($simpan)
		{
			$this->session->set_flashdata('pesan',
				'<div class="alert alert-danger role="alert">
				<p>Perubahan Gagal Disimpan</p>
				</div>
				');
			redirect('Produk/index');
		}

		else

		{
			$this->session->set_flashdata('pesan',
				'<div class="alert alert-success" role="alert">
				<p>Perubahan Berhasil Disimpan</p>
				</div>
				');
			redirect('Produk/index');
		}



		// if($this->Mproduk->Msimpan_produk($id_produk,$data) == null)
		// {
		// 	$this->session->set_flashdata('pesan',
		// 		'<div class="alert alert-danger role="alert">
		// 		<p>Perubahan Gagal Disimpan</p>
		// 		</div>
		// 		');
		// 	redirect('Produk/index');
		// }

		// else

		// {
		// 	$this->session->set_flashdata('pesan',
		// 		'<div class="alert alert-success" role="alert">
		// 		<p>Perubahan Berhasil Disimpan</p>
		// 		</div>
		// 		');
		// 	redirect('Produk/index');
		// }

	}
}
