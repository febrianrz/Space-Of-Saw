<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mramal extends CI_Model
{
	public function Mdatakue($tgl_1,$tgl_2) //data berdasarkan ID kue
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
		$this->db->where('transaksi.tanggal_transaksi >=', $tgl_1);
		$this->db->where('transaksi.tanggal_transaksi <=', $tgl_2);
		// $this->db->where('transaksi.id_produk', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function GetSumTableTransaksi($tgl_1,$tgl_2) //nyari banyaknya periode
	{
		$this->db->select('count(*)');
		$this->db->from('transaksi');
		$this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
		$this->db->where('transaksi.tanggal_transaksi >=', $tgl_1);
		$this->db->where('transaksi.tanggal_transaksi <=', $tgl_2);
		// $this->db->where('transaksi.id_produk', $id);
		$query = $this->db->get();
		return $query->row();
	}

	//backup
	// public function Mdatakue($id,$tgl_1,$tgl_2) //data berdasarkan ID kue
	// {
	// 	$this->db->select('*');
	// 	$this->db->from('transaksi');
	// 	$this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
	// 	$this->db->where('transaksi.tanggal_transaksi >=', $tgl_1);
	// 	$this->db->where('transaksi.tanggal_transaksi <=', $tgl_2);
	// 	$this->db->where('transaksi.id_produk', $id);
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }

	// public function GetSumTableTransaksi($id,$tgl_1,$tgl_2) //nyari banyaknya periode
	// {
	// 	$this->db->select('count(*)');
	// 	$this->db->from('transaksi');
	// 	$this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
	// 	$this->db->where('transaksi.tanggal_transaksi >=', $tgl_1);
	// 	$this->db->where('transaksi.tanggal_transaksi <=', $tgl_2);
	// 	$this->db->where('transaksi.id_produk', $id);
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }
	// end backup

	// public function Tampilkan($id)
	// {
	// 	$this->db->select('count(*)');
	// 	$this->db->from('transaksi');
	// 	$this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
	// 	$this->db->where('transaksi.id_produk', $id);
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }
}
