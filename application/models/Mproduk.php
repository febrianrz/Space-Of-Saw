<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mproduk extends CI_Model
{

	function __construct()
	{
        parent::__construct();
	}


	public function Mlihat_produk() // MENAMPILKAN TABEL PRODUK
	{
		$produk = $this->db->query("SELECT * FROM produk")->result();
		return $produk;
	}

	public function Mhapus_produk($id_produk) //MENGHAPUS RECORD PRODUK
	{
		$hapus_produk = $this->db->query("DELETE FROM produk WHERE id_produk = '$id_produk'");
		return $hapus_produk;
	}

	public function Mtambah_produk($data) //MENAMBAHKAN RECORD PRODUK
	{
		$tambah_produk = $this->db->insert('produk',$data);
		return $tambah_produk;
	}

	public function Mubah_produk($id_produk) //MENAMPILKAN FORM PRODUK YANG DIUBAH
	{
		$ubah_produk = $this->db->query("SELECT * FROM produk where id_produk='$id_produk'")->result();
		return $ubah_produk;
	}

	public function Msimpan_produk($id_produk,$data) //MENYIMPAN PRODUK YANG TELAH DIUBAH
	{
		
		$this->db->where('id_produk', $id_produk);
		$this->db->update('produk', $data);

		// if($berhasilsimpan)
		// {
		// 	redirect('Produk/index/'.$id_produk.'?update=1','refresh');
		// }
		// else
		// {
		// 	redirect('Produk/index/'.$id_produk.'?update=2','refresh');
		// }
	}
}
