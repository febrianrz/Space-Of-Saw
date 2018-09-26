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
                                    <h2 style="text-align: center">Hasil Prediksi Hari Berikutnya</h2>
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
                                                    <form class="form-inline" action="" method="get">
                                                      <div class="form-group">
                                                        <label for="email">Tanggal Awal:</label>
                                                        &nbsp;&nbsp;
                                                        <input type="date" name="start" required="required" class="form-control" value="<?=$start_date;?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="pwd">&nbsp;&nbsp;Periode Akhir:</label>
                                                        &nbsp;&nbsp;
                                                        <input type="date" name="end" required="required" class="form-control" value="<?=$end_date;?>">
                                                      </div>
                                                      
                                                      &nbsp;&nbsp;
                                                      <button type="submit" class="btn btn-default">Submit</button>
                                                    </form>

                                                <p>        
                                                    <h5>
                                                    Tabel prediksi periode terakhir (hari berikutnya) untuk semua jenis kue:
                                                    </h5>
                                                </p>
                                                </div>
                                            </div>
                                            <div class="table-responsive m-t-40">
                                                <table id="" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No.</th>
                                                            <th class="text-center">Nama Kue</th>
                                                            <th class="text-center">Periode</th>
                                                            <th class="text-center">Hasil Prediksi</th>
                                                            <th class="text-center">MAPE %</th>
                                                            <th class="text-center">Detail</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no=1;?>
                                                        <?php $graf_kue=[];?>
                                                        <?php $graf_pre=[];?>
                                                        <?php $graf_pen=[];?>
                                                        <?php $n = $maxPeriode;?>
                                                        
                                                        <?php foreach($cakes as $cake):?>
                                                            <?php 
                                                            $prediksiItem = $this->Mprediksi->getSingleItemPrediksi($cake->id_produk,$start_date, $end_date,$no, $maxPeriode, $typeInterval);
                                                            if($no==1){
                                                                $exPrediksiItem = $prediksiItem;
                                                            }
                                                            ?>
                                                            <?php array_push($graf_kue, $cake->nama_produk);?>
                                                            <?php array_push($graf_pre,number_format($prediksiItem->prediksi,2));?>
                                                            <?php array_push($graf_pen,number_format($prediksiItem->demand,2));?>
                                                            <tr>
                                                                <td class="text-center"><?=$no;?></td>
                                                                <td class="text-left"><?=$cake->nama_produk;?></td>
                                                                <td class="text-center"><?=$periodeDicari;?></td>
                                                                <td class="text-center"><?=number_format($prediksiItem->prediksi,2);?></td>
                                                                <td class="text-center"><?=$prediksiItem->mape;?></td>
                                                                <td><a class="btn btn-success btn-xs" href="<?=base_url('PrediksiSemuaKue/detail?id_produk='.$cake->id_produk."&start=$start_date&end=$end_date&typeInterval=$typeInterval");?>">Lihat Rincian</a></td>
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



                                        <!-- <?php echo json_encode($graf_kue);?> -->


                                        
                                    <!-- ========== MULAI TAB KEDUA ========== --> 
                                    <div class="tab-pane p-20" id="grafik" role="tabpanel">

                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
                                        <canvas id="myChart" width="100%" height="100%" style="padding-right: 10%; padding-left: 10%"></canvas>
                                        <script>
                                        var ctx = document.getElementById("myChart").getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'horizontalBar',
                                            data: {
                                                // labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],

                                                labels: <?php echo json_encode($graf_kue);?>,
                                                datasets: [{
                                                    label: 'Nama Kue',
                                                    // data: [11, 12, 13, 14, 15],
                                                    data: <?php echo json_encode($graf_pre);?>,
                                                    backgroundColor: [
                                                        'rgba(255, 99, 132, 0.2)',
                                                        'rgba(54, 162, 235, 0.2)',
                                                        'rgba(255, 206, 86, 0.2)',
                                                        'rgba(75, 192, 192, 0.2)',
                                                        'rgba(153, 102, 255, 0.2)',
                                                        'rgba(255, 159, 64, 0.2)'
                                                    ],
                                                    borderColor: [
                                                        'rgba(255,99,132,1)',
                                                        'rgba(54, 162, 235, 1)',
                                                        'rgba(255, 206, 86, 1)',
                                                        'rgba(75, 192, 192, 1)',
                                                        'rgba(153, 102, 255, 1)',
                                                        'rgba(255, 159, 64, 1)'
                                                    ],
                                                    borderWidth: 1
                                                }]
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
                                                <p>n = <?php echo $n;  ?></p>
                                                <p>Total y = <?php echo $exPrediksiItem->demand;  ?></p>
                                                <p>Total x = <?php echo $exPrediksiItem->total_x;  ?></p>
                                                <p>Total x^2 = <?php echo $exPrediksiItem->total_x2;  ?></p>
                                                <p>Total xy = <?php echo $exPrediksiItem->total_xy;  ?></p>
                                                <br>
                                                <br>
                                                <p><b>PERHITUNGAN :</b></p>
                                                <p>Menghitung Ybar = Total y / n = <?php echo $exPrediksiItem->rataRataY;  ?> </p>
                                                <p>Menghitung Xbar = Total x / n = <?php echo $exPrediksiItem->rataRataX;  ?> </p>
                                                <p>Menghitung b : <br> =  ( Total xy - ( ( n ) . ( Xbar ) . ( Ybar ) ) ) &nbsp/ &nbsp ( Totalx^2 - ( n ) . ( Xbar^2 ) )<br> =  <?php echo $exPrediksiItem->nilai_b;  ?> </p>
                                                <p>Menghitung a : <br> = ( Ybar ) - ( b) . ( Xbar ) <br> = <?php echo $exPrediksiItem->nilai_a;  ?></p>
                                                <h4><p>Maka, <b>Persamaan Yx  <br> = a + b.x <br> = <?php echo $exPrediksiItem->prediksi; ?></b></p></h4>
                                                
                                            </div>
                                        </div>
                                </div>
                                <!-- ========== SELESAI TAB KETIGA ========== -->


                                
                            </div> 
                            <!-- ========== SELESAI TAB PANES ========== -->
                                                                

                            <!-- <?php
                                echo "<h3>Hasil Prediksi</h3>";
                                echo "<br>Tanggal : ";
                                echo "<br><br>Prediksi Terbesar : ".$max_prediksi;
                                echo "<br>Nama Kue : ";
                                echo "<br><br>Prediksi Terkecil : ".$min_prediksi;
                                echo "<br>Nama Kue : ";
                                echo "<br><br>MAPE terkecil :  ";
                                echo "<br>Nama Kue : ";
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