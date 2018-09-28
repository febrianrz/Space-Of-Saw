<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mprediksi extends CI_Model
{

	public function getKue()
	{
		$this->db->select('*');
		$this->db->from('produk');
		$query = $this->db->get();
		return $query->result_array();

	}

	public function Mdatakue($id) //Data Berdasarkan ID Kue
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
		$this->db->where('transaksi.id_produk', $id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function Mbanyak_periode($id) //Mencari Banyaknya Periode Pada Kue
	{
		$this->db->select('count(*)');
		$this->db->from('transaksi');
		$this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
		$this->db->where('transaksi.id_produk', $id);
		$query = $this->db->get();
		return $query->row();
	}

	public function Mambilbulantahun() //Buat Nampilin Daftar Bulan Di Form Prediksi
	{
		$this->db->select('month(tanggal_transaksi), year(tanggal_transaksi)');
		$this->db->from('transaksi');
		$this->db->group_by('month(tanggal_transaksi), year(tanggal_transaksi)');
		$query = $this->db->get();
		// return $query->row();
		return $query->result_array();
	}


	// public function Minputbulan($bulan_input) //data berdasarkan ID kue
	// {
	// 	// $bulan_input = array();
	// 	$this->db->select('*');
	// 	$this->db->from('transaksi');
	// 	$this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
	// 	$this->db->where('transaksi.tanggal_transaksi', $bulan_input);
	// 	// $this->db->where('transaksi.id_produk', $id);
	// 	// $this->db->where('transaksi.tanggal_transaksi <=', $tgl_2);
	// 	// $this->db->where('transaksi.id_produk', $id);
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }

	// public function Mbanyak($bulan_input) //Mencari Banyaknya Periode Pada Kue
	// {
		
	// 	$this->db->select('count(*)');
	// 	$this->db->from('transaksi');
	// 	$this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
	// 	$this->db->where('transaksi.tanggal_transaksi', $bulan_input);
	// 	// $this->db->where('transaksi.id_produk', $id);
	// 	$query = $this->db->get();
	// 	return $query->row();
	// }

	public function Mtampilkan()
	{
		$tampilkan = $this->db->query("SELECT * FROM transaksi JOIN produk ON produk.id_produk = transaksi.id_produk WHERE date_format(yes, '%M %Y') = '$bulanth' ")->result();
		return $tampilkan;
	}


	// KALO DIBAWAH INI CUMA COBA-COBA







	public function Mtambah_prediksi($data_prediksi)
	{
		$this->db->insert('prediksi',$data_prediksi);
	}


	public function Mprediksi_april($id)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
		$this->db->where('transaksi.id_produk', $id);
		$this->db->where('transaksi.tanggal_transaksi >="2018-04-01"');
		$this->db->where('transaksi.tanggal_transaksi <="2018-04-03"');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function Mhitung_april($id)
	{
		$this->db->select('count(*)');
		$this->db->from('transaksi');
		$this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
		$this->db->where('transaksi.id_produk', $id);
		$this->db->where('transaksi.tanggal_transaksi >="2018-04-01"');
		$this->db->where('transaksi.tanggal_transaksi <="2018-04-03"');
		$query = $this->db->get();
		return $query->row();
	}

	public function Mprediksi_mei($id)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
		$this->db->where('transaksi.id_produk', $id);
		$this->db->where('transaksi.tanggal_transaksi >="2018-05-01"');
		$this->db->where('transaksi.tanggal_transaksi <="2018-05-02"');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function Mhitung_mei($id)
	{
		$this->db->select('count(*)');
		$this->db->from('transaksi');
		$this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
		$this->db->where('transaksi.id_produk', $id);
		$this->db->where('transaksi.tanggal_transaksi >="2018-05-01"');
		$this->db->where('transaksi.tanggal_transaksi <="2018-05-02"');
		$query = $this->db->get();
		return $query->row();
	}









	public function Mprediksi_bulan($id)
	{
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
		$this->db->where('transaksi.tanggal_transaksi', $bulan1 = 'BETWEEN "2018-04-01" AND "2018-04-30"');
		$this->db->where('transaksi.id_produk', $id);
		$query = $this->db->get();
		return $query->result_array();
	}











	public function Mhitung_bulan($id,$bulan_1,$bulan_2)
	{
		$this->db->select('count(*)');
		$this->db->from('transaksi');
		$this->db->join('produk', 'transaksi.id_produk = produk.id_produk');
		
		$this->db->where('transaksi.tanggal_transaksi', $bulan_1=" BETWEEN '2018-04-01' AND '2018-04-30'");
		$this->db->where('transaksi.tanggal_transaksi', $bulan_2=" BETWEEN '2018-05-01' AND '2018-05-30'");
		$this->db->where('transaksi.id_produk', $id);
		$query = $this->db->get();
		return $query->row();
	}
	
	

	/** Prediksi Perperiode **/

	public function getJumlahPenjualanBydate($start_date, $id_produk, $interval){
		// Mengambil jumlah penjualan berdasarkan tanggal
		$end_date = date('Y-m-d', strtotime($start_date." +".$interval." days"));
		$jumlah = $this->db->select('sum(jumlah_penjualan) as jumlah')
			->where('id_produk',$id_produk)
			->where("tanggal_transaksi >= '$start_date'")
			->where("tanggal_transaksi <= '$end_date'")
			->get('transaksi')->row()->jumlah;
		return $jumlah?$jumlah:0;
			
	}	
	

	public function getTotalPeriode($start_date, $end_date, $type){
		$start 		= date_create(date('Y-m-d',strtotime($start_date)));
		$end		= date_create(date('Y-m-d',strtotime($end_date)));
		$inteval	= date_diff($start,$end);
		
		if($type == 'days'){
			// echo $inteval->format('%a')+1;die();
			return (((int)$inteval->format('%a')))+1;		
		} else if($type == 'weeks'){
			// echo $inteval->format('%a')+1;die();
			return floor(((int)$inteval->format('%a')+1)/7);		
		} else if($type == 'months') {
			return (((int)$inteval->format('%m')));		
		}
		
		
	}

	public function getTotalPeriodeByDay($start_date, $end_date){
		$start 		= date_create(date('Y-m-d',strtotime($start_date)));
		$end		= date_create(date('Y-m-d',strtotime($end_date)));
		$inteval	= date_diff($start,$end);
		// echo $start_date;die();
		return (((int)$inteval->format('%a'))+1);
	}



	public function getTanggalByInterval($start_date, $time, $interval){
		if($time == 0) $time = 1;
		$interval = $time * ($interval-1);
		return date('Y-m-d', strtotime($start_date.' +'.$interval.' days'));
	}


	public function getPrediksi($id_produk, $start_date, $end_date, $interval, $periodeDicari=null, $neeForecast=true){
		if($interval == 1){
			$totalPeriode 	= $this->getTotalPeriodeByDay($start_date, $end_date, $interval);	
		} else {
			$totalPeriode 	= $this->getTotalPeriode($start_date, $end_date, $interval);	
		}
		
		if($totalPeriode==0) $totalPeriode = 1;
		
		$periodeDicari	= $periodeDicari==null?$totalPeriode + 1:$periodeDicari;

		$totalY			= 0;
		$totalX			= 0;
		$totalX2		= 0;
		$totalXY		= 0;

		$tmp = [];
		for($i=1; $i <= $totalPeriode; $i++){
			if($i != 1) $start_date = date('Y-m-d', strtotime($start_date." +$interval days"));

			/** end date dalam 1 periode **/
			$tmpEndDate 	= date('Y-m-d', strtotime($start_date."+$interval days"));

			$y 				= $this->getJumlahPenjualanBydate($start_date,$id_produk, $interval);
			$x 				= $i;
			$x2				= $x*$x;
			$xy 			= $y * $x;
			if($neeForecast){
				// $forecast 		= $this->getPrediksi($id_produk,$start_date,$tmpEndDate, $interval,$i,false);	
			} else {
				// $forecast 		= 0;
			}
			

			$totalY			+= $y;
			$totalX			+= $x;
			$totalX2		+= $x2;
			$totalXY		+= $xy;	
			if($neeForecast){
				$tmp[$start_date]	= [
					'total_penjualan'	=> $y,
					'data'			=> null
				];	
			}
		}
		
		$rataRataX		= $totalX / $totalPeriode;
		$rataRataY		= $totalY / $totalPeriode;

		$pembagiB 		= ($totalX2-($totalPeriode*($rataRataX*$rataRataX)))==0? 1 : ($totalX2-($totalPeriode*($rataRataX*$rataRataX)));
		$b 				= ($totalXY - ($totalPeriode * $rataRataX * $rataRataY)) / $pembagiB;
		$a 				= $rataRataY - ($b * $rataRataX);

		$prediksi 		= $a + ($b * $periodeDicari); 


		$forecast 		= $this->getForecast2($id_produk, $this->session->userdata('ori_start_date'), $this->session->userdata('ori_end_date'), $interval, $periodeDicari);
		$totalPenjualan = $totalY;
		$totalPenjualan = $totalPenjualan == 0? 1 : $totalPenjualan;
		$error 			= $totalPenjualan - $forecast;
		$errorKuadrat 	= $error * $error;
		$galat 			= $error / $totalPenjualan;
		$galat 			= $galat < 0 ? $galat * -1 : $galat;
		$dataPrediksi = [
			'tanggalAwal'		=> $start_date,
			'periodeDicari'		=> $periodeDicari,
			'prediksi'			=> $prediksi,
			'data'				=> $tmp,
			'rataRataY'			=> $rataRataY,
			"rataRataX"			=> $rataRataX,
			"total_periode"		=> $totalPeriode,
			"total_x"			=> $totalX,
			"total_y"			=> $totalY,
			'totalXY'			=> $totalXY,
			"totalX2"			=> $totalX2,	
			"nilai_b"			=> $b,
			"nilai_a"			=> $a,
			"forecast"			=> $forecast,
			'error'				=> $error,
			'errorKuadrat'		=> $errorKuadrat,
			'galat'				=> $galat
		];


		
		// $forecast 		= $this->getForecast2($id_produk, $start_date, $end_date, $interval, $periodeDicari);
		// $totalPenjualan = 1;
		// $error 			= $totalPenjualan - $prediksi;
		// $errorKuadrat 	= $error * $error;
		// $galat 			= 0;

		// $dataPrediksi['forecast']		= $forecast;
		// $dataPrediksi['error']			= $error;
		// $dataPrediksi['errorKuadrat']	= $errorKuadrat;
		// $dataPrediksi['galat']		 	= $galat;

		return (object)$dataPrediksi; 

	}


	public function getPrediksiKue($data){
		$tmpData = [];

		foreach ($data['cakes'] as $key) {

			// print_r($key);die();
			$tmpPrediksi = $this->Mprediksi->getPrediksi($key->id_produk, 
					$data['start_date'], $data['end_date'], $data['intervalDays'],null);
			$forecast 	= $this->getForecast($tmpPrediksi);
			$totalPenjualan = $tmpPrediksi->data[$data['start_date']]['total_penjualan'];
			$totalPenjualan = $totalPenjualan==0?1:$totalPenjualan;
			$error 		= $totalPenjualan - $forecast;
			$errorKuadrat = $error * $error;		 
			$tmpData[$key->id_produk] = [
				'data' 			=> $tmpPrediksi,
				'forcast'		=> $forecast,
				'error'			=> $error,
				'errorKuadrat'	=> $errorKuadrat,
				'galat'			=> $error / $totalPenjualan
			];
		}
		// die();
		return $tmpData;
	}

	public function getForecast($listPrediksi){
		$totalX2		= $listPrediksi->totalX2;
		// echo json_encode($listPrediksi);die();
		$totalPeriode 	= $listPrediksi->total_periode;
		$rataRataX		= $listPrediksi->rataRataX;
		$rataRataY		= $listPrediksi->rataRataY;
		$totalXY 		= $listPrediksi->totalXY;
		$periodeDicari 	= $listPrediksi->periodeDicari-$listPrediksi->total_periode;

		$pembagiB 		= ($totalX2-($totalPeriode*($rataRataX*$rataRataX)))==0? 1 : ($totalX2-($totalPeriode*($rataRataX*$rataRataX)));
		$b 				= ($totalXY - ($totalPeriode * $rataRataX * $rataRataY)) / $pembagiB;
		$a 				= $rataRataY - ($b * $rataRataX);

		$prediksi 		= $a + ($b * $periodeDicari);
		return $prediksi;
	}

	public function getForecast2($id_produk, $start_date, $end_date, $interval, $periodeDicari){
		// echo $start_date;die();
		// print_r($this->session->userdata());die();
		$totalPeriode 	= $this->getTotalPeriode($start_date, $end_date, $interval);
		if($totalPeriode==0) $totalPeriode = 1;
		
		$periodeDicari	= $periodeDicari==null?$totalPeriode + 1:$periodeDicari;

		$totalY			= 0;
		$totalX			= 0;
		$totalX2		= 0;
		$totalXY		= 0;

		$tmp = [];
		for($i=1; $i <= $totalPeriode; $i++){
			if($i != 1) $start_date = date('Y-m-d', strtotime($start_date." +$interval days"));

			/** end date dalam 1 periode **/
			
			$tmpEndDate 	= date('Y-m-d', strtotime($end_date));

			$y 				= $this->getJumlahPenjualanBydate($start_date,$id_produk, $interval, $tmpEndDate);
			$x 				= $i;
			$x2				= $x*$x;
			$xy 			= $y * $x;
			
			$totalY			+= $y;
			$totalX			+= $x;
			$totalX2		+= $x2;
			$totalXY		+= $xy;
		}
		
		$rataRataX		= $totalX / $totalPeriode;
		$rataRataY		= $totalY / $totalPeriode;

		$pembagiB 		= ($totalX2-($totalPeriode*($rataRataX*$rataRataX)))==0? 1 : ($totalX2-($totalPeriode*($rataRataX*$rataRataX)));
		$b 				= ($totalXY - ($totalPeriode * $rataRataX * $rataRataY)) / $pembagiB;
		$a 				= $rataRataY - ($b * $rataRataX);

		$prediksi 		= $a + ($b * $periodeDicari); 

		$dataPrediksi = [
			'periodeDicari'		=> $periodeDicari,
			'prediksi'			=> $prediksi,
			'data'				=> $tmp,
			'rataRataY'			=> $rataRataY,
			"rataRataX"			=> $rataRataX,
			"total_periode"		=> $totalPeriode,
			"total_y"			=> $totalY,
			'totalXY'			=> $totalXY,
			"totalX2"			=> $totalX2,	
		];
		
		return $prediksi; 

	}


	public function getTotalMape($totalGalat, $x){
		
		$totalMape = $totalGalat / $x * 100;
		return number_format($totalMape,2)."%";
	}


	public function getSingleExample($data){
		$firstData = 1;
		foreach ($data as $key => $value) {
			
			return (object)[
				'nilai_n' 	=> $value['data']->periodeDicari-1,
				'total_y'	=> number_format($value['data']->total_y,2),
				'total_x'	=> number_format($value['data']->total_x,2),
				'total_x2'	=> number_format($value['data']->totalX2,2),
				'total_xy'	=> number_format($value['data']->totalXY,2),
				'ratarata_x'=> number_format($value['data']->rataRataX,2),
				'ratarata_y'=> number_format($value['data']->rataRataY,2),
				'nilai_b'	=> number_format($value['data']->nilai_b,2),
				'nilai_a'	=> number_format($value['data']->nilai_a,2),
				'prediksi'	=> number_format($value['data']->prediksi,2)
			];

		}
		
	}

	public function getSingleExample2($data){
		$firstData = 1;
		$result = [];
		// echo json_encode($data);die();
		$totalY			= 0;
		$totalX			= 0;
		$totalX2		= 0;
		$totalXY		= 0;
		$i = 1;
		$periodeDicari = $data->periodeDicari;
		foreach ($data->data as $key => $value) {
			
			// echo json_encode($value['data']->prediksi);die();

			$y 				= $value['data']->prediksi;
			$x 				= $i;
			$x2				= $x*$x;
			$xy 			= $y * $x;
			
			$totalY			+= $y;
			$totalX			+= $x;
			$totalX2		+= $x2;
			$totalXY		+= $xy;
			$i++;
		}
		$totalPeriode   = $data->periodeDicari-1;
		$rataRataX		= $totalX / $totalPeriode;
		$rataRataY		= $totalY / $totalPeriode;

		$pembagiB 		= ($totalX2-($totalPeriode*($rataRataX*$rataRataX)))==0? 1 : ($totalX2-($totalPeriode*($rataRataX*$rataRataX)));
		$b 				= ($totalXY - ($totalPeriode * $rataRataX * $rataRataY)) / $pembagiB;
		$a 				= $rataRataY - ($b * $rataRataX);

		$prediksi 		= $a + ($b * $periodeDicari); 
		$result = [
				'nilai_n' 	=> $totalPeriode,
				'total_y'	=> $totalY,
				'total_x'	=> $totalX,
				'total_x2'	=> $totalX2,
				'total_xy'	=> $totalXY,
				'ratarata_x'=> $rataRataX,
				'ratarata_y'=> $rataRataY,
				'nilai_b'	=> number_format($b,2),
				'nilai_a'	=> number_format($a,2),
				'prediksi'	=> $prediksi
			];
		return (object)$result;

		// echo json_encode($result);die();
		
	}

	

	public function getTanggalByPeriode($periode){
		$start_date = $this->getFirstDate();
		if($periode != 1){		
			$periode = $periode * 7;
			// $periode -= 1;
			return date("Y-m-d",strtotime($start_date." +".$periode." days"));	
		} else {
			return $start_date;
		}
		
	}

	public function getTanggalAwalByPeriode($periode){
		$start_date = $this->getFirstDate();
		if($periode != 1){		
			$periode = $periode * 7;
			// $periode -= 1;
			return date("Y-m-d",strtotime($start_date." +".$periode." days"));	
		} else {
			return $start_date;
		}
		
	}

	public function getTanggalAkhirByPeriode($periode){
		$start_date = $this->getFirstDate();
		if($periode != 1){		
			$periode = $periode * 7;
			$periode -= 1;
			return date("Y-m-d",strtotime($start_date." +".$periode." days"));	
		} else {
			return $start_date;
		}
		
	}

	public function getTanggalAkhir($start_date, $time, $interval){
		$interval = $time * $interval;
		return date('Y-m-d',strtotime($start_date." +$interval days"));
	} 


	public function getSingleItemPrediksi($id_produk, $start_date, $end_date, $no, $totalPeriode, $typeInterval){

		$newTotalPeriode = $this->getTotalPeriodeWithTransactionExists($id_produk, $start_date, $end_date, $totalPeriode, $typeInterval);
		// echo $newTotalPeriode;die();
		$totalY = $this->Mprediksi->getTotalPenjualanPeriode($id_produk,$start_date, $end_date);
		// echo $totalY;die();
		$totalX =  array_sum(range(1,$newTotalPeriode));
		// echo $totalX;die();
		$totalX2 = $this->Mprediksi->getTotalX2($newTotalPeriode);
		// echo $totalX2;die();
		$totalXY = $this->Mprediksi->getTotalXY($id_produk,$totalPeriode,$start_date,$typeInterval)->totalXY;
		// echo $totalXY;die();
		$totalXY2 = $this->Mprediksi->getTotalXY2($id_produk,$totalPeriode,$start_date,$typeInterval);
	    $rataRataY = ($this->rumus->Meany($newTotalPeriode,$totalY));
	    // echo $rataRataY;die();
	    $rataRataX = $this->rumus->Meanx($newTotalPeriode,$totalX);
	    // echo $rataRataX;die();

	    
	    $pembagiB = ($totalX2-($newTotalPeriode*($rataRataX*$rataRataX)))==0? 1 : ($totalX2-($newTotalPeriode*($rataRataX*$rataRataX)));
	    // echo $pembagiB;die();
	    $b   = (($totalXY - ($newTotalPeriode * $rataRataX * $rataRataY)) / $pembagiB);
	    // echo $b;die();
	    $a   = $rataRataY - ($b * $rataRataX);
	    // echo $a;die();
		$y = $this->Mprediksi->getTotalPenjualanPeriode($id_produk,$start_date, $end_date);
		// echo $y;die();
        $x = $newTotalPeriode +1;
        $x2 = $x*$x;
        $xy = $x*$y;
		$prediksi = $a + ($b * ($newTotalPeriode+1)); 
		$error = $y - $prediksi;
		$error = $error < 0 ? $error * -1 : $error;
		$errorKuadrat = $error * $error;
		$y = $y==0?1:$y;
		$galat = $error / $y;
		$totalGalat = $this->getTotalGalat($id_produk, $newTotalPeriode, $start_date, $typeInterval, $a, $b);

		$mape = number_format($totalGalat/$x*100,4);
		$data = (object) [
			'tanggal'	=> $start_date,
			'periode'	=> $newTotalPeriode,
			'demand'	=> $y,
			'prediksi'	=> $prediksi,
			'mape'		=> number_format($mape,2),
			'nilai_n'	=> $totalPeriode,
			'total_y'	=> $totalY,
			'total_x'	=> $totalX,
			'total_x2'	=> $totalX2,
			'total_xy'	=> $totalXY,
			'total_xy2'	=> $totalXY2,
			'nilai_b'	=> $b,
			'nilai_a'	=> $a,
			'interval'	=> $typeInterval,
			'totalGalat'=> $totalGalat,
			'rataRataY' => $totalY / $totalPeriode,
			'rataRataX'	=> $totalX / $totalPeriode
		];

		// var_dump($data);die();
		return $data;
	}



	public function getTotalPenjualanPeriode($id_produk, $start_date, $end_date){
		$row = $this->db->select('sum(jumlah_penjualan) as jumlah')
			->order_by('tanggal_transaksi','asc')
			->where('id_produk',$id_produk)
			->where("tanggal_transaksi >= '$start_date'")
			->where("tanggal_transaksi <= '$end_date'")
			->get('transaksi')->row();
		if($row) return $row->jumlah;
		else return 0;
	}


	public function getTotalPeriodeWithTransactionExists($id_produk, $start_date, $end_date, $totalPeriode, $typeInterval)
	{	
		$newTotalPeriode = 0;
		// echo $typeInterval;die();
		// $totalPeriode += 3;
		// echo $totalPeriode;die();
		for($i=0;$i<$totalPeriode;$i++){
			$current_date = $start_date;
			if($typeInterval == 'weeks'){
				$current_end_date = date('Y-m-d',strtotime($current_date." +1 week"));
				$cek = $this->db->get_where('transaksi',['id_produk'=>$id_produk,'tanggal_transaksi >='=>$current_date,'tanggal_transaksi <='=>$current_end_date])->num_rows();	
				// echo $start_date." - ".$current_end_date." $cek<br/>";
				$start_date = date('Y-m-d', strtotime($start_date." +1 week"));
				$start_date = date('Y-m-d', strtotime($start_date." +1 day"));
			} else {
				$cek = $this->db->get_where('transaksi',['id_produk'=>$id_produk,'tanggal_transaksi'=>$current_date])->num_rows();
				$start_date = date('Y-m-d', strtotime($start_date." +1 day"));	
			}
			// echo $id_produk;
			// echo $current_date."-$cek<br />";	
			if($cek != 0) {
				$newTotalPeriode++;
				// echo $start_date." - ".$end_date."<br/>";	
				
			}
		}
		// die();
		// echo "tanggal";
		// echo $newTotalPeriode;die();
		return $newTotalPeriode;
	}


	public function getFirstDate(){
		return $this->db->select('tanggal_transaksi')->order_by('tanggal_transaksi','asc')->get('transaksi')->row()->tanggal_transaksi;
	}
	

	public function getLastDate(){
		return $this->db->select('tanggal_transaksi')->order_by('tanggal_transaksi','desc')->get('transaksi')->row()->tanggal_transaksi;
	}


	public function getTotalXY($id_produk, $totalPeriode, $start_date, $type){

		$totalXY = 0;
		
		$tmp_start = $start_date;
		if($type == 'weeks'){
			$tmp_end =  date('Y-m-d',strtotime($tmp_start." +6 days"));
				
		} else {
			if($type != 'days'){
				$tmp_end =  date('Y-m-d',strtotime($tmp_start." +1 $type"));
			} else {
				$tmp_end =  $tmp_start;
			}
		}
		
		$totalY = 0;
		$tmpI = 0;
		for($i=0; $i < $totalPeriode; $i++){
			if($i != 0){
				$tmp_start = date('Y-m-d',strtotime($tmp_end." +1 day"));
				if($type == 'weeks'){
					$tmp_end =  date('Y-m-d',strtotime($tmp_start." +6 days"));
						
				} else {
					if($type != 'days'){
						$tmp_end =  date('Y-m-d',strtotime($tmp_start." +1 $type"));
					} else {
						$tmp_end =  $tmp_start;
					}
				}
				
			}
			$y = $this->Mprediksi->getTotalPenjualanPeriode($id_produk,$tmp_start, $tmp_end);
			if($y==0) continue;
			$tmpI++;
			$totalY += $y;
			$x = $i+1;
			$ttl = $tmpI * $y;
			$totalXY += $ttl;

		}
		// echo $totalY;die();
		// echo $totalXY;die();
		return (object)[
			'totalXY'	=> $totalXY
			
		];
	}

	public function getTotalGalat($id_produk, $totalPeriode, $start_date, $type, $a, $b)
	{
		// if($totalPeriode == 1) return 1;
		// echo $totalPeriode;die();
		$totalGalat = 0;
		// $a = 256.09;
		$tmp_start = $start_date;
		if($type == 'weeks'){
			$tmp_end =  date('Y-m-d',strtotime($tmp_start." +6 days"));
				
		} else {
			if($type != 'days'){
				$tmp_end =  date('Y-m-d',strtotime($tmp_start." +1 $type"));
			} else {
				$tmp_end =  $tmp_start;
			}
		}
		
		$maxPeriode = $totalPeriode;

		if($this->input->get('start') && $this->input->get('end')){
			// echo $this->input->get('end');die();
			if(is_int($this->input->get('start')) && is_int($this->input->get('end')))
				$maxPeriode = $this->input->get('end') - $this->input->get('start') + 1;
		}
		// var_dump($maxPeriode);die();
		$tmpI = 1;
		for($i=0; $i <=$maxPeriode; $i++){
			if($i != 0){
				$tmp_start = date('Y-m-d',strtotime($tmp_end." +1 day"));
				if($type == 'weeks'){
					$tmp_end =  date('Y-m-d',strtotime($tmp_start." +6 days"));
						
				} else {
					if($type != 'days'){
						$tmp_end =  date('Y-m-d',strtotime($tmp_start." +1 $type"));
					} else {
						$tmp_end =  $tmp_start;
					}
				}
				
			}
			// echo $tmp_start." - ".$tmp_end."<br/>";
			$y = $this->Mprediksi->getTotalPenjualanPeriode($id_produk,$tmp_start, $tmp_end);
			$x = $tmpI;
			$x2 = $x*$x;
	        $xy = $x*$y;
	        $prediksi = $a + ($b * $x); 

	        $error = $y - $prediksi;
	        $error = $error < 0 ? $error * -1 : $error;
	        $errorKuadrat = $error * $error;
	        if($y != 0){
	        	$tmpI++;
				$galat = number_format($error / $y,4);
		        $totalGalat += $galat;
		        // echo $tmp_start." - ".$tmp_end." - ";
		        // echo $galat ."<br/>";
	        }
	        
	        

		}
		// die();
		// echo "$a + ($b)"."<br/>";
		// die();
		// echo $totalGalat;die();
		return $totalGalat;
		
	}

	public function getTotalXY2($id_produk, $totalPeriode, $start_date, $interval){

		$total = 0;
		$tmp_start = $start_date;
		$tmp_end =  date('Y-m-d',strtotime($tmp_start." +".$interval." days"));
		$intervalDays = $interval;
		for($i=0; $i < $totalPeriode; $i++){
			if($i != 0){
				if($interval == 0) $intervalDays = 1;
				$tmp_start = date('Y-m-d',strtotime($tmp_start." +".$intervalDays." days"));
				$tmp_end   = date('Y-m-d',strtotime($tmp_start." +".$interval." days"));
			}
			$ttl = ($i+1) * $this->Mprediksi->getTotalPenjualanPeriode($id_produk,$tmp_start, $tmp_end);
			$total += $ttl;
			

		}
		return $total;
	}

	public function getTotalX2($totalPeriode){
		$total = 0;
		for($i=1;$i<=$totalPeriode;$i++){
			$total += ($i*$i);
		}
		return $total;
	}


}
