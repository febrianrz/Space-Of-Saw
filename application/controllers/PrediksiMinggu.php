<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PrediksiMinggu extends CI_Controller {

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

	// public function index()
	// {

	// 	$aaa 			= $this->Mprediksi->getKue();
	// 	$no 			= 0;
	// 	$tampilkan_2 	= "";
	// 	$nama_kue		=[];
	// 	$prediksi_ar	=[];

	// 	foreach ($aaa as $kueid)
	// 	{
			
	// 		$update_prediksi = [];
		
			
	// 		//***** Menampilkan Data Kue A dengan ID = 1 *****
	// 		$data = $this->Mprediksi->Mdatakue($kueid['id_produk']);
	// 		foreach ($data as $k)
	// 		{
	// 			// array_push($nama_kue,$k['nama_produk']);
	// 			// $data['graf_kue']=$nama_kue;
	// 		}
		

	// 		//***** Mencari Jumlah Periode Untuk Kue A *****
	// 		$jp = $this->Mprediksi->Mbanyak_periode($kueid['id_produk']);
	// 		foreach ($jp as $s) 
	// 		{
	//         	$jumlah_periode = $s;
	//         }
 //      		// echo "<br><br> jumlah periode = ".$jumlah_periode;


 //       		if($jumlah_periode == 0)
 //       		{
 //       			continue;
 //       		}
 //       		// echo $kueid['id_produk'];



	//         //***** Membuat Nama Variabel Dengan Nilai Awal = 0 *****
	//         $jumlah_x 				= 0;
	//         $jumlah_xkuadrat 		= 0;
	//         $jumlah_y 				= 0;
	//         $jumlah_xy 				= 0;
	//         $jumlah_error 			= 0;
	//         $jumlah_galatrelatif	= 0;
	//         $jumlah_error_kuadrat	= 0;
	//         $galatrelatif 			= 0;



	//         //***** Perulangan Untuk Mendapatkan Formula Y=A+BX *****
	// 		for ($i = 0; $i < $jumlah_periode; $i++)
	// 		{
				
	// 			$x 					= $i+1; 		// Membuat Periode Waktu
	// 			$xkuadrat 			= $x*$x; 		// Membuat X Kuadrat
	// 			$y 					= $data[$i]['jumlah_penjualan']; //Memanggil Data Penjualan Sebagai Y
	// 			$xy 				= $x * $y; 		//membuat nilai periode dikali nilai (XY)

	// 			$jumlah_x 			+= $x; 			// jumlah x
	// 			$jumlah_xkuadrat 	+= $xkuadrat; 	// jumlah x kuadrat
	// 			$jumlah_y 			+= $y; 			// jumlah y
	// 			$jumlah_xy			+= $xy; 		// jumlah xy
	// 		}


	// 		//***** MENCARI NILAI RATA-RATA X DAN RATA-RATA Y *****		
	// 		$rata_x = $this->rumus->Meanx($jumlah_periode, $jumlah_x);
	// 		$rata_y = $this->rumus->Meany($jumlah_periode, $jumlah_y);


	// 		//***** MENCARI NILAI A DAN NILAI B *****	
	// 		$b = round($this->rumus->Carib($jumlah_xy, $jumlah_xkuadrat, $jumlah_periode, $rata_x, $rata_y),2);
	// 		$a = round($this->rumus->Caria($rata_y,$rata_x,$b),2);
			

	// 		//***** Perulangan Untuk Mencari Hasil Prediksi Per Periode dan Nilai Error *****
	// 		for ($i = 0; $i <$jumlah_periode ; $i++)
	// 		{ 
	// 			// MENCARI NILAI PREDIKSI PER PERIODE
	// 			$x 			= $i + 1;
	// 			$prediksi 	= round($this->rumus->Prediksi($a,$b,$x),2);
	// 			$hari 		= $data[$i]['tanggal_transaksi'];

				
	// 			// MENCARI NILAI ERROR PER PERIODE, RUMUSNYA e = y-y'
	// 			$nilai_penjualan		= $data[$i]['jumlah_penjualan'];
	// 			$error 					= round($nilai_penjualan - $prediksi,2);
	// 			$absolut_error 			= abs($error); // nilai absolut error
	// 			$error_kuadrat			= $error*$error;
	// 			$jumlah_error			+= $absolut_error; // membuat jumlah absolute error
	// 			$jumlah_error_kuadrat	+= $error_kuadrat; // jumlah error kuadrat
	// 			$galatrelatif			= $absolut_error/$nilai_penjualan; // mencari nilai galat relatif
	// 			$jumlah_galatrelatif	+= $galatrelatif;
	// 			// $rata_galatrelatif 		= $jumlah_galatrelatif/$jumlah_periode;
	// 			// array_push($prediksi_ar,$prediksi);
	// 		} //SELESAI PERULANGAN MENCARI HASIL PREDIKSI/PERIODE

			

	// 		//***** MENGHITUNG MAD, MSE, RATA GALAT RELATIF(MAPE) *****
	// 		$mad 					= $jumlah_error/$jumlah_periode;
	// 		$mse 					= $jumlah_error_kuadrat/$jumlah_periode;
		


	// 		//***** PERULANGAN UNTUK PREDIKSI 1 PERIODE BERIKUTNYA *****
	// 		//Merubah penjumlahan newperiode sesuai periode yang diinginkan
	// 		$newperiode = $i + (1);
	// 		$newtanggal	= $hari;
	// 		$nambah		= 1;


	// 		for ($z = $i; $z < $newperiode; $z++)
	// 		{ 
				
	// 			$x  				= $z+1;
	// 			$jml_tgl 			= date('Y-m-d',strtotime('+'.$nambah.'days', strtotime($newtanggal)));
	// 			$prediksi 			= $this->rumus->Prediksi($a,$b,$x);
	// 			$rata_galatrelatif 	= $jumlah_galatrelatif/$jumlah_periode*100;
			
	// 			// $row['tambah'] 					= $tambah;
	// 			$row['x']						= $x;
	// 			$row['newtanggal']				= $jml_tgl;
	// 			$row['prediksi']				= $prediksi;
	// 			$row['rata_galatrelatif']		= $rata_galatrelatif;
	// 			$update_prediksi[]				= $row;

	// 			$tampilkan 		="";
	// 			$nol			=0;
	// 			$nambah++;
	// 			// echo var_dump($update_prediksi);exit();
	// 		}
			
			

	// 		$no++;
	// 		$prediksi_cek 	= 0;
	// 		$prediksi_cek2 	= 0;
	// 		$l 				= [];
	// 		foreach ($update_prediksi as $index => $array)
	// 		{
				
	// 			$tampilkan = 
	// 			"<tr>
	// 				<td>".$no."</td>
	// 				<td>".$kueid['nama_produk']."</td>
	// 				<td>".$update_prediksi[$nol]['x']."</td>
	// 				<td>".tgl_indo($update_prediksi[$nol]['newtanggal'])."</td>
	// 				<td>".$update_prediksi[$nol]['prediksi']."</td>
	// 				<td>".round($update_prediksi[$nol]['rata_galatrelatif'],3).'%'."</td>
	// 				<td><a href='PrediksiKue/index_hari/".$kueid['id_produk']."' class='btn btn-success btn-xs'>Lihat Rincian</a></td>
	// 			</tr>";
	// 			array_push($nama_kue,$kueid['nama_produk']);
	// 			array_push($prediksi_ar,$update_prediksi[$nol]['prediksi']);
	// 			// $prediksi_cek 		= $update_prediksi[$nol]['prediksi'];
	// 			// $prediksi_cek2 		= $cek_min;
	// 			$nol++;
	// 			$tampilkan_2 		= $tampilkan_2.$tampilkan;			
	// 		}
		
	
	// 	} // SELESAI FOREACH YANG PERTAMA
	
	// 	$data['tabel_nagasari_berikutnya'] = $tampilkan_2;
	// 	// $data['max_prediksi']=$cek_max;
	// 	// $data['min_prediksi']=$cek_min;
	// 	$data['n']=$jumlah_periode;
	// 	$data['j_x']=$jumlah_x;
	// 	$data['j_y']=$jumlah_y;
	// 	$data['j_xy']=$jumlah_xy;
	// 	$data['j_xkuadrat']=$jumlah_xkuadrat;
	// 	$data['rt_x']=$rata_x;
	// 	$data['rt_y']=$rata_y;
	// 	$data['nil_b']=$b;
	// 	$data['nil_a']=$a;
	// 	$data['j_prediksi']=$a." + ".$b." x ".$x." = ".$prediksi;

	// 	// foreach ($data as $t => $array) {

	// 	// 	echo $t->$nama_kue;
	// 	// 	echo $t->$nama_prediksi;
	// 	// }


	// 	$data['graf_pre']=$prediksi_ar;
	// 	$data['graf_kue']=$nama_kue;

	// 	// echo "<pre>";
	// 	// echo var_dump($data['graf_pre']);exit();
	// 	// echo "</pre>";
	// 	$this->load->view('admin/vheader');
	// 	$this->load->view('admin/vmenu');
	// 	$this->load->view('admin/prediksi_semua/vprediksi_semuakue',$data);

	// } // SELESAI FUNCTION INDEX


	public function index(){
		$data['typeInterval']	= "weeks"; //days, weeks
		$data['start_date'] 	= $this->input->get('start')?$this->Mprediksi->getTanggalAwalByPeriode($this->input->get('start')):$this->Mprediksi->getFirstDate();
		$data['end_date'] 		= $this->input->get('end')?$this->Mprediksi->getTanggalAkhirByPeriode($this->input->get('end')):$this->Mprediksi->getLastDate();
		$data['start']			= ($this->input->get('start')!=null?$this->input->get('start'):1);	
		$data['maxPeriode']		= $this->Mprediksi->getTotalPeriode($this->Mprediksi->getFirstDate(), $this->Mprediksi->getLastDate(),$data['typeInterval']);
		$data['end']			= $this->input->get('end')?$this->input->get('end'):$data['maxPeriode'];
		$data['periodeDicari']	= $data['end']-$data['start']+2;
		$data['totalPeriode']	= $data['end']-$data['start']+1;
		// var_dump($data);die();
		$data['cakes'] 			= $this->db->get('produk')->result();

		
		$this->load->view('admin/vheader');
		$this->load->view('admin/vmenu');
		$this->load->view('admin/prediksi_semua/vprediksi_semuakue_perperiode',$data);		
	}


	public function tes($id_produk)
	{
		echo $this->Mprediksi->getTotalPeriode(0,6,$id_produk);
	}


	












	//BACKUP

	// public function index()
	// {

	// 	$aaa = $this->Mprediksi->getKue();

	// 	$no=0;
	// 	$tampilkan_2 	="";

	// 	foreach ($aaa as $kueid)
	// 	{
			
	// 		$update_prediksi = [];
		
		
	// 		//***** Menampilkan Data Kue A dengan ID = 1 *****
	// 		$data = $this->Mprediksi->Mdatakue($kueid['id_produk']);

		

	// 		//***** Mencari Jumlah Periode Untuk Kue A *****
	// 		$jp = $this->Mprediksi->Mbanyak_periode($kueid['id_produk']);
	// 		foreach ($jp as $s) 
	// 		{
	//         	$jumlah_periode = $s;
	//         }

 //      		// echo "<br><br> jumlah periode = ".$jumlah_periode;

 //       		if($jumlah_periode == 0)
 //       		{
 //       			continue;
 //       		}
       		
 //       		// echo $kueid['id_produk'];

	//         //***** Membuat Nama Variabel Dengan Nilai Awal = 0 *****
	//         $jumlah_x 				= 0;
	//         $jumlah_xkuadrat 		= 0;
	//         $jumlah_y 				= 0;
	//         $jumlah_xy 				= 0;
	//         $jumlah_error 			= 0;
	//         $jumlah_galatrelatif	= 0;
	//         $jumlah_error_kuadrat	= 0;
	//         $galatrelatif 			= 0;


	//         //***** Perulangan Untuk Mendapatkan Formula Y=A+BX *****
	// 		for ($i = 0; $i < $jumlah_periode; $i++)
	// 		{
				
	// 			$x 					= $i+1; 		// Membuat Periode Waktu
	// 			$xkuadrat 			= $x*$x; 		// Membuat X Kuadrat
	// 			$y 					= $data[$i]['jumlah_penjualan']; //Memanggil Data Penjualan Sebagai Y
	// 			$xy 				= $x * $y; 		//membuat nilai periode dikali nilai (XY)

	// 			$jumlah_x 			+= $x; 			// jumlah x
	// 			$jumlah_xkuadrat 	+= $xkuadrat; 	// jumlah x kuadrat
	// 			$jumlah_y 			+= $y; 			// jumlah y
	// 			$jumlah_xy			+= $xy; 		// jumlah xy
	// 		}


	// 		//***** MENCARI NILAI RATA-RATA X DAN RATA-RATA Y *****		
	// 		$rata_x = $this->rumus->Meanx($jumlah_periode, $jumlah_x);
	// 		$rata_y = $this->rumus->Meany($jumlah_periode, $jumlah_y);


	// 		//***** MENCARI NILAI A DAN NILAI B *****	
	// 		$b = round($this->rumus->Carib($jumlah_xy, $jumlah_xkuadrat, $jumlah_periode, $rata_x, $rata_y),2);
	// 		$a = round($this->rumus->Caria($rata_y,$rata_x,$b),2);
			

	// 		//***** Perulangan Untuk Mencari Hasil Prediksi Per Periode dan Nilai Error *****
	// 		for ($i = 0; $i <$jumlah_periode ; $i++)
	// 		{ 
	// 			// MENCARI NILAI PREDIKSI PER PERIODE
	// 			$x 			= $i + 1;
	// 			$prediksi 	= round($this->rumus->Prediksi($a,$b,$x),2);
	// 			$hari 		= $data[$i]['tanggal_transaksi'];

				
	// 			// MENCARI NILAI ERROR PER PERIODE, RUMUSNYA e = y-y'
	// 			$nilai_penjualan		= $data[$i]['jumlah_penjualan'];
	// 			$error 					= round($nilai_penjualan - $prediksi,2);
	// 			$absolut_error 			= abs($error); // nilai absolut error
	// 			$error_kuadrat			= $error*$error;
	// 			$jumlah_error			+= $absolut_error; // membuat jumlah absolute error
	// 			$jumlah_error_kuadrat	+= $error_kuadrat; // jumlah error kuadrat
	// 			$galatrelatif			= $absolut_error/$nilai_penjualan; // mencari nilai galat relatif
	// 			$jumlah_galatrelatif	+= $galatrelatif;
	// 			// $rata_galatrelatif 		= $jumlah_galatrelatif/$jumlah_periode;

	// 			// echo "<br><br> Periode Ke		= ".$x;
	// 			// echo "<br><br> Tanggal			= ".$hari;
	// 			// echo "<br><br> Penjualan/Hari	= ".$nilai_penjualan;
	// 			// echo "<br><br> Prediksi			= ".$prediksi;
	// 			// echo "<br><br> Error			= ".$error;
	// 			// echo "<br><br> Absolut Errror	= ".$absolut_error;
	// 			// echo "<br><br> Jumlah Error		= ".$jumlah_error;
	// 			// echo "<br><br> Jumlah Error Kuadrat		= ".round($jumlah_error_kuadrat,3);
	// 			// // echo "<br><br> MAD	= ".round($mad,3);
	// 			// echo "<br><br> Galat Rel		= ".round($galatrelatif,3);
	// 			// echo "<br><br> Jumlah Galat Rel	= ".round($jumlah_galatrelatif,3);
	// 			// echo "<br><br> *********************";

	// 			// $row['x'] 						= $x;
	// 			// // $panggil_x[]					= $row;
	// 			// $row['hari']					= $hari;
	// 			// $row['nilai_penjualan']			= $nilai_penjualan;
	// 			// $row['prediksi']				= $prediksi;
	// 			// $row['absolut_error']			= $absolut_error;
	// 			// $row['galatrelatif']			= $galatrelatif;
	// 			// $menampilkan_hasil[] 			= $row;

				

	// 		} //SELESAI PERULANGAN MENCARI HASIL PREDIKSI/PERIODE

			


	// 		//***** MENGHITUNG MAD, MSE, RATA GALAT RELATIF(MAPE) *****
	// 		$mad 					= $jumlah_error/$jumlah_periode;
	// 		$mse 					= $jumlah_error_kuadrat/$jumlah_periode;
			
					
	// 		// $rata_galatrelatif 				= $jumlah_galatrelatif/$jumlah_periode;
	// 		// $row['rata_galatrelatif']		= $rata_galatrelatif;
	// 		// $menampilkan_ratagalatrelatif[] = $row;



	// 		//***** PERULANGAN UNTUK PREDIKSI 1 PERIODE BERIKUTNYA *****
	// 		//Merubah penjumlahan newperiode sesuai periode yang diinginkan
	// 		$newperiode = $i + (1);
	// 		$newtanggal	= $hari;
	// 		$nambah		= 1;


	// 		for ($z = $i; $z < $newperiode; $z++)
	// 		{ 
				
	// 			$x  				= $z+1;
	// 			$jml_tgl 			= date('Y-m-d',strtotime('+'.$nambah.'days', strtotime($newtanggal)));
	// 			$prediksi 			= $this->rumus->Prediksi($a,$b,$x);
	// 			$rata_galatrelatif 	= $jumlah_galatrelatif/$jumlah_periode*100;
			
	// 			// $row['tambah'] 					= $tambah;
	// 			$row['x']						= $x;
	// 			$row['newtanggal']				= $jml_tgl;
	// 			$row['prediksi']				= $prediksi;
	// 			$row['rata_galatrelatif']		= $rata_galatrelatif;
	// 			$update_prediksi[]				= $row;

	// 			$tampilkan 		="";
	// 			$nol			=0;
	// 			$nambah++;
	// 			// echo var_dump($update_prediksi);exit();
	// 		}
			
			

	// 		$no++;
	// 		$prediksi_cek=0;
	// 		$prediksi_cek2=0;
	// 		$l=[];
	// 		foreach ($update_prediksi as $index => $array)
	// 		{
	// 			if ($update_prediksi[$nol]['prediksi']>$prediksi_cek) {
	// 				$cek_max=$update_prediksi[$nol]['prediksi'];
					
	// 			}else{
	// 				$cek_max=$prediksi_cek;
	// 			}


	// 			if ($prediksi_cek2<$update_prediksi[$nol]['prediksi']) {
	// 				if ($prediksi_cek2==0) {
	// 					$cek_min=$update_prediksi[$nol]['prediksi'];
	// 				}else{
	// 					$cek_min=$prediksi_cek2;
	// 				}
	// 			}else{
	// 				$cek_min=$update_prediksi[$nol]['prediksi'];
	// 			}
				
	// 			$tampilkan = 
	// 			"<tr>
	// 				<td>".$no."</td>
	// 				<td>".$kueid['nama_produk']."</td>
	// 				<td>".$update_prediksi[$nol]['x']."</td>
	// 				<td>".tgl_indo($update_prediksi[$nol]['newtanggal'])."</td>
	// 				<td>".$update_prediksi[$nol]['prediksi']."</td>
	// 				<td>".round($update_prediksi[$nol]['rata_galatrelatif'],3).'%'."</td>
	// 				<td><a href='PrediksiKue/index_hari/".$kueid['id_produk']."' class='btn btn-success btn-xs'>Lihat Rincian</a></td>
	// 			</tr>";

	// 			$prediksi_cek=$update_prediksi[$nol]['prediksi'];
				

	// 			$prediksi_cek2=$cek_min;
	
	// 			$nol++;

	// 			$tampilkan_2 = $tampilkan_2.$tampilkan;

			
	// 		}
		
	
	// 	} // SELESAI FOREACH YANG PERTAMA
	
	// 	$data['tabel_nagasari_berikutnya'] = $tampilkan_2;
	// 	$data['max_prediksi']=$cek_max;
	// 	$data['min_prediksi']=$cek_min;
	// 	$data['n']=$jumlah_periode;
	// 	$data['j_x']=$jumlah_x;
	// 	$data['j_y']=$jumlah_y;
	// 	$data['j_xy']=$jumlah_xy;
	// 	$data['j_xkuadrat']=$jumlah_xkuadrat;
	// 	$data['rt_x']=$rata_x;
	// 	$data['rt_y']=$rata_y;
	// 	$data['nil_b']=$b;
	// 	$data['nil_a']=$a;
		


		

	// 	$data['j_prediksi']=$a." + ".$b." x ".$x." = ".$prediksi;

	// 	$this->load->view('admin/vheader');
	// 	$this->load->view('admin/vmenu');
	// 	$this->load->view('admin/prediksi_semua/vprediksi_semuakue',$data);

	// } // SELESAI FUNCTION INDEX 

	//END BACKUP






	

	

	public function sosissolo()
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

			$data['tabelprediksi_nagasari'] = $tampilkan_2;

			$this->load->view('admin/vheader');
			$this->load->view('admin/vmenu');
			$this->load->view('admin/prediksi_perkue/vprediksi_sosissolo',$data);



		//***** MENGHITUNG RATA-RATA GALAT RELATIF *****
		$rata_galatrelatif = $jumlah_galatrelatif/$jumlah_periode;

		

	} // SELESAI PREDIKSI NAGASARI



	public function tesData($id_produk=1){
		$id_produk 		= 1;
		$start_date 	= '2018-04-01';
		$end_date 		= '2018-06-16';
		$intervalDays	= 6;
		echo json_encode($this->Mprediksi->getPrediksi($id_produk, 
			$start_date, $end_date, $intervalDays,null));
	}


} //SELESAI CONTROLLER