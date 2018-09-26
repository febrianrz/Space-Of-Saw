<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prediksi extends CI_Controller {

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

	public function index()
	{
		//***** Menampilkan Data Kue A dengan ID = 1 *****
		$data = $this->Mprediksi->Mdatakue('1');

		//***** Mencari Jumlah Periode Untuk Kue A *****
		$jp = $this->Mprediksi->Mbanyak_periode('1');
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
			$error_kuadrat			= $error*$error;
			$jumlah_error			+= $absolut_error; // membuat jumlah absolute error
			$jumlah_error_kuadrat	+= $error_kuadrat; // jumlah error kuadrat
			$galatrelatif			= $absolut_error/$nilai_penjualan; // mencari nilai galat relatif
			$jumlah_galatrelatif	+= $galatrelatif;


			// $row['x'] 						= $x;
			// // $panggil_x[]					= $row;
			// $row['hari']					= $hari;
			// $row['nilai_penjualan']			= $nilai_penjualan;
			// $row['prediksi']				= $prediksi;
			// $row['absolut_error']			= $absolut_error;
			// $row['galatrelatif']			= $galatrelatif;
			// $menampilkan_hasil[] 			= $row;

		} //SELESAI PERULANGAN MENCARI HASIL PREDIKSI/PERIODE


		//***** MENGHITUNG RATA-RATA GALAT RELATIF *****

		$mad 					= $jumlah_error/$jumlah_periode;
		$mse 					= $jumlah_error_kuadrat/$jumlah_periode;
		$rata_galatrelatif 		= $jumlah_galatrelatif/$jumlah_periode*100;

		// $rata_galatrelatif 				= $jumlah_galatrelatif/$jumlah_periode;
		$row['rata_galatrelatif']		= $rata_galatrelatif;
		$menampilkan_ratagalatrelatif[] = $row;

		//***** PERULANGAN UNTUK PREDIKSI 1 PERIODE BERIKUTNYA *****
		//Merubah penjumlahan newperiode sesuai periode yang diinginkan
		$newperiode = $i + (0 + $i);
		$newtanggal	= $hari;
		// $newhari 	= $newtanggal['tanggal_transaksi'];
		// $no 		= 0;
		// $batas		= 0;
		$nambah=1;
		for ($z = $i; $z < $newperiode; $z++)
		{ 
				// $no++;
				$x  = $z+1;
				// $tambah 	= 30;
				// $newtanggal++; ''
				$jml_tgl=date('Y-m-d',strtotime('+'.$nambah.' days', strtotime($newtanggal)));
				$prediksi 	= $this->rumus->Prediksi($a,$b,$x);
			
				// $row['tambah'] 					= $tambah;
				$row['x']						= $x;
				$row['newtanggal']				= $jml_tgl;
				$row['prediksi']				= $prediksi;
				$update_prediksi[]				= $row;

				$tampilkan 		="";
				$tampilkan_2 	="";
				$nol			=0;
				$nambah++;
				// echo var_dump($update_prediksi);exit();

				
		}

		$no 		= 0;
		foreach ($update_prediksi as $index => $array)
				{
					$no++;
					$tampilkan =
					"<tr>
						<td>".$no."</td>
						<td>".'Nagasari'."</td>
						<td>".$update_prediksi[$nol]['x']."</td>
						<td>".tgl_indo($update_prediksi[$nol]['newtanggal'])."</td>
						<td>".$update_prediksi[$nol]['prediksi']."</td>
						<td>".round($menampilkan_ratagalatrelatif[0]['rata_galatrelatif'],4).'%'."</td>
					</tr>";

					$nol++;
					$tampilkan_2 = $tampilkan_2.$tampilkan;
				}

				$data['tabel_nagasari_berikutnya'] = $tampilkan_2;

				$this->load->view('admin/vheader');
				$this->load->view('admin/vmenu');
				$this->load->view('admin/prediksi_berikutnya/vprediksi_nagasari_berikutnya',$data);

	} // SELESAI FUNCTION INDEX NAGASARI






	public function prediksi_sosissolo_berikutnya()
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


			// $row['x'] 						= $x;
			// // $panggil_x[]					= $row;
			// $row['hari']					= $hari;
			// $row['nilai_penjualan']			= $nilai_penjualan;
			// $row['prediksi']				= $prediksi;
			$row['absolut_error']			= $absolut_error;
			$row['galatrelatif']			= $galatrelatif;
			$menampilkan_hasil[] 			= $row;

		} //SELESAI PERULANGAN MENCARI HASIL PREDIKSI/PERIODE


		//***** MENGHITUNG RATA-RATA GALAT RELATIF *****
		$rata_galatrelatif = $jumlah_galatrelatif/$jumlah_periode;


		//***** PERULANGAN UNTUK PREDIKSI 1 PERIODE BERIKUTNYA *****
		//Merubah penjumlahan newperiode sesuai periode yang diinginkan
		$newperiode = $i + 1;
		$newtanggal	= $hari;
		$no 		= 0;
		// $batas		= 0;

		for ($z = $i; $z < $newperiode; $z++)
		{ 
				$no++;
				$x  = $z+1;
				// $tambah 	= 30;
				$newtanggal++; 
				$prediksi 	= $this->rumus->Prediksi($a,$b,$x);
			
				// $row['tambah'] 					= $tambah;
				$row['x']						= $x;
				$row['newtanggal']				= $newtanggal;
				$row['prediksi']				= $prediksi;
				$update_prediksi[]				= $row;

				$tampilkan 		="";
				$tampilkan_2 	="";
				$nol			=0;

				// echo var_dump($update_prediksi);exit();

				foreach ($update_prediksi as $index => $array)
				{
					$tampilkan =
					"<tr>
						<td>".$no."</td>
						<td>".$update_prediksi[$nol]['x']."</td>
						<td>".$update_prediksi[$nol]['newtanggal']."</td>
						<td>".$update_prediksi[$nol]['prediksi']."</td>
						<td>".$menampilkan_hasil[$nol]['absolut_error']."</td>
						<td>".$menampilkan_hasil[$nol]['galatrelatif']."</td>
					</tr>";

					$nol++;
					$tampilkan_2 = $tampilkan_2.$tampilkan;
				}

				$data['tabel_sosissolo_berikutnya'] = $tampilkan_2;

				$this->load->view('admin/vheader');
				$this->load->view('admin/vmenu');
				$this->load->view('admin/prediksi_berikutnya/vprediksi_nagasari_berikutnya',$data);
		}

	} // SELESAI FUNCTION INDEX NAGASARI

	public function prediksi_risolmayonaise_berikutnya()
	{
		//***** Menampilkan Data Kue A dengan ID = 1 *****
		$data = $this->Mprediksi->Mdatakue('3');

		//***** Mencari Jumlah Periode Untuk Kue A *****
		$jp = $this->Mprediksi->Mbanyak_periode('3');
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


			// $row['x'] 						= $x;
			// // $panggil_x[]					= $row;
			// $row['hari']					= $hari;
			// $row['nilai_penjualan']			= $nilai_penjualan;
			// $row['prediksi']				= $prediksi;
			$row['absolut_error']			= $absolut_error;
			$row['galatrelatif']			= $galatrelatif;
			$menampilkan_hasil[] 			= $row;

		} //SELESAI PERULANGAN MENCARI HASIL PREDIKSI/PERIODE


		//***** MENGHITUNG RATA-RATA GALAT RELATIF *****
		$rata_galatrelatif = $jumlah_galatrelatif/$jumlah_periode;


		//***** PERULANGAN UNTUK PREDIKSI 1 PERIODE BERIKUTNYA *****
		//Merubah penjumlahan newperiode sesuai periode yang diinginkan
		$newperiode = $i + 1;
		$newtanggal	= $hari;
		$no 		= 0;
		// $batas		= 0;

		for ($z = $i; $z < $newperiode; $z++)
		{ 
				$no++;
				$x  = $z+1;
				// $tambah 	= 30;
				$newtanggal++; 
				$prediksi 	= $this->rumus->Prediksi($a,$b,$x);
			
				// $row['tambah'] 					= $tambah;
				$row['x']						= $x;
				$row['newtanggal']				= $newtanggal;
				$row['prediksi']				= $prediksi;
				$update_prediksi[]				= $row;

				$tampilkan 		="";
				$tampilkan_2 	="";
				$nol			=0;

				// echo var_dump($update_prediksi);exit();

				foreach ($update_prediksi as $index => $array)
				{
					$tampilkan =
					"<tr>
						<td>".$no."</td>
						<td>".$update_prediksi[$nol]['x']."</td>
						<td>".$update_prediksi[$nol]['newtanggal']."</td>
						<td>".$update_prediksi[$nol]['prediksi']."</td>
						<td>".$menampilkan_hasil[$nol]['absolut_error']."</td>
						<td>".$menampilkan_hasil[$nol]['galatrelatif']."</td>
					</tr>";

					$nol++;
					$tampilkan_2 = $tampilkan_2.$tampilkan;
				}

				$data['tabel_update'] = $tampilkan_2;

				$this->load->view('admin/vheader');
				$this->load->view('admin/vmenu');
				$this->load->view('admin/prediksi_berikutnya/vprediksi_2',$data);
		}

	} // SELESAI FUNCTION INDEX NAGASARI

	public function prediksi_kuelemper_berikutnya()
	{
		//***** Menampilkan Data Kue A dengan ID = 1 *****
		$data = $this->Mprediksi->Mdatakue('4');

		//***** Mencari Jumlah Periode Untuk Kue A *****
		$jp = $this->Mprediksi->Mbanyak_periode('4');
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


			// $row['x'] 						= $x;
			// // $panggil_x[]					= $row;
			// $row['hari']					= $hari;
			// $row['nilai_penjualan']			= $nilai_penjualan;
			// $row['prediksi']				= $prediksi;
			$row['absolut_error']			= $absolut_error;
			$row['galatrelatif']			= $galatrelatif;
			$menampilkan_hasil[] 			= $row;

		} //SELESAI PERULANGAN MENCARI HASIL PREDIKSI/PERIODE


		//***** MENGHITUNG RATA-RATA GALAT RELATIF *****
		$rata_galatrelatif = $jumlah_galatrelatif/$jumlah_periode;


		//***** PERULANGAN UNTUK PREDIKSI 1 PERIODE BERIKUTNYA *****
		//Merubah penjumlahan newperiode sesuai periode yang diinginkan
		$newperiode = $i + 1;
		$newtanggal	= $hari;
		$no 		= 0;
		// $batas		= 0;

		for ($z = $i; $z < $newperiode; $z++)
		{ 
				$no++;
				$x  = $z+1;
				// $tambah 	= 30;
				$newtanggal++; 
				$prediksi 	= $this->rumus->Prediksi($a,$b,$x);
			
				// $row['tambah'] 					= $tambah;
				$row['x']						= $x;
				$row['newtanggal']				= $newtanggal;
				$row['prediksi']				= $prediksi;
				$update_prediksi[]				= $row;

				$tampilkan 		="";
				$tampilkan_2 	="";
				$nol			=0;

				// echo var_dump($update_prediksi);exit();

				foreach ($update_prediksi as $index => $array)
				{
					$tampilkan =
					"<tr>
						<td>".$no."</td>
						<td>".$update_prediksi[$nol]['x']."</td>
						<td>".$update_prediksi[$nol]['newtanggal']."</td>
						<td>".$update_prediksi[$nol]['prediksi']."</td>
						<td>".$menampilkan_hasil[$nol]['absolut_error']."</td>
						<td>".$menampilkan_hasil[$nol]['galatrelatif']."</td>
					</tr>";

					$nol++;
					$tampilkan_2 = $tampilkan_2.$tampilkan;
				}

				$data['tabel_update'] = $tampilkan_2;

				$this->load->view('admin/vheader');
				$this->load->view('admin/vmenu');
				$this->load->view('admin/prediksi_berikutnya/vprediksi_2',$data);
		}

	} // SELESAI FUNCTION INDEX NAGASARI


} //SELESAI CONTROLLER