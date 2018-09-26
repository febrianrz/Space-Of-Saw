<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrediksiBulan extends CI_Controller
{

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
		$this->load->view('admin/vheader');
		$this->load->view('admin/vmenu');
		$this->load->view('admin/vprediksi');
	}


	public function vprediksi_nagasari_perbulan()
	{
		//***** Menampilkan Data Kue A dengan ID = 1 *****
		$data = $this->Mprediksi->Mprediksi_april('1');


		//***** Mencari Jumlah Periode Untuk Kue A *****
		$jp = $this->Mprediksi->Mhitung_april('1');
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

			$data['tabelprediksi_nagasari_april'] = $tampilkan_2;

			$this->load->view('admin/vheader');
			$this->load->view('admin/vmenu');
			$this->load->view('admin/prediksi_kueperbulan/vprediksi_nagasari_perbulan',$data);


		//***** MENGHITUNG RATA-RATA GALAT RELATIF *****
		$rata_galatrelatif = $jumlah_galatrelatif/$jumlah_periode;

		//###############################################################################

	} // SELESAI PREDIKSI SOSIS SOLO



	public function prediksi_nagasari_mei()
	{
		//***** Menampilkan Data Kue A dengan ID = 1 *****
		$data = $this->Mprediksi->Mprediksi_mei('1');


		//***** Mencari Jumlah Periode Untuk Kue A *****
		$jp = $this->Mprediksi->Mhitung_mei('1');
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

			$data['tabelprediksi_nagasari_mei'] = $tampilkan_2;

			$this->load->view('admin/vheader');
			$this->load->view('admin/vmenu');
			$this->load->view('admin/prediksi_kueperbulan/vprediksi_nagasari_perbulan',$data);


		//***** MENGHITUNG RATA-RATA GALAT RELATIF *****
		$rata_galatrelatif = $jumlah_galatrelatif/$jumlah_periode;

		//###############################################################################

	} // SELESAI PREDIKSI SOSIS SOLO




	public function prediksi_sosissolo_april()
	{
		//***** Menampilkan Data Kue A dengan ID = 1 *****
		$data = $this->Mprediksi->Mprediksi_april('2');


		//***** Mencari Jumlah Periode Untuk Kue A *****
		$jp = $this->Mprediksi->Mhitung_april('2');
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

			$data['tabelprediksi_sosissolo_perbulan'] = $tampilkan_2;

			$this->load->view('admin/vheader');
			$this->load->view('admin/vmenu');
			$this->load->view('admin/prediksi_kueperbulan/vprediksi_sosissolo_perbulan',$data);


		//***** MENGHITUNG RATA-RATA GALAT RELATIF *****
		$rata_galatrelatif = $jumlah_galatrelatif/$jumlah_periode;

	} // SELESAI PREDIKSI SOSIS SOLO

} //SELESAI CONTROLLER