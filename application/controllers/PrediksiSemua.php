<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrediksiSemua extends CI_Controller {

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

		$aaa = $this->Mprediksi->getKue();

		$no=0;
		$tampilkan_2 	="";

		foreach ($aaa as $kueid)
		{
			
			$update_prediksi = [];
		
		
			//***** Menampilkan Data Kue A dengan ID = 1 *****
			$data = $this->Mprediksi->Mdatakue($kueid['id_produk']);

		

			//***** Mencari Jumlah Periode Untuk Kue A *****
			$jp = $this->Mprediksi->Mbanyak_periode($kueid['id_produk']);
			foreach ($jp as $s) 
			{
	        	$jumlah_periode = $s;
	        }

      		// echo "<br><br> jumlah periode = ".$jumlah_periode;

       		if($jumlah_periode == 0)
       		{
       			continue;
       		}
       		
       		// echo $kueid['id_produk'];

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
				// $rata_galatrelatif 		= $jumlah_galatrelatif/$jumlah_periode;

				// $row['rata_galatrelatif']		= $rata_galatrelatif;
				// $menampilkan_ratagalatrelatif[] = $row;


				// echo "<br><br> Periode Ke		= ".$x;
				// echo "<br><br> Tanggal			= ".$hari;
				// echo "<br><br> Penjualan/Hari	= ".$nilai_penjualan;
				// echo "<br><br> Prediksi			= ".$prediksi;
				// echo "<br><br> Error			= ".$error;
				// echo "<br><br> Absolut Errror	= ".$absolut_error;
				// echo "<br><br> Jumlah Error		= ".$jumlah_error;
				// echo "<br><br> Jumlah Error Kuadrat		= ".round($jumlah_error_kuadrat,3);
				// // echo "<br><br> MAD	= ".round($mad,3);
				// echo "<br><br> Galat Rel		= ".round($galatrelatif,3);
				// echo "<br><br> Jumlah Galat Rel	= ".round($jumlah_galatrelatif,3);
				// echo "<br><br> *********************";

				// $row['x'] 						= $x;
				// // $panggil_x[]					= $row;
				// $row['hari']					= $hari;
				// $row['nilai_penjualan']			= $nilai_penjualan;
				// $row['prediksi']				= $prediksi;
				// $row['absolut_error']			= $absolut_error;
				// $row['galatrelatif']			= $galatrelatif;
				// $menampilkan_hasil[] 			= $row;

				

			} //SELESAI PERULANGAN MENCARI HASIL PREDIKSI/PERIODE

			// $mad 					= $jumlah_error/$jumlah_periode;
			// // echo "<br><br> MAD	= ".round($mad,3);

			// $mse 	= $jumlah_error_kuadrat/$jumlah_periode;
			// // echo "<br><br> MAD	= ".round($mse,3);

			// $rata_galatrelatif 				= $jumlah_galatrelatif/$jumlah_periode*100;
			// $row['rata_galatrelatif']		= $rata_galatrelatif;
			// $menampilkan_ratagalatrelatif[] = $row;
			// echo "<br><br> MAPE	= ".round($rata_galatrelatif,3);

			// $tampil = $rata_galatrelatif['id_produk'];

			// echo "<br><br> ========================";

			

			// $row['tampil']		= $tampil;
			// $menampilkan_ratagalatrelatif[] = $row;

			



			//***** MENGHITUNG RATA-RATA GALAT RELATIF *****
			// $rata_galatrelatif 				= $jumlah_galatrelatif/$jumlah_periode;
			// $row['rata_galatrelatif']		= $rata_galatrelatif;
			// $menampilkan_ratagalatrelatif[] = $row;

			//***** PERULANGAN UNTUK PREDIKSI 1 PERIODE BERIKUTNYA *****
			//Merubah penjumlahan newperiode sesuai periode yang diinginkan
			$newperiode = $i + 1;
			$newtanggal	= $hari;
			$nambah		=1;


			for ($z = $i; $z < $newperiode; $z++)
			{ 

				$x  		= $z+1;
				$jml_tgl 	=date('Y-m-d',strtotime('+'.$nambah.' days', strtotime($newtanggal)));
				$prediksi 	= $this->rumus->Prediksi($a,$b,$x);
			
				// $row['tambah'] 					= $tambah;
				$row['x']						= $x;
				$row['newtanggal']				= $jml_tgl;
				$row['prediksi']				= $prediksi;
				$update_prediksi[]				= $row;

				$tampilkan 		="";
				$nol			=0;

				// echo var_dump($update_prediksi);exit();
			}
			

			
			$no++;
			foreach ($update_prediksi as $index => $array)
			{
				
				$tampilkan = 
				"<tr>
					<td>".$no."</td>
					<td>".$kueid['nama_produk']."</td>
					<td>".$update_prediksi[$nol]['x']."</td>
					<td>".tgl_indo($update_prediksi[$nol]['newtanggal'])."</td>
					<td>".$update_prediksi[$nol]['prediksi']."</td>
					<td>".round($menampilkan_ratagalatrelatif[]['rata_galatrelatif'],4).'%'."</td>
				</tr>";
					

				// $max_prediksi 	= ($update_prediksi[$nol]['prediksi']);
				// $max = max($max_prediksi);
				// echo "max prediksi nagasari = ".$max;

				// echo "MAPE".$rata_galatrelatif;

				// echo "max prediksi= ".max($prediksi);

				// echo $max_prediksi;
				// $min_prediksi 	=min($update_prediksi[$nol]['prediksi']);
				$nol++;
				$tampilkan_2 = $tampilkan_2.$tampilkan;
			}


		} // SELESAI FOREACH YANG PERTAMA

		

		$data['tabel_nagasari_berikutnya'] = $tampilkan_2;

		$this->load->view('admin/vheader');
		$this->load->view('admin/vmenu');
		$this->load->view('admin/prediksi_semua/vprediksi_semuakue',$data);

	} // SELESAI FUNCTION INDEX NAGASARI


} //SELESAI CONTROLLER