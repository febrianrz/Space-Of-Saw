<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcoba extends CI_Model
{

	function __construct()
	{
        parent::__construct();
	}


	public function misah()
	{
		// $lihat_transaksi = $this->db->query("SELECT jumlah FROM transaksi")->result();
		// return $lihat_transaksi;


		// $lihat_transaksi = $this->db->query("SELECT jumlah FROM transaksi");

		// $ya = query($lihat_transaksi);
		$lihat_transaksi = "Kamu Cantik";
		$mimisahkan = array(explode(",",$lihat_transaksi));
		return $mimisahkan;

	}


}