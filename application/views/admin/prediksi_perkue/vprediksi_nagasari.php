        <!-- ========== MULAI PAGE WRAPPER ========== -->
        <div class="page-wrapper">


            <!-- ========== MULAI BREAD CRUMB ========== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Hasil Prediksi Per Kue</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda');?>">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Prediksi');?>">Prediksi</a></li>
                        <li class="breadcrumb-item active">Hasil Prediksi Per Kue</li>
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
                                    <h2 style="text-align: center;">Prediksi Kue <?php echo $nama_kue; ?> </h2>
                                    <hr style="border-width: 3px;">
                                </div>
                                <!-- ========== SELESAI CARD TITLE ========== -->


                                <!-- ========== MULAI NAV TAB ========== -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#tabel" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Tabel Prediksi</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#grafik" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Grafik</span></a> </li>
                                    
                                </ul>
                                <!-- ========== SELESAI NAV TABS ========== -->


                                <!-- ========== MULAI TAB PANES ========== -->
                                <div class="tab-content tabcontent-border">


                                    <!-- ========== MULAI TAB PERTAMA ========== -->
                                    <div class="tab-pane active" id="tabel" role="tabpanel">
                                        <div class="p-20">


                                            <!-- ========== MULAI TABLE ========== -->
                                            <div>
                                                <h4>
                                                Persamaan Y = <?php echo $j_prediksi; ?>
                                                    
                                                </h4>
                                            </div>
                                            <div class="table-responsive m-t-40">
                                                <table id="myTable" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Periode</th>
                                                            <th>Tanggal</th>
                                                            <th>Jumlah Penjualan</th>
                                                            <th>Hasil Prediksi</th>
                                                            <th>Error</th>
                                                            <th>Error Kuadrat</th>
                                                            <th>Galat</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <?php 
                                                            echo $tabelprediksi_nagasari;
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- ========== SELESAI TABLE ========== -->


                                            <!-- ========== MULAI KOTAK ========== -->
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="card bg-pink p-20">
                                                        <div class="media widget-ten">
                                                            <div class="media-left meida media-middle">
                                                                <span><i class="ti-bag f-s-40"></i></span>
                                                            </div>
                                                            <div class="media-body media-text-right">
                                                                <h2 class="color-white"><?php echo $periode_berikutnya; ?></h2>
                                                                <p class="m-b-0">Periode Berikutnya</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card bg-danger p-20">
                                                        <div class="media widget-ten">
                                                            <div class="media-left meida media-middle">
                                                                <span><i class="ti-bag f-s-40"></i></span>
                                                            </div>
                                                            <div class="media-body media-text-right">
                                                                <h2 class="color-white"><?php echo $tgl_berikutnya; ?></h2>
                                                                <p class="m-b-0">Tanggal Penjualan</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card bg-success p-20">
                                                        <div class="media widget-ten">
                                                            <div class="media-left meida media-middle">
                                                                <span><i class="ti-vector f-s-40"></i></span>
                                                            </div>
                                                            <div class="media-body media-text-right">
                                                                <h2 class="color-white"><?php echo $prediksi_berikutnya; ?></h2>
                                                                <p class="m-b-0">Prediksi Berikutnya</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ========== SELESAI KOTAK ========== -->


                                        </div>
                                    </div>
                                    <!-- ========== SELESAI TAB PERTAMA ========== -->


                                    <!-- ========== MULAI TAB KEDUA ========== -->
                                    <div class="tab-pane p-20" id="grafik" role="tabpanel">
                                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
                                        <canvas id="myChart" width="500" height="400"></canvas>
                                        <script>
                                        var ctx = document.getElementById("myChart").getContext('2d');
                                        var myChart = new Chart(ctx, {
                                            type: 'line',
                                            data: {
                                                // labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                                                labels: <?php echo json_encode($graf_tgl);?>,

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
                                                // datasets: [{
                                                //     label: '# of Votes',
                                                //     data: [10, 35, 3, 15, 2, 3],
                                                //     backgroundColor: [
                                                //         'rgba(255, 99, 132, 0.2)',
                                                //         'rgba(54, 162, 235, 0.2)',
                                                //         'rgba(255, 206, 86, 0.2)',
                                                //         'rgba(75, 192, 192, 0.2)',
                                                //         'rgba(153, 102, 255, 0.2)',
                                                //         'rgba(255, 159, 64, 0.2)'
                                                //     ],
                                                //     borderColor: [
                                                //         'rgba(255,99,132,1)',
                                                //         'rgba(54, 162, 235, 1)',
                                                //         'rgba(255, 206, 86, 1)',
                                                //         'rgba(75, 192, 192, 1)',
                                                //         'rgba(153, 102, 255, 1)',
                                                //         'rgba(255, 159, 64, 1)'
                                                //     ],
                                                //     borderWidth: 1
                                                // }]

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


                                </div>  
                                <!-- ========== SELESAI TAB PANES ========== -->


                            </div>
                            <!-- ========== SELESAI CARD BODY ========== -->


                        </div>
                    </div>
                </div>
                <!-- ========== SELESAI PAGE CONTANT ========== -->


            </div>
            <!-- ========== SELESAI CONTAINER FLUID ========== -->
            

        <?php $this->load->view('admin/vfooter'); ?> 

        <!-- ========== SELESAI PAGE WRAPPER ========== -->
