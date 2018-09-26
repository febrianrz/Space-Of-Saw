        <!-- ========== MULAI PAGE WRAPPER ========== -->
        <div class="page-wrapper">


            <!-- ========== MULAI BREAD CRUMB ========== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Hasil Prediksi Hari Berikutnya</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda');?>">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Prediksi');?>">Prediksi</a></li>
                        <li class="breadcrumb-item active">Hasil Prediksi Hari Berikutnya</li>
                    </ol>
                </div>
            </div>
            <!-- ========== SELESAI BREAD CRUMB ========== -->


            <!-- ========== MULAI CONTAINER FLUID  ========== -->
            <div class="container-fluid">


                <!-- ========== MULAI PAGE CONTENT ========== -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="margin:0%;">


                            <!-- ========== MULAI CARD BODY ========== -->
                            <div class="card-body" style="padding: 5%;">


                                <!-- ========== MULAI CARD TITLE ========== -->
                                <div class="card-title">
                                    <h2 style="text-align: center">Hasil Prediksi Kue <?=$produk->nama_produk;?></h2>
                                    <hr style="border-width: 3px;">
                                </div>
                                <!-- ========== SELESAI CARD TITLE ========== -->


                                <!-- ========== MULAI NAV TAB ========== -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tabel" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Tabel Prediksi</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#grafik" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Grafik</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#perhitungan" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Perhitungan Prediksi</span></a> </li>
                                    
                                </ul>
                                <!-- ========== SELESAI NAV TABS ========== -->



                                <!-- ========== MULAI TAB PANES ========== -->
                                <div class="tab-content tabcontent-border">


                                    <!-- ========== MULAI TAB PERTAMA ========== -->
                                    <div class="tab-pane active" id="tabel" role="tabpanel">
                                        <div class="p-20">


                                            <!-- ========== MULAI TABLE ========== -->
                                            <div class="row">
                                                <div class="col-md-12">
                                                <p>        
                                                    <h5>
                                                    Tabels prediksi periode terakhir (hari berikutnya) untuk semua jenis kue:
                                                    </h5>
                                                </p>
                                                </div>
                                            </div>
                                            

                                            <div class="table-responsive m-t-40">
                                                <table id="" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No.</th>
                                                            <th class="text-center">Tanggal Awal</th>
                                                            <th class="text-center">Tanggal Akhir</th>
                                                            <th class="text-center">Total</th>
                                                            <th class="text-center">Time</th>
                                                            <th class="text-center">Forcast</th>
                                                            <th class="text-center">Error</th>
                                                            <th class="text-center">Error2</th>
                                                            <th class="text-center">Galat</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no=1;?>
                                                        <?php $graf_tgl=[];?>
                                                        <?php $graf_pre=[];?>
                                                        <?php $graf_pen=[];?>
                                                        <?php 
                                                        $totalXY = $this->Mprediksi->getTotalXY($produk->id_produk,$totalPeriode,$start_date,$typeInterval)->totalXY;
                                                        $totalY = $this->Mprediksi->getTotalPenjualanPeriode($produk->id_produk,$start_date, $end_date);
                                                        $rataRataX = $this->rumus->Meanx($totalPeriode,$totalX);
                                                        $rataRataY = $this->rumus->Meany($totalPeriode,$totalY);
                                                        $totalX2 = $this->Mprediksi->getTotalX2($totalPeriode);
                                                        $pembagiB = ($totalX2-($totalPeriode*($rataRataX*$rataRataX)))==0? 1 : ($totalX2-($totalPeriode*($rataRataX*$rataRataX)));
                                                        $b   = ($totalXY - ($totalPeriode * $rataRataX * $rataRataY)) / $pembagiB;
                                                        $a   = $rataRataY - ($b * $rataRataX);
                                                        
                                                        foreach($results as $result):?>
                                                            <?php 
                                                                $y = $this->Mprediksi->getTotalPenjualanPeriode($produk->id_produk,$result['tanggal_awal'], $result['tanggal_akhir']);
                                                                $x = $no;
                                                                $x2 = $x*$x;
                                                                $xy = $x*$y;
                                                                $prediksi = $a + ($b * $no); 
                                                                $error = $y - $prediksi;
                                                                $error = $error < 0 ? $error * -1 : $error;
                                                                $errorKuadrat = $error * $error;
                                                                $y = $y==0?1:$y;
                                                                $galat = $error / $y;

                                                                
                                                            ?>
                                                            <?php array_push($graf_tgl, date('d/m/Y',strtotime($result['tanggal_awal'])));?>
                                                            <?php array_push($graf_pre,number_format($prediksi,2));?>
                                                            <?php array_push($graf_pen,number_format($y,2));?>
                                                            <tr>
                                                                <th class="text-center"><?=$no;?></th>
                                                                <th class="text-center"><?=$result['tanggal_awal'];?></th>
                                                                <th class="text-center"><?=$result['tanggal_akhir'];?></th>
                                                                <th class="text-center"><?=$y;?></th>
                                                                <th class="text-center"><?=$x;?></th>
                                                                <th class="text-center"><?=number_format($prediksi,2);?></th>
                                                                <th class="text-center"><?=number_format($error,4);?></th>
                                                                <th class="text-center"><?=number_format($errorKuadrat,4);?></th>
                                                                <th class="text-center"><?=number_format($galat,4);?></th>
                                                            </tr>
                                                            <?php $no++;?>
                                                        <?php endforeach;?>
                                                       
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- ========== SELESAI TABLE ========== -->
                                            

                                        </div>
                                    </div>
                                    <!-- ========== SELESAI TAB PERTAMA ========== -->




                            
                                    <!-- ========== MULAI TAB KEDUA ========== --> 
                                    <div class="tab-pane p-20" id="grafik" role="tabpanel">

                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
                                        <canvas id="myChart" width="600" height="400"></canvas>
                                        <script>
                                        var ctx = document.getElementById("myChart").getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'line',
                                            data: {
                                                labels: <?php echo json_encode($graf_tgl);?>,
                                                // labels: ["a","b","c","d","e","f"],

                                                datasets: [{
                                                    label: '# Prediksi',
                                                    // data: [12, 19, 3, 5, 2, 3],
                                                    data: <?php echo json_encode($graf_pre);?>,
                                                    fill: false,

                                                    backgroundColor: [
                                                        // 'rgba(0, 99, 32, 0.2)',
                                                        // 'rgba(0, 162, 235, 0.2)',
                                                        // 'rgba(255, 206, 86, 0.2)',
                                                        'rgba(75, 192, 192, 0.2)',
                                                        // 'rgba(153, 102, 255, 0.2)',
                                                        // 'rgba(255, 159, 64, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        // 'rgba(255,99,132,1)',
                                                        // 'rgba(54, 162, 235, 1)',
                                                        // 'rgba(255, 206, 86, 1)',
                                                        'rgba(75, 192, 192, 1)',
                                                        // 'rgba(153, 102, 255, 1)',
                                                        // 'rgba(255, 159, 64, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }, 

                                                {
                                                    label: '# Data Penjualan',

                                                    // data: [17, 1, 5, 8, 2, 3],
                                                    data: <?php echo json_encode($graf_pen);?>,
                                                    fill: false,

                                                    backgroundColor: [
                                                        // 'rgba(255, 99, 132, 0.2)',
                                                        // 'rgba(54, 162, 235, 0.2)',
                                                        // 'rgba(255, 206, 86, 0.2)',
                                                        // 'rgba(75, 192, 192, 0.2)',
                                                        // 'rgba(153, 102, 255, 0.2)',
                                                        'rgba(255, 159, 64, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        // 'rgba(255,99,132,1)',
                                                        // 'rgba(54, 162, 235, 1)',
                                                        // 'rgba(255, 206, 86, 1)',
                                                        // 'rgba(75, 192, 192, 1)',
                                                        // 'rgba(153, 102, 255, 1)',
                                                        'rgba(255, 159, 64, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }
                                                ]
                                            },
                                            options: {
                                                scales: {
                                                    yAxes: [{
                                                        ticks: {
                                                            beginAtZero:true
                                                        }
                                                    }]
                                                }
                                            }
                                        });
                                        </script>
                                </div>
                                <!-- ========== SELESAI TAB KEDUA ========== -->



                                <!-- ========== MULAI TAB KETIGA ========== -->
                                <div class="tab-pane p-20" id="perhitungan" role="tabpanel">
                                    <div class="row">
                                            <div class="col-md-6">
                                                <p><b>RUMUS : </b></p>
                                                <p>Yt &nbsp     = a + b.x</p>
                                                <p>a &nbsp      = ( Ybar ) - ( ( b) . ( Xbar ) )</p>
                                                <p>b &nbsp      = ( Total xy - ( ( n ) . ( Xbar ) . ( Ybar ) ) ) &nbsp/ &nbsp ( Totalx^2 - ( n ) . ( Xbar^2 ) ) </p>
                                                <p>Xbar &nbsp   = Total x / n </p>
                                                <p>Ybar &nbsp   = Total y / n</p>
                                                <br>
                                                <br>
                                                <P><b>KETERANGAN : </b></P>
                                                <p>1. Yt   = Prediksi Yang Akan Dicari</p>
                                                <p>2. a    = Perpotongan Garis </p>
                                                <p>3. b    = Kemiringan Garis Regresi</p>
                                                <p>4. Xbar = Rata-rata x</p>
                                                <p>5. Ybar = Rata-rata y</p>
                                                <p>6. y     = Penjualan</p>
                                                <p>7. x     = Periode </p>
                                                <p>8. x^2   = x Kuadrat</p>
                                                <p>9. xy   = Perkalian x.y</p>
                                                <p>10. n    = Banyaknya Data</p>

                                                <p>11. Total x = Total Periode</p>
                                                <p>12. Total y = Total Penjualan</p>
                                                <p>12. Total x^2 = Total Penjumlahan x kuadrat</p>
                                                <p>12. Total xy = Total Penjumlahan xy</p>

                                                

                                            </div>
                                            <div class="col-md-6">
                                              
                                                <p><b>DIKETAHUI :</b></p>
                                                <p>n = <?php echo $totalPeriode;  ?></p>
                                                <p>Total y = <?php echo $totalY;  ?></p>
                                                <p>Total x = <?php echo $totalX;  ?></p>
                                                <p>Total x^2 = <?php echo $totalX2;  ?></p>
                                                <p>Total xy = <?php echo $totalXY;  ?></p>
                                                <br>
                                                <br>
                                                <p><b>PERHITUNGAN :</b></p>
                                                <p>Menghitung Ybar = Total y / n = <?php echo $rataRataY;  ?> </p>
                                                <p>Menghitung Xbar = Total x / n = <?php echo $rataRataX;  ?> </p>
                                                <p>Menghitung b : <br> =  ( Total xy - ( ( n ) . ( Xbar ) . ( Ybar ) ) ) &nbsp/ &nbsp ( Totalx^2 - ( n ) . ( Xbar^2 ) )<br> =  <?php echo number_format($b,2);  ?> </p>
                                                <p>Menghitung a : <br> = ( Ybar ) - ( b) . ( Xbar ) <br> = <?php echo number_format($a,2);  ?></p>
                                                <h4><p>Maka, <b>Persamaan Yx  <br> = a + b.x <br> = <?php echo number_format($a,2)." + ((".number_format($b,2).") . X)"; ?></b></p></h4>
                                                
                                            </div>
                                        </div>
                                </div>
                                <!-- ========== SELESAI TAB KETIGA ========== -->


                                
                            </div> 
                            <!-- ========== SELESAI TAB PANES ========== -->
                                                                

                            <!-- <?php
                                
                            ?> -->

                        </div>
                        <!-- ========== SELESAI CARD BODY ========== -->

                        
                    </div>                 
                </div>
            </div>
            <!-- ========== SELESAI PAGE CONTANT ========== -->


        </div>
        <!-- ========== SELESAI PAGE CONTANT ========== -->
        <!-- SELESAI CONTAINER FLUID  -->
        <!-- </div> -->
        <!-- SELESAI PAGE WRAPPER  -->

<?php $this->load->view('admin/vfooter'); ?> 