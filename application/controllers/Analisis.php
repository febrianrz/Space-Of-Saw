<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analisis extends CI_Controller {

	public function  __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->database();
		$this->load->library('pagination');
		$this->load->helper('url');
		$this->load->model('Mramal');
	}

	public function index()
	{
		$this->load->view('admin/vheader');
		$this->load->view('admin/vmenu');
		$this->load->view('admin/vanalisis');
	}

	public function hasil_ramal()
	{
		$this->load->view('admin/vheader');
		$this->load->view('admin/vmenu');
		$this->load->view('admin/vhasil_ramal');
	}

	public function ramal_A()
	{
		$tgl_1=$this->input->post('tgl_mulai');
		$tgl_2=$this->input->post('tgl_akhir');

		$data = $this->Mramal->Mdatakue($tgl_1,$tgl_2);

		$row = array();
		foreach ($data as $res)
		{
			$row['nama_produk'] 		= $res['nama_produk'];
			$row['tanggal_transaksi'] 	= $res['tanggal_transaksi'];
			$row['jumlah_penjualan'] 	= $res['jumlah_penjualan'];
			$row['stock'] 				= $res['stock'];
			$props1[] = $row;
		}


		// mencari jumlah periode
		$sp = $this->Mramal->GetSumTableTransaksi($tgl_1,$tgl_2);
		foreach ($sp as $s)
		{
        	$sumperiode = $s;
        }

         	$sumx = 0;
	        $sumxsquare = 0;
	        $sumnilai = 0;
	        $sumxy = 0;
	        $sumerror = 0;
	        $sumgr = 0;
	        $presentasi_penjualan = 0; //yangbaru
	   		
	   		

	        // Perulangan untuk mendapatkan formula y=a+bx
			for ($i=0; $i<$sumperiode; $i++)
			{
				$x = $i+1; //nilai X sbg Periode Waktu
				$xsquare = $x*$x; //nilai X kudrat
				$nilai = $data[$i]['jumlah_penjualan']; //nilai Y sbg Penjualan
				$xy = $x * $nilai; //Nilai X dikali Y
				$sumx += $x; // Jumlah nilai X
				$sumxsquare += $xsquare; // jumlah X kuadrat
				$sumnilai += $nilai; // jumlah nilai Y 
				$sumxy += $xy; //  jumlah nilai XY
				$stock_kue = $data[$i]['stock']; //yangbaru

				$presentasi_penjualan = round($nilai/$stock_kue*100,1);

				$row['presentasi_penjualan'] = $presentasi_penjualan;
			    $panggil_persentasi[] = $row;
				

				// echo "jumlahperiode = ".$sumperiode;
				// echo "<br> periode waktu =".$x;
				// echo "<br> membuat X kuadrat  = ".$xsquare;
				// echo "<br> jumlah penjualan  = ".$nilai;
				// echo "<br> XY  = ".$xy;
				// echo "<br> JUMLAH X  = ".$sumx;
				// echo "<br> jumlah x square  = ".$sumxsquare;
				// echo "<br> jumlah nilai  = ".$sumnilai;
				// echo "<br> jumlah xy = ".$sumxy;

				// echo "presentasi penjualan = ".$pre;
			}

			// membuat nilai rata-rata
			$rtx = $this->rumus->Meanx($sumperiode,$sumx);
			$rty = $this->rumus->Meany($sumperiode,$sumnilai);

			// mencari nilai a dan b dari rumus y=a+bx
			$b = $this->rumus->Carib($sumxy,$sumxsquare,$sumperiode,$rtx,$rty);
			$a = $this->rumus->Caria($rty,$rtx,$b);

			// echo "mencari rtx = ".$rtx;
			// echo "<br>mencari rty = ".$rty;

			// echo "<br>mencari B = ".$b;
			// echo "<br>mencari A = ".$a;

			// echo "<br>prediksi ke 4 = ".$this->rumus->Prediksi($a,$b,2);

			// Perulangan untuk mencari hasil ramal per periode dan error
			for ($i=0; $i<$sumperiode ; $i++)
			{ 
				// mencari nilai prediksi per periode dari library
				$x = $i+1;
				$prediksi = round($this->rumus->Prediksi($a,$b,$x),1);
				// $presentasi_penjualan = $nilai/$stock_kue*100; //yangbaru
				// $hari = $data[$i]['prediksi'];
				
			    $row['prediksi'] = $prediksi;
			    $panggil_prediksi[] = $row;

			    // mencari nilai error per periode rumus e = y - y'
				$nil = $data[$i]['jumlah_penjualan'];
				$error = round($nil - $prediksi,2);
				$abserror = abs($error); // nilai absolut error
				$sumerror += $abserror; // membuat jumlah absolute error
				$gr = $abserror/$nil; // mencari nilai galat relatif
				$sumgr += $gr;

				$row['gr'] = $gr;
				$panggil_galat[] =$row;
			


				// $data_prediksi = array(
				// 				'no' => $x,
		  //      					'tahun' => $data[$i]['tahun'],
		  //      					'y' => $nil,
		  //      					'y_aksen' => $prediksi,
		  //      					'error' => $error,
		  //      					'error_rel' => $gr
				// 			);
				// $res = $this->m_forecast->InsertData('tb_prediksi_e_01', $data_prediksi);
	
			}
			// $props1[] = $row;
			
			// echo "<br>";
			// foreach ($props2 as $r) {
			// 	$row['prediksi'] = $r['prediksi'];
			// 	$props1[] = $row;
			// }
			// echo "<hr>";
			$satu=1;
			$nol=0;
			// echo sizeof($props2)." dan ".sizeof($props1);
			$tampil_table="";
			$tampil_table2="";
			foreach($props1 as $index => $array)
				{	
					$tampil_table= 
					"<tr>
						<td>".$satu."</td>
						<td>".$array['tanggal_transaksi']."</td>
						<td>".$array['nama_produk']."</td>
						<td>".$array['jumlah_penjualan']."</td>
						<td>".$array['stock']."</td>
						<td>".$panggil_persentasi[$nol]['presentasi_penjualan'].'%'."</td>
						<td>".$panggil_prediksi[$nol]['prediksi']."</td>
						<td>".$panggil_galat[$nol]['gr']."</td>


						
						
					</tr>";
				    
				   	$satu++;
				   	$nol++;
				 	$tampil_table2=$tampil_table2.$tampil_table;
				}

				$data['meja']=$tampil_table2;
				
			
			// Menghtung rata-rata galat relatif
			// $rgr = $sumgr/$sumperiode;

			// Perulangan untuk prediksi 1 periode kedepan
			// rubah penjumlahan newperiode sesuai periode yang diinginkan
			// $newperiode = $i + 1;
			// $newtahun = $tahun;
			// $no = 0;

			// for ($z=$i; $z<$newperiode; $z++) { 
			// 	$no++;
			// 	$x = $z+1;
			// 	$newtahun++; 
			// 	$prediksi = $this->rumus->Prediksi($a,$b,$x);

			// 	// data input ke tabel prediksi
				// $data_prediksi = array(
				// 				'no' => $x,
		  //      					'tahun' => $newtahun,
		  //      					'y_aksen' => $prediksi
				// 			);

			// 	// data update ke tabel result
			// 	$data_result = array(
			// 					'no' => 1,
			// 					'tahun' => $newtahun,
			// 					'prediksi' => $prediksi,
			// 					'rgr' => $rgr,
			// 					'a' => $a,
			// 					'b' => $b,
			// 					'id_industri' => 'ID01',
			// 				);
			// 	$where = array(
			// 				'id_industri' => 'ID01' 
			// 			);
			// 	// Pengecekan tabel result apakah sudah terdapat data prediksi pada 1 industri
			// 	$isiresult = $this->m_forecast->CheckTableRes('tb_result_ekspor','ID01');
			// 	if ($isiresult == 1) {
			// 		$res = $this->m_forecast->UpdateData('tb_result_ekspor', $data_result, $where);
			// 	} else {
			// 		$res = $this->m_forecast->InsertData('tb_result_ekspor', $data_result);
			// 	}
			// 	$res = $this->m_forecast->InsertData('tb_prediksi_e_01', $data_prediksi);
			// }

			$this->load->view('admin/vheader');
			$this->load->view('admin/vmenu');
			$this->load->view('admin/vhasil_ramal',$data);
		
	}

	public function ramal_minggu()
	{
		$tgl_1=$this->input->post('tgl_mulai');
		$tgl_2=$this->input->post('tgl_akhir');

		$data = $this->Mramal->Mdatakue($tgl_1,$tgl_2);

		$row = array();
		foreach ($data as $res)
		{
			$row['nama_produk'] 		= $res['nama_produk'];
			$row['tanggal_transaksi'] 	= $res['tanggal_transaksi'];
			$row['jumlah_penjualan'] 	= $res['jumlah_penjualan'];
			$row['stock'] 				= $res['stock'];
			$props1[] = $row;
		}


		// mencari jumlah periode
		$sp = $this->Mramal->GetSumTableTransaksi($tgl_1,$tgl_2);
		foreach ($sp as $s)
		{
        	$sumperiode = $s;
        }

         	$sumx = 0;
	        $sumxsquare = 0;
	        $sumnilai = 0;
	        $sumxy = 0;
	        $sumerror = 0;
	        $sumgr = 0;
	        $presentasi_penjualan = 0; //yangbaru
	   		
	   		

	        // Perulangan untuk mendapatkan formula y=a+bx
			for ($i=0; $i<$sumperiode; $i++)
			{
				$x = $i+1; //nilai X sbg Periode Waktu
				$xsquare = $x*$x; //nilai X kudrat
				$nilai = $data[$i]['jumlah_penjualan']; //nilai Y sbg Penjualan
				$xy = $x * $nilai; //Nilai X dikali Y
				$sumx += $x; // Jumlah nilai X
				$sumxsquare += $xsquare; // jumlah X kuadrat
				$sumnilai += $nilai; // jumlah nilai Y 
				$sumxy += $xy; //  jumlah nilai XY
				$stock_kue = $data[$i]['stock']; //yangbaru

				$presentasi_penjualan = round($nilai/$stock_kue*100,1);

				$row['presentasi_penjualan'] = $presentasi_penjualan;
			    $panggil_persentasi[] = $row;
				

				// echo "jumlahperiode = ".$sumperiode;
				// echo "<br> periode waktu =".$x;
				// echo "<br> membuat X kuadrat  = ".$xsquare;
				// echo "<br> jumlah penjualan  = ".$nilai;
				// echo "<br> XY  = ".$xy;
				// echo "<br> JUMLAH X  = ".$sumx;
				// echo "<br> jumlah x square  = ".$sumxsquare;
				// echo "<br> jumlah nilai  = ".$sumnilai;
				// echo "<br> jumlah xy = ".$sumxy;

				// echo "presentasi penjualan = ".$pre;
			}

			// membuat nilai rata-rata
			$rtx = $this->rumus->Meanx($sumperiode,$sumx);
			$rty = $this->rumus->Meany($sumperiode,$sumnilai);

			// mencari nilai a dan b dari rumus y=a+bx
			$b = $this->rumus->Carib($sumxy,$sumxsquare,$sumperiode,$rtx,$rty);
			$a = $this->rumus->Caria($rty,$rtx,$b);

			// echo "mencari rtx = ".$rtx;
			// echo "<br>mencari rty = ".$rty;

			// echo "<br>mencari B = ".$b;
			// echo "<br>mencari A = ".$a;

			// echo "<br>prediksi ke 4 = ".$this->rumus->Prediksi($a,$b,2);

			// Perulangan untuk mencari hasil ramal per periode dan error
			for ($i=0; $i<$sumperiode ; $i++)
			{ 
				// mencari nilai prediksi per periode dari library
				$x = $i+1;
				$prediksi = round($this->rumus->Prediksi($a,$b,$x),1);
				// $presentasi_penjualan = $nilai/$stock_kue*100; //yangbaru
				// $hari = $data[$i]['prediksi'];
				
			    $row['prediksi'] = $prediksi;
			    $panggil_prediksi[] = $row;

			    // mencari nilai error per periode rumus e = y - y'
				$nil = $data[$i]['jumlah_penjualan'];
				$error = round($nil - $prediksi,2);
				$abserror = abs($error); // nilai absolut error
				$sumerror += $abserror; // membuat jumlah absolute error
				$gr = $abserror/$nil; // mencari nilai galat relatif
				$sumgr += $gr;

				$row['gr'] = $gr;
				$panggil_galat[] =$row;
			


				// $data_prediksi = array(
				// 				'no' => $x,
		  //      					'tahun' => $data[$i]['tahun'],
		  //      					'y' => $nil,
		  //      					'y_aksen' => $prediksi,
		  //      					'error' => $error,
		  //      					'error_rel' => $gr
				// 			);
				// $res = $this->m_forecast->InsertData('tb_prediksi_e_01', $data_prediksi);
	
			}
			// $props1[] = $row;
			
			// echo "<br>";
			// foreach ($props2 as $r) {
			// 	$row['prediksi'] = $r['prediksi'];
			// 	$props1[] = $row;
			// }
			// echo "<hr>";


			// $satu=1;
			// $nol=0;
			// foreach($props1 as $index => $array)
			// 	{	
			// 		$tampil_table= 
			// 		"<tr>
			// 			<td>".$satu."</td>
			// 			<td>".$array['tanggal_transaksi']."</td>
			// 			<td>".$array['nama_produk']."</td>
			// 			<td>".$array['jumlah_penjualan']."</td>
			// 			<td>".$array['stock']."</td>
			// 			<td>".$panggil_persentasi[$nol]['presentasi_penjualan'].'%'."</td>
			// 			<td>".$panggil_prediksi[$nol]['prediksi']."</td>
			// 			<td>".$panggil_galat[$nol]['gr']."</td>


						
						
			// 		</tr>";
				    
			// 	   	$satu++;
			// 	   	$nol++;
			// 	}

			$satu=1;
			$nol=0;
			// echo sizeof($props2)." dan ".sizeof($props1);
			$tampil_table="";
			$tampil_table2="";
			foreach($props1 as $index => $array)
				{	
					$tampil_table= 
					"<tr>
						<td>".$satu."</td>
						<td>".$array['tanggal_transaksi']."</td>
						<td>".$array['nama_produk']."</td>
						<td>".$array['jumlah_penjualan']."</td>
						<td>".$array['stock']."</td>
						<td>".$panggil_persentasi[$nol]['presentasi_penjualan'].'%'."</td>
						<td>".$panggil_prediksi[$nol]['prediksi']."</td>
						<td>".$panggil_galat[$nol]['gr']."</td>
						
					</tr>";
				    
				   	$satu++;
				   	$nol++;
				 	$tampil_table2=$tampil_table2.$tampil_table;
				}

				$data['meja']=$tampil_table2;
				
			
			// Menghtung rata-rata galat relatif
			// $rgr = $sumgr/$sumperiode;

			// Perulangan untuk prediksi 1 periode kedepan
			// rubah penjumlahan newperiode sesuai periode yang diinginkan
			// $newperiode = $i + 1;
			// $newtahun = $tahun;
			// $no = 0;

			// for ($z=$i; $z<$newperiode; $z++) { 
			// 	$no++;
			// 	$x = $z+1;
			// 	$newtahun++; 
			// 	$prediksi = $this->rumus->Prediksi($a,$b,$x);

			// 	// data input ke tabel prediksi
				// $data_prediksi = array(
				// 				'no' => $x,
		  //      					'tahun' => $newtahun,
		  //      					'y_aksen' => $prediksi
				// 			);

			// 	// data update ke tabel result
			// 	$data_result = array(
			// 					'no' => 1,
			// 					'tahun' => $newtahun,
			// 					'prediksi' => $prediksi,
			// 					'rgr' => $rgr,
			// 					'a' => $a,
			// 					'b' => $b,
			// 					'id_industri' => 'ID01',
			// 				);
			// 	$where = array(
			// 				'id_industri' => 'ID01' 
			// 			);
			// 	// Pengecekan tabel result apakah sudah terdapat data prediksi pada 1 industri
			// 	$isiresult = $this->m_forecast->CheckTableRes('tb_result_ekspor','ID01');
			// 	if ($isiresult == 1) {
			// 		$res = $this->m_forecast->UpdateData('tb_result_ekspor', $data_result, $where);
			// 	} else {
			// 		$res = $this->m_forecast->InsertData('tb_result_ekspor', $data_result);
			// 	}
			// 	$res = $this->m_forecast->InsertData('tb_prediksi_e_01', $data_prediksi);
			// }

			$this->load->view('admin/vheader');
			$this->load->view('admin/vmenu');
			$this->load->view('admin/vhasil_ramal',$data);
		
	}


	// public function coba_A()
	// {
		
	// 	$data = $this->Mramal->Mdatakue('1');

	// 	// mencari jumlah periode
	// 	$sp = $this->Mramal->Tampilkan('1');
	// 	foreach ($sp as $s)
	// 	{
 //        	$sumperiode = $s;
 //        }

        

 //         	$sumx = 0;
	//         $sumxsquare = 0;
	//         $sumnilai = 0;
	//         $sumxy = 0;
	//         $sumerror = 0;
	//         $sumgr = 0;
	   
	//         // Perulangan untuk mendapatkan formula y=a+bx
	// 		for ($i=0; $i<$sumperiode; $i++)
	// 		{
	// 			$x = $i+1; // membuat periode waktu(x)
	// 			$xsquare = $x*$x; // membuat x kuadrat
	// 			$nilai = $data[$i]['jumlah_penjualan']; // memanggil nilai dari tabel
	// 			$xy = $x * $nilai; //membuat nilai periode dikali nilai (XY)
	// 			$sumx += $x; // jumlah x
	// 			$sumxsquare += $xsquare; // jumlah x kuadrat
	// 			$sumnilai += $nilai; // jumlah nilai
	// 			$sumxy += $xy; //  jumlah xy

	// 			echo "jumlahperiode = ".$sumperiode;
	// 			echo "<br> periode waktu =".$x;
	// 			echo "<br> membuat X kuadrat  = ".$xsquare;
	// 			echo "<br> jumlah penjualan  = ".$nilai;
	// 			echo "<br> XY  = ".$xy;
	// 			echo "<br> JUMLAH X  = ".$sumx;
	// 			echo "<br> jumlah x square  = ".$sumxsquare;
	// 			echo "<br> jumlah nilai  = ".$sumnilai;
	// 			echo "<br> jumlah xy = ".$sumxy;

	// 			echo "<hr>";
	// 		}

	// 		// membuat nilai rata-rata
	// 		$rtx = $this->rumus->Meanx($sumperiode,$sumx);
	// 		$rty = $this->rumus->Meany($sumperiode,$sumnilai);

	// 		// mencari nilai a dan b dari rumus y=a+bx
	// 		$b = $this->rumus->Carib($sumxy,$sumxsquare,$sumperiode,$rtx,$rty);
	// 		$a = $this->rumus->Caria($rty,$rtx,$b);

	// 		echo "mencari rtx = ".$rtx;
	// 		echo "<br>mencari rty = ".$rty;

	// 		echo "<br>mencari B = ".$b;
	// 		echo "<br>mencari A = ".$a;

	// 		echo "<br>prediksi ke 4 = ".$this->rumus->Prediksi($a,$b,4);
	// }

}
