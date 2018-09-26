<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
	private $filename = "Data_Transaksi"; // Kita tentukan nama filenya

	public function  __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->database();
		$this->load->library('pagination');
		$this->load->helper('url','date');
		$this->load->model('Mtransaksi');		
	}

	public function index()
	{
		$this->load->view('admin/vheader');
		$this->load->view('admin/vmenu');
		$data['transaksi']= $this->Mtransaksi->Mlihat_transaksi();
		$this->load->view('admin/vtransaksi', $data);

	}

	// public function hapus_transaksi1($id)
	// {
	// 	$this->Mtransaksi->Mhapus_transaksi($id);
	// 	redirect('Transaksi/index');
	// }
	
	public function hapus_transaksi($id)
	{
		$where = array('id' => $id);
		$ole = $this->Mtransaksi->Mhapus_transaksi($where,'transaksi');
		
		// $this->Mtransaksi->Mhapus_transaksi($where,'transaksi');
		// $this->session->set_flashdata('pesan','Data transaksi berhasil dihapus.');
		// redirect('Transaksi/index');
		if($ole)
		{
			$this->session->set_flashdata('pesan',
				'<div class="alert alert-danger role="alert">
				<p>Data Penjualan Gagal Dihapus</p>
				</div>
				');
			redirect('Transaksi/index');
		}

		else

		{
			$this->session->set_flashdata('pesan',
				'<div class="alert alert-success" role="alert">
				<p>Data Penjualan Berhasil Dihapus</p>
				</div>
				');
			redirect('Transaksi/index');
		}
	}

	public function formtambah_transaksi()
	{
		$this->load->view('admin/vheader');
		$this->load->view('admin/vmenu');
		$this->load->view('admin/vtambah_transaksi');
	}

	public function form()
	{
	    $data = array(); // Buat variabel $data sebagai array
	    
	    if(isset($_POST['preview'])) // Jika user menekan tombol Preview pada form
	    { 

		    // lakukan upload file dengan memanggil function upload yang ada di SiswaModel.php
		    $upload = $this->Mtransaksi->Mupload_file($this->filename);
		    // return $upload;
		     
		    if($upload['result'] == "success") // Jika proses upload sukses
		    { 
		    	// Load plugin PHPExcel nya
		    	include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		        
		        $excelreader 	= new PHPExcel_Reader_Excel2007();
		        $loadexcel 		= $excelreader->load('upload/datatransaksi/'.$this->filename.'.xlsx'); // Load file yang tadi diupload ke folder excel
		        $sheet 			= $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
		        
		        // Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
		        // Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
		        $data['sheet'] = $sheet; 
		    }

		    else

		    { // Jika proses upload gagal
		        $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
		    }
		}
    	
    	$this->load->view('admin/vheader');
    	$this->load->view('admin/vmenu');
		$this->load->view('admin/vtambah_transaksi_excel', $data);
  	}
  
  	public function import()
  	{
	    // Load plugin PHPExcel nya
	    include APPPATH.'third_party/PHPExcel/PHPExcel.php';
	    
	    $excelreader	= new PHPExcel_Reader_Excel2007();
	    $loadexcel	 	= $excelreader->load('upload/datatransaksi/'.$this->filename.'.xlsx'); // Load file yang telah diupload ke folder excel
	    $sheet 			= $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
	    
	    // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
	    $data = [];
	    
	    $numrow = 1;
	    foreach($sheet as $row)
	    {
	      // Cek $numrow apakah lebih dari 1
	      // Artinya karena baris pertama adalah nama-nama kolom
	      // Jadi dilewat saja, tidak usah diimport
	    	if($numrow > 1)
	    	{
		        // Kita push (add) array data ke variabel data
		        array_push($data, 
		        	[
		         	'id'					=>$row['A'], // Insert data nis dari kolom A di excel
		        	'id_produk'				=>$row['B'], // Insert data nama dari kolom B di excel
		          	'tanggal_transaksi'		=>$row['C'], // Insert data jenis kelamin dari kolom C di excel
		          	'jumlah_penjualan'		=>$row['D'], // Insert data alamat dari kolom D di excel
		          	'stock'					=>$row['E'],
		        	]
		    	);
	      	}
	      
	      $numrow++; // Tambah 1 setiap kali looping
	    }
	    // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
	    // $this->Mtransaksi->Mupload_file_multiple($data);
	    // $this->session->set_flashdata('pesan','Data transaksi berhasil dihapus.');
	    // redirect("Transaksi"); // Redirect ke halaman awal (ke controller siswa fungsi index)

	    $imp = $this->Mtransaksi->Mupload_file_multiple($data);

	    if($imp)
		{
			$this->session->set_flashdata('pesan',
				'<div class="alert alert-danger role="alert">
				<p>Data Penjualan Gagal Diimport</p>
				</div>
				');
			redirect('Transaksi/index');
		}

		else

		{
			$this->session->set_flashdata('pesan',
				'<div class="alert alert-success" role="alert">
				<p>Data Penjualan Berhasil Diimport</p>
				</div>
				');
			redirect('Transaksi/index');
		}

	}

	public function ubah_transaksi()
	{
		$this->load->view('admin/vheader');
		$this->load->view('admin/vmenu');
		$id 					= $this->uri->segment(3);
		$data['ubah_transaksi'] = $this->Mtransaksi->Mubah_transaksi($id);
		$this->load->view('admin/vubah_transaksi',$data);
	}

	public function simpan_transaksi() //MENYIMPAN DATA ADMIN YANG SUDAH DIUBAH
	{
		$id 					= $this->input->post('id');
		$tanggal_transaksi		= $this->input->post('tanggal_transaksi');
		$kode_transaksi			= $this->input->post('kode_transaksi');
		$produk_beli			= $this->input->post('produk_beli');
		$jumlah					= $this->input->post('jumlah');


		$data = array
		(
			'tanggal_transaksi' 	=> $tanggal_transaksi,
			'kode_transaksi'		=> $kode_transaksi,
			'produk_beli'		 	=> $produk_beli,
			'jumlah'			 	=> $jumlah
		);

		$this->Mtransaksi->Msimpan_transaksi($id,$data);

	}

	// public function formtambah_transaksi_excel()
	// {
	// 	$this->load->view('admin/vheader');
	// 	$this->load->view('admin/vmenu');
	// 	$this->load->view('admin/vtambah_transaksi_excel');
	// }


}
