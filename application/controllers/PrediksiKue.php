<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrediksiKue extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->database();
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->model('Mprediksi');
	}



	public function index_hari($id)
	{

		$penjualan 		= [];
		$pre 		 	= [];
		$tgl_pre 		 	= [];
		//***** Menampilkan Data Kue A dengan ID = 1 *****
		$data = $this->Mprediksi->Mdatakue($id);
		foreach ($data as $k)
		{
			$nama_produk = $k['nama_produk'];
		}

		//***** Mencari Jumlah Periode Untuk Kue A *****
		$jp = $this->Mprediksi->Mbanyak_periode($id);
		foreach ($jp as $s) 
		{
        	$jumlah_periode = $s;

        }

        //***** Membuat Nama Variabel Dengan Nilai Awal = 0 *****
        $jumlah_x 				= 0;
        $jumlah_xkuadrat 		= 0;
        $jumlah_y 				= 0;
        $jumlah_xy 				= 0;
        $jumlah_error 			= 0;
        $jumlah_galatrelatif	= 0;
        $jumlah_error_kuadrat	= 0;
	    $galatrelatif 			= 0;



        //***** Perulangan Untuk Mendapatkan Formula Y=A+BX *****
		for ($i = 0; $i < $jumlah_periode; $i++)
		{
			$x 					= $i+1; 		// Membuat Periode Waktu
			$xkuadrat 			= $x*$x; 		// Membuat X Kuadrat
			$y 					= $data[$i]['jumlah_penjualan']; //Memanggil Data Penjualan Sebagai Y
			$xy 				= $x * $y; 		//membuat nilai periode dikali nilai (XY)

			$jumlah_x 			+= $x; 			// jumlah x
			$jumlah_xkuadrat 	+= $xkuadrat; 	// jumlah x kuadrat
			$jumlah_y 			+= $y; 			// jumlah y
			$jumlah_xy			+= $xy; 		// jumlah xy
		}


		//***** MENCARI NILAI RATA-RATA X DAN RATA-RATA Y *****		
		$rata_x = $this->rumus->Meanx($jumlah_periode, $jumlah_x);
		$rata_y = $this->rumus->Meany($jumlah_periode, $jumlah_y);


		//***** MENCARI NILAI A DAN NILAI B *****	
		$b = round($this->rumus->Carib($jumlah_xy, $jumlah_xkuadrat, $jumlah_periode, $rata_x, $rata_y),2);
		$a = round($this->rumus->Caria($rata_y,$rata_x,$b),2);


		//***** Perulangan Untuk Mencari Hasil Prediksi Per Periode dan Nilai Error *****
		for ($i = 0; $i <$jumlah_periode ; $i++)
		{ 
			// MENCARI NILAI PREDIKSI PER PERIODE
			$x 			= $i + 1;
			$prediksi 	= round($this->rumus->Prediksi($a,$b,$x),2);
			$hari 		= $data[$i]['tanggal_transaksi'];

			
			// MENCARI NILAI ERROR PER PERIODE, RUMUSNYA e = y-y'
			$nilai_penjualan		= $data[$i]['jumlah_penjualan'];
			$error 					= round($nilai_penjualan - $prediksi,2);
			$absolut_error 			= abs($error); // nilai absolut error
			$error_kuadrat			= round($error*$error,2);
			$jumlah_error			+= $absolut_error; // membuat jumlah absolute error
			$jumlah_error_kuadrat	+= $error_kuadrat; // jumlah error kuadrat
			$galatrelatif			= round($absolut_error/$nilai_penjualan,4); // mencari nilai galat relatif
			$jumlah_galatrelatif	+= $galatrelatif;
		

			$row['x'] 						= $x;
			$row['hari']					= $hari;
			$row['nilai_penjualan']			= $nilai_penjualan;
			$row['prediksi']				= $prediksi;
			$row['absolut_error']			= $absolut_error;
			$row['error_kuadrat']			= $error_kuadrat;
			$row['galatrelatif']			= $galatrelatif;
			$menampilkan_hasil[] 			= $row;

		} //SELESAI PERULANGAN MENCARI HASIL PREDIKSI/PERIODE


		// ***** MENAMPILKAN HASIL PREDIKSI/PERIODE *****
		$tampilkan 		="";
		$tampilkan_2 	="";
		$nol			=0;

		foreach ($menampilkan_hasil as $index => $array)
		{
			$tampilkan =
			"<tr>
				<td>".$menampilkan_hasil[$nol]['x']."</td>
				<td>".tgl_indo($menampilkan_hasil[$nol]['hari'])."</td>
				<td>".$menampilkan_hasil[$nol]['nilai_penjualan']."</td>
				<td>".$menampilkan_hasil[$nol]['prediksi']."</td>
				<td>".$menampilkan_hasil[$nol]['absolut_error']."</td>
				<td>".$menampilkan_hasil[$nol]['error_kuadrat']."</td>
				<td>".$menampilkan_hasil[$nol]['galatrelatif']."</td>
			</tr>";
			

			// array_push($nama_produk);
			array_push($penjualan,$menampilkan_hasil[$nol]['nilai_penjualan']);
			array_push($tgl_pre,tgl_indo($menampilkan_hasil[$nol]['hari']));

			array_push($pre,$menampilkan_hasil[$nol]['prediksi']);


			$nol++;
			$tampilkan_2 = $tampilkan_2.$tampilkan;
		}


		$newperiode = $i + (1);
		$newtanggal	= $hari;
		$nambah		= 1;


		for ($z = $i; $z < $newperiode; $z++)
		{ 
			$x  				= $z+1;
			$jml_tgl 			= date('Y-m-d',strtotime('+'.$nambah.'days', strtotime($newtanggal)));
			$prediksi 			= $this->rumus->Prediksi($a,$b,$x);
			$rata_galatrelatif 	= $jumlah_galatrelatif/$jumlah_periode*100;
		
			// $row['tambah'] 					= $tambah;
			$row['x']						= $x;
			$row['newtanggal']				= $jml_tgl;
			$row['prediksi']				= $prediksi;
			$row['rata_galatrelatif']		= $rata_galatrelatif;
			$update_prediksi[]				= $row;

			$tampilkan 		="";
			$nol			=0;
			$nambah++;
		}
		
		
		$data['nama_kue'] = $nama_produk;
		$data['tabelprediksi_nagasari'] = $tampilkan_2;
		$data['j_prediksi']=$a." + ".$b." x "." t ";


		$data['periode_berikutnya'] 	= $x;
		$data['tgl_berikutnya'] 		= tgl_indo($jml_tgl);
		$data['prediksi_berikutnya'] 	= $prediksi;


		$data['graf_pen']				= $penjualan;
		$data['graf_pre']				= $pre;
		$data['graf_tgl']				= $tgl_pre;



		// $data['periode_berikutnya'] = $x;

		$this->load->view('admin/vheader');
		$this->load->view('admin/vmenu');
		$this->load->view('admin/prediksi_perkue/vprediksi_nagasari',$data);


		//***** MENGHITUNG RATA-RATA GALAT RELATIF *****
		$rata_galatrelatif = $jumlah_galatrelatif/$jumlah_periode;

	} // SELESAI PREDIKSI NAGASARI









	public function index_minggu($id)
	{
		//***** Menampilkan Data Kue A dengan ID = 1 *****
		$data = $this->Mprediksi->Mdatakue($id);
		foreach ($data as $k)
		{
			$nama_produk = $k['nama_produk'];
		}

		//***** Mencari Jumlah Periode Untuk Kue A *****
		$jp = $this->Mprediksi->Mbanyak_periode($id);
		foreach ($jp as $s) 
		{
        	$jumlah_periode = $s;

        }

        //***** Membuat Nama Variabel Dengan Nilai Awal = 0 *****
        $jumlah_x 				= 0;
        $jumlah_xkuadrat 		= 0;
        $jumlah_y 				= 0;
        $jumlah_xy 				= 0;
        $jumlah_error 			= 0;
        $jumlah_galatrelatif	= 0;
        $jumlah_error_kuadrat	= 0;
	    $galatrelatif 			= 0;



        //***** Perulangan Untuk Mendapatkan Formula Y=A+BX *****
		for ($i = 0; $i < $jumlah_periode; $i++)
		{
			$x 					= $i+1; 		// Membuat Periode Waktu
			$xkuadrat 			= $x*$x; 		// Membuat X Kuadrat
			$y 					= $data[$i]['jumlah_penjualan']; //Memanggil Data Penjualan Sebagai Y
			$xy 				= $x * $y; 		//membuat nilai periode dikali nilai (XY)

			$jumlah_x 			+= $x; 			// jumlah x
			$jumlah_xkuadrat 	+= $xkuadrat; 	// jumlah x kuadrat
			$jumlah_y 			+= $y; 			// jumlah y
			$jumlah_xy			+= $xy; 		// jumlah xy
		}


		//***** MENCARI NILAI RATA-RATA X DAN RATA-RATA Y *****		
		$rata_x = $this->rumus->Meanx($jumlah_periode, $jumlah_x);
		$rata_y = $this->rumus->Meany($jumlah_periode, $jumlah_y);


		//***** MENCARI NILAI A DAN NILAI B *****	
		$b = round($this->rumus->Carib($jumlah_xy, $jumlah_xkuadrat, $jumlah_periode, $rata_x, $rata_y),2);
		$a = round($this->rumus->Caria($rata_y,$rata_x,$b),2);


		//***** Perulangan Untuk Mencari Hasil Prediksi Per Periode dan Nilai Error *****
		for ($i = 0; $i <$jumlah_periode ; $i++)
		{ 
			// MENCARI NILAI PREDIKSI PER PERIODE
			$x 			= $i + 1;
			$prediksi 	= round($this->rumus->Prediksi($a,$b,$x),2);
			$hari 		= $data[$i]['tanggal_transaksi'];

			
			// MENCARI NILAI ERROR PER PERIODE, RUMUSNYA e = y-y'
			$nilai_penjualan		= $data[$i]['jumlah_penjualan'];
			$error 					= round($nilai_penjualan - $prediksi,2);
			$absolut_error 			= abs($error); // nilai absolut error
			$error_kuadrat			= round($error*$error,2);
			$jumlah_error			+= $absolut_error; // membuat jumlah absolute error
			$jumlah_error_kuadrat	+= $error_kuadrat; // jumlah error kuadrat
			$galatrelatif			= round($absolut_error/$nilai_penjualan,4); // mencari nilai galat relatif
			$jumlah_galatrelatif	+= $galatrelatif;
		

			$row['x'] 						= $x;
			$row['hari']					= $hari;
			$row['nilai_penjualan']			= $nilai_penjualan;
			$row['prediksi']				= $prediksi;
			$row['absolut_error']			= $absolut_error;
			$row['error_kuadrat']			= $error_kuadrat;
			$row['galatrelatif']			= $galatrelatif;
			$menampilkan_hasil[] 			= $row;

		} //SELESAI PERULANGAN MENCARI HASIL PREDIKSI/PERIODE


		// ***** MENAMPILKAN HASIL PREDIKSI/PERIODE *****
		$tampilkan 		="";
		$tampilkan_2 	="";
		$nol			=0;

		foreach ($menampilkan_hasil as $index => $array)
		{
			$tampilkan =
			"<tr>
				<td>".$menampilkan_hasil[$nol]['x']."</td>
				<td>".tgl_indo($menampilkan_hasil[$nol]['hari'])."</td>
				<td>".$menampilkan_hasil[$nol]['nilai_penjualan']."</td>
				<td>".$menampilkan_hasil[$nol]['prediksi']."</td>
				<td>".$menampilkan_hasil[$nol]['absolut_error']."</td>
				<td>".$menampilkan_hasil[$nol]['error_kuadrat']."</td>
				<td>".$menampilkan_hasil[$nol]['galatrelatif']."</td>
			</tr>";

			$nol++;
			$tampilkan_2 = $tampilkan_2.$tampilkan;
		}


		$newperiode = $i + (1);
		$newtanggal	= $hari;
		$nambah		= 1;


		for ($z = $i; $z < $newperiode; $z++)
		{ 
			$x  				= $z+1;
			$jml_tgl 			= date('Y-m-d',strtotime('+'.$nambah.'days', strtotime($newtanggal)));
			$prediksi 			= $this->rumus->Prediksi($a,$b,$x);
			$rata_galatrelatif 	= $jumlah_galatrelatif/$jumlah_periode*100;
		
			// $row['tambah'] 					= $tambah;
			$row['x']						= $x;
			$row['newtanggal']				= $jml_tgl;
			$row['prediksi']				= $prediksi;
			$row['rata_galatrelatif']		= $rata_galatrelatif;
			$update_prediksi[]				= $row;

			$tampilkan 		="";
			$nol			=0;
			$nambah++;
		}
		
		
		$data['nama_kue'] = $nama_produk;
		$data['tabelprediksi_nagasari'] = $tampilkan_2;
		$data['j_prediksi']=$a." + ".$b." x "." t ";


		$data['periode_berikutnya'] 	= $x;
		$data['tgl_berikutnya'] 		= tgl_indo($jml_tgl);
		$data['prediksi_berikutnya'] 	= $prediksi;

		// $data['periode_berikutnya'] = $x;

		$this->load->view('admin/vheader');
		$this->load->view('admin/vmenu');
		$this->load->view('admin/prediksi_perkue/vprediksi_nagasari',$data);


		//***** MENGHITUNG RATA-RATA GALAT RELATIF *****
		$rata_galatrelatif = $jumlah_galatrelatif/$jumlah_periode;

	} // SELESAI PREDIKSI NAGASARI








	public function prediksi_sosissolo()
	{
		//***** Menampilkan Data Kue A dengan ID = 1 *****
		$data = $this->Mprediksi->Mdatakue('2');


		//***** Mencari Jumlah Periode Untuk Kue A *****
		$jp = $this->Mprediksi->Mbanyak_periode('2');
		foreach ($jp as $s) 
		{
        	$jumlah_periode = $s;
        }


        //***** Membuat Nama Variabel Dengan Nilai Awal = 0 *****
        $jumlah_x 				= 0;
        $jumlah_xkuadrat 		= 0;
        $jumlah_y 				= 0;
        $jumlah_xy 				= 0;
        $jumlah_error 			= 0;
        $jumlah_galatrelatif	= 0;


        //***** Perulangan Untuk Mendapatkan Formula Y=A+BX *****
		for ($i = 0; $i < $jumlah_periode; $i++)
		{
			$x 					= $i+1; 		// Membuat Periode Waktu
			$xkuadrat 			= $x*$x; 		// Membuat X Kuadrat
			$y 					= $data[$i]['jumlah_penjualan']; //Memanggil Data Penjualan Sebagai Y
			$xy 				= $x * $y; 		//membuat nilai periode dikali nilai (XY)

			$jumlah_x 			+= $x; 			// jumlah x
			$jumlah_xkuadrat 	+= $xkuadrat; 	// jumlah x kuadrat
			$jumlah_y 			+= $y; 			// jumlah y
			$jumlah_xy			+= $xy; 		// jumlah xy
		}


		//***** MENCARI NILAI RATA-RATA X DAN RATA-RATA Y *****		
		$rata_x = $this->rumus->Meanx($jumlah_periode, $jumlah_x);
		$rata_y = $this->rumus->Meany($jumlah_periode, $jumlah_y);


		//***** MENCARI NILAI A DAN NILAI B *****	
		$b = round($this->rumus->Carib($jumlah_xy, $jumlah_xkuadrat, $jumlah_periode, $rata_x, $rata_y),2);
		$a = round($this->rumus->Caria($rata_y,$rata_x,$b),2);


		//***** Perulangan Untuk Mencari Hasil Prediksi Per Periode dan Nilai Error *****
		for ($i = 0; $i <$jumlah_periode ; $i++)
		{ 
			// MENCARI NILAI PREDIKSI PER PERIODE
			$x 			= $i + 1;
			$prediksi 	= round($this->rumus->Prediksi($a,$b,$x),2);
			$hari 		= $data[$i]['tanggal_transaksi'];

			
			// MENCARI NILAI ERROR PER PERIODE, RUMUSNYA e = y-y'
			$nilai_penjualan		= $data[$i]['jumlah_penjualan'];
			$error 					= round($nilai_penjualan - $prediksi,2);
			$absolut_error 			= abs($error); // nilai absolut error
			$jumlah_error			+= $absolut_error; // membuat jumlah absolute error
			$galatrelatif			= $absolut_error/$nilai_penjualan; // mencari nilai galat relatif
			$jumlah_galatrelatif	+= $galatrelatif;

			$row['x'] 						= $x;
			$row['hari']					= $hari;
			$row['nilai_penjualan']			= $nilai_penjualan;
			$row['prediksi']				= $prediksi;
			$row['absolut_error']			= $absolut_error;
			$row['galatrelatif']			= $galatrelatif;
			$menampilkan_hasil[] 			= $row;

		} //SELESAI PERULANGAN MENCARI HASIL PREDIKSI/PERIODE


		// ***** MENAMPILKAN HASIL PREDIKSI/PERIODE *****
			$tampilkan 		="";
			$tampilkan_2 	="";
			$nol			=0;

			foreach ($menampilkan_hasil as $index => $array)
			{
				$tampilkan =
				"<tr>
					<td>".$menampilkan_hasil[$nol]['x']."</td>
					<td>".$menampilkan_hasil[$nol]['hari']."</td>
					<td>".$menampilkan_hasil[$nol]['nilai_penjualan']."</td>
					<td>".$menampilkan_hasil[$nol]['prediksi']."</td>
					<td>".$menampilkan_hasil[$nol]['absolut_error']."</td>
					<td>".$menampilkan_hasil[$nol]['galatrelatif']."</td>
				</tr>";

				$nol++;
				$tampilkan_2 = $tampilkan_2.$tampilkan;
			}

			$data['tabelprediksi_sosissolo'] = $tampilkan_2;

			$this->load->view('admin/vheader');
			$this->load->view('admin/vmenu');
			$this->load->view('admin/prediksi_perkue/vprediksi_sosissolo',$data);


		//***** MENGHITUNG RATA-RATA GALAT RELATIF *****
		$rata_galatrelatif = $jumlah_galatrelatif/$jumlah_periode;

	} // SELESAI PREDIKSI SOSIS SOLO


} //SELESAI CONTROLLER
