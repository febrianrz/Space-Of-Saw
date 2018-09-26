        <!-- MULAI PAGE WRAPPER  -->
        <div class="page-wrapper">
            <!-- MULAI BREAD CRUMB -->
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
            <!-- SELESAI BREAD CRUMB -->

            <!-- MULAI CONTAINER FLUID  -->
            <div class="container-fluid">
                <!-- MULAI PAGE CONTENT -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" style="margin:0%;">
                            

                            <!-- MULAI CARD BODY -->
                            <div class="card-body" style="padding: 5%;">
                                <div class="card-title">
                                    <h2 style="text-align: center;">Prediksi Kue <?php echo $nama_kue; ?> </h2>
                                    <hr style="border-width: 3px;">
                                </div>
                            
                                <!-- MULAI TABLE -->
                                <!-- <h4 class="card-title">Data Table</h4>
                                <h6 class="card-subtitle">Data table example</h6> -->
                                <div>
                                    <h4>
                                    Persamaan Y = <?php echo $j_prediksi; ?>
                                        
                                    </h4>
                                </div>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                    <!-- <table class="table table-hover table-bordered"> -->
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
                                <!-- SELESAI TABLE -->
                            </div>
                        </div>
                        <!-- SELESAI CARD PERTAMA -->

                        <!-- <div class="card" style="margin:0%;">
                            <div class="card-body" style="padding-top:1%%; padding-right: 5%; padding-left: 5%;padding-bottom: 2%"> -->
                                <!-- MULAI KOTAK -->
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
                                <!-- SELESAI MULAI KOTAK -->

                            <!-- </div> -->
                            <!-- SELESAI CARD BODY -->

                        <!-- </div> -->
                        <!-- SELESAI CARD PERTAMA-->

                    </div>
                </div>
                <!-- SELESAI PAGE CONTENT -->


            </div>
            <!-- SELESAI CONTAINER FLUID  -->
        </div>
        <!-- SELESAI PAGE WRAPPER  -->

<?php $this->load->view('admin/vfooter'); ?> 