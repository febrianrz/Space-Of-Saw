public function ramal_e_01(){
		$isipredik = $this->m_forecast->CheckTable('tb_prediksi_e_01');
		// Mengecek apakah tabel kosong kalau kosng insert kalau berisi delete all
		if ($isipredik == 0 ) 
		{
			$data = $this->m_forecast->DataEkspor('ID01');

			// mencari jumlah periode
			$sp = $this->m_forecast->GetSumTableEkspor('ID01');
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
	   
	        // Perulangan untuk mendapatkan formula y=a+bx
			for ($i=0; $i<$sumperiode; $i++) {
				$x = $i+1; // membuat periode waktu(x)
				$xsquare = $x*$x; // membuat x kuadrat
				$nilai = $data[$i]['e_nilai']; // memanggil nilai dari tabel
				$xy = $x * $nilai; //membuat nilai periode dikali nilai (XY)
				$sumx += $x; // jumlah x
				$sumxsquare += $xsquare; // jumlah x kuadrat
				$sumnilai += $nilai; // jumlah nilai
				$sumxy += $xy; //  jumlah xy
			}

			// membuat nilai rata-rata
			$rtx = $this->rumus->Meanx($sumperiode,$sumx);
			$rty = $this->rumus->Meany($sumperiode,$sumnilai);

			// mencari nilai a dan b dari rumus y=a+bx
			$b = round($this->rumus->Carib($sumxy,$sumxsquare,$sumperiode,$rtx,$rty),2);
			$a = round($this->rumus->Caria($rty,$rtx,$b),2);

			// Perulangan untuk mencari hasil ramal per periode dan error
			for ($i=0; $i<$sumperiode ; $i++) { 
				// mencari nilai prediksi per periode dari library
				$x = $i+1;
				$prediksi = round($this->rumus->Prediksi($a,$b,$x),2);
				$tahun = $data[$i]['tahun'];

				// mencari nilai error per periode rumus e = y - y'
				$nil = $data[$i]['e_nilai'];
				$error = round($nil - $prediksi,2);
				$abserror = abs($error); // nilai absolut error
				$sumerror += $abserror; // membuat jumlah absolute error
				$gr = $abserror/$nil; // mencari nilai galat relatif
				$sumgr += $gr;

				$data_prediksi = array(
								'no' => $x,
		       					'tahun' => $data[$i]['tahun'],
		       					'y' => $nil,
		       					'y_aksen' => $prediksi,
		       					'error' => $error,
		       					'error_rel' => $gr
							);


				$res = $this->m_forecast->InsertData('tb_prediksi_e_01', $data_prediksi);
			}

			// Menghtung rata-rata galat relatif
			$rgr = $sumgr/$sumperiode;

			// Perulangan untuk prediksi 1 periode kedepan
			// rubah penjumlahan newperiode sesuai periode yang diinginkan
			$newperiode = $i + 1;
			$newtahun = $tahun;
			$no = 0;

			for ($z=$i; $z<$newperiode; $z++)
			{ 
				$no++;
				$x = $z+1;
				$newtahun++; 
				$prediksi = $this->rumus->Prediksi($a,$b,$x);

				// data input ke tabel prediksi
				$data_prediksi = array(
								'no' => $x,
		       					'tahun' => $newtahun,
		       					'y_aksen' => $prediksi
							);

				// data update ke tabel result
				$data_result = array(
								'no' => 1,
								'tahun' => $newtahun,
								'prediksi' => $prediksi,
								'rgr' => $rgr,
								'a' => $a,
								'b' => $b,
								'id_industri' => 'ID01',
							);
				$where = array(
							'id_industri' => 'ID01' 
						);

						
				// Pengecekan tabel result apakah sudah terdapat data prediksi pada 1 industri
				$isiresult = $this->m_forecast->CheckTableRes('tb_result_ekspor','ID01');
				if ($isiresult == 1) 
				{
					$res = $this->m_forecast->UpdateData('tb_result_ekspor', $data_result, $where);
				}

				else
				{
					$res = $this->m_forecast->InsertData('tb_result_ekspor', $data_result);
				}

				$res = $this->m_forecast->InsertData('tb_prediksi_e_01', $data_prediksi);
			}


			// Memformat data ke JSON 
			$data = $this->m_forecast->DataGrafik('tb_prediksi_e_01');
			json_encode($data,TRUE);
		    $fp = fopen('./assets/dashboard/json/ekspor/e_prediksi_id01.json', 'w');
		    fwrite($fp, json_encode($data));
		} 

			else 

			{
			// mengosongkan tabel prediksi jika data tidak kosong
			$res = $this->m_forecast->EmptyTable('tb_prediksi_e_01');
			$this->ramal_e_01();
			}
	}