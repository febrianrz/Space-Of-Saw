<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Muploadfile extends CI_Model 
{

  public function view()
  {
    return $this->db->get('transaksi')->result(); // Tampilkan semua data yang ada di tabel siswa
  }
  
  // Fungsi untuk melakukan proses upload file
  public function upload_file($filename)
  {
    $this->load->library('upload'); // Load librari upload
    
    $config['upload_path'] = './upload/datatransaksi/'; //menentukan folder untuk menyimpan file yang akan diupload.
    $config['allowed_types'] = 'xlsx';    // memvalidasi file tipe apa saja yang boleh diupload.
    $config['max_size']  = '2048';        // menentukan maksimal ukuran file yang boleh diupload dalam satuan Kb.
    $config['overwrite'] = true;          // me-replace file apabila di dalam folder (tempat menyimpan file uploadnya) sudah ada file dengan nama tersebut.
    $config['file_name'] = $filename;      //menentukan dan me-rename file yang akan diupload sesuai keinginan.
  
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
  
  // Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
  public function insert_multiple($data)
  {
    $this->db->insert_batch('siswa', $data);
  }

}