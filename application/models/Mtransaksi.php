<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mtransaksi extends CI_Model
{

	function __construct()
	{
        parent::__construct();
	}


	public function Mlihat_transaksi() // MENAMPILKAN TABEL TRANSAKSI
	{
		$transaksi = $this->db->query("SELECT * FROM transaksi, produk WHERE produk.id_produk = transaksi.id_produk order by tanggal_transaksi ASC, id ASC")->result();
		return $transaksi; //Mengeluarkan hasil dari sebuah fungsi
	}

	public function Mhapus_transaksi($where,$table) //MENGHAPUS RECORD TRANSAKSI
	{
		
		$this->db->where($where);
		$this->db->delete($table);
		//$hapus_transaksi = $this->db->query("DELETE FROM transaksi WHERE id = $id ");
		//return $hapus_transaksi;
		// $this->db->select('*');
		// $this->db->from('transaksi');
		// $this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
		// $this->db->where('transaksi.id_produk', $id);
		// $this->db->delete('transaksi');
		// $hapus_transaksi = $this->db->get();
		// return $hapus_transaksi;
	}


	public function Mtambah_transaksi($data) //MENAMBAHKAN RECORD TRANSAKSI
	{
		$tambah_transaksi = $this->db->insert('transaksi',$data);
		return $tambah_transaksi;
	}

	public function Mupload_file($filename)
	{
		$this->load->library('upload'); // Load librari upload

		// menentukan folder untuk menyimpan file yang akan diupload.
		$config['upload_path'] 		= './upload/datatransaksi/'; 

		// memvalidasi file tipe apa saja yang boleh diupload.
		$config['allowed_types'] 	= 'xlsx|csv|xls';

		// menentukan maksimal ukuran file yang boleh diupload dalam satuan Kb.					
    	$config['max_size']  		= '2048';

    	// me-replace file apabila di dalam folder (tempat menyimpan file uploadnya) sudah ada file dengan nama tersebut.
    	$config['overwrite'] 		= true;

    	//menentukan dan me-rename file yang akan diupload sesuai keinginan.
   		$config['file_name'] 		= $filename; 

   		$this->upload->initialize($config); // Load konfigurasi uploadnya
	   	if($this->upload->do_upload('file'))  // Lakukan upload dan Cek jika proses upload berhasil
	    {
	      // Jika berhasil :
	      $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
	      return $return;
	    }

	    else

	    {
	      // Jika gagal :
	      $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
	      return $return;
	    }
	}

	public function Mupload_file_multiple($data)
	{
		$this->db->insert_batch('transaksi', $data);
	}

	public function Mubah_transaksi($id) //MENAMPILKAN FORM TRANSAKSI YANG AKAN DIUBAH
	{
		$ubah_transaksi = $this->db->query("SELECT * FROM transaksi where id= $id")->result();
		return $ubah_transaksi;
	}

	public function Msimpan_transaksi($id,$data) //MENYIMPAN TRANSAKSI YANG TELAH DIUBAH
	{
		
		$this->db->where('id', $id);
		$berhasilsimpan = $this->db->update('transaksi', $data);

		if($berhasilsimpan)
		{
			redirect('Transaksi/index/'.$id.'?update=1','refresh');
		}
		else
		{
			redirect('Transaksi/index/'.$id.'?update=2','refresh');
		}
	}
}
