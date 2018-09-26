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
		$this->load->view('admin/vheader');
		$this->load->view('admin/vmenu');
		$this->load->view('admin/vprediksi');
	}

	// public function hasil_prediksi()
	// {
	// 	$this->load->view('admin/vheader');
	// 	$this->load->view('admin/vmenu');
	// 	$this->load->view('admin/vhasil_prediksi');
	// }

	public function prediksi_nagasari()
	{

		// $isipredik = $this->m_forecast->CheckTable('tb_prediksi_e_01');
		// //Mengecek apakah tabel kosong kalau kosng insert kalau berisi delete all
		// if ($isipredik == 0 ) 

		//***** Menampilkan Data Kue A dengan ID = 1 *****
		$data = $this->Mprediksi->Mdatakue('1');



		//***** Mencari Jumlah Periode Untuk Kue A *****
		$jp = $this->Mprediksi->Mbanyak_periode('1');
		foreach ($jp as $s) 
		{
        	$jumlah_periode = $s;

        }

        // echo "Jumlah Periode = ".$jumlah_periode; 



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


		// echo "<br><br> Jumlah X 		= ".$jumlah_x; 			//HASILNYA = 465
		// echo "<br><br> Jumlah X kudrat 	= ".$jumlah_xkuadrat;	
		// echo "<br><br> Jumlah Y 		= ".$jumlah_y;
		// echo "<br><br> Jumlah X.Y 		= ".$jumlah_xy;



		//***** MENCARI NILAI RATA-RATA X DAN RATA-RATA Y *****		
		$rata_x = $this->rumus->Meanx($jumlah_periode, $jumlah_x);
		$rata_y = $this->rumus->Meany($jumlah_periode, $jumlah_y);

		// echo "<br><br> Rata-rata Nilai X 		= ".$rata_x;
		// echo "<br><br> Rata-rata Nilai Y			= ".$rata_y;



		//***** MENCARI NILAI A DAN NILAI B *****	
		$b = round($this->rumus->Carib($jumlah_xy, $jumlah_xkuadrat, $jumlah_periode, $rata_x, $rata_y),2);
		$a = round($this->rumus->Caria($rata_y,$rata_x,$b),2);

		// echo "<br><br> Nilai B		= ".$b;
		// echo "<br><br> Nilai A		= ".$a;

		// echo "<br><br>----------------------------";
		// echo "<br>----------------------------";
		// echo "<br>----------------------------";

		// $prediksi = round($this->rumus->Prediksi($a,$b,3),2);
		// echo "<br><br> Prediksi	= ".$prediksi;

		


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

			// echo "<br><br> Periode Ke		= ".$x;
			// echo "<br><br> Tanggal			= ".$hari;
			// echo "<br><br> Penjualan/Hari	= ".$nilai_penjualan;
			// echo "<br><br> Prediksi			= ".$prediksi;
			// echo "<br><br> Error			= ".$error;
			// echo "<br><br> Absolut Errror	= ".$absolut_error;
			// echo "<br><br> Jumlah Error		= ".$jumlah_error;
			// echo "<br><br> Galat Rel		= ".round($galatrelatif,3);
			// echo "<br><br> Jumlah Galat Rel	= ".round($jumlah_galatrelatif,3);
			// echo "<br><br> *********************";


			//INPUT HASIL PREDIKSI/PERIODE KE TABEL PREDIKSI
				// $data_prediksi = array
				// (
				// 	'x' 				=> $x,
				// 	'tanggal' 			=> $data[$i]['tanggal_transaksi'],
				// 	'y' 				=> $nilai_penjualan,
				// 	'hasil_prediksi' 	=> $prediksi,
				// 	'error'				=> $absolut_error,
				// 	'error_rel' 		=> $galatrelatif
				// );

				// $this->Mprediksi->Mtambah_prediksi($data_prediksi);

			$row['x'] 						= $x;
			// $panggil_x[]					= $row;
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

			$data['tabel_prediksi'] = $tampilkan_2;

			$this->load->view('admin/vheader');
			$this->load->view('admin/vmenu');
			$this->load->view('admin/prediksi_perkue/vprediksi_nagasari',$data);



		//***** MENGHITUNG RATA-RATA GALAT RELATIF *****
		$rata_galatrelatif = $jumlah_galatrelatif/$jumlah_periode;

	} // SELESAI PREDIKSI NAGASARI

	//data input ke tabel prediksi
		// 	$data_prediksi = array
		// 	(
		// 		'x' 				=> $x,
		// 		'tanggal' 			=> $newtanggal,
		// 		'hasil_prediksi' 	=> $prediksi,
		// 	);


		// 	$data_prediksi_baru = array
		// 	(
		// 		'x' 					=> 1,
		// 		'tanggal' 				=> $newtanggal,
		// 		'hasil_prediksi_result' => $prediksi,
		// 		'rata_galrel' 			=> $rata_galatrelatif,
		// 		'a' 					=> $a,
		// 		'b' 					=> $b,
		// 		'id_produk'				=> '1',
		// 	);


		// 	$where = array
		// 	(
		// 		'id_produk' => '1' 
		// 	);


		// 	// Pengecekan tabel result apakah sudah terdapat data prediksi pada 1 industri
		// 		$input_prediksi = $this->Mprediksi->Mperiksa_hasil('id_produk','1');
		// 		if ($input_prediksi == 1) 
		// 		{
		// 			$res = $this->Mprediksi->Mupdate_data('tb_result_ekspor', $data_prediksi_baru, $where);
		// 		}

		// 		else

		// 		{
		// 			$res = $this->Mprediksi->InsertData('tb_result_ekspor', $data_prediksi_baru);
		// 		}

		// 		$res = $this->Mprediksi->InsertData('tb_prediksi_e_01', $hasil_prediksi);
			
		// } //SELESAI FOR


	// } //SELESAI FUNCTION PREDIKSI KUE A

} //SELESAI CONTROLLER
