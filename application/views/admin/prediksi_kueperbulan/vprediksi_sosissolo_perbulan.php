        <!-- MULAI PAGE WRAPPER  -->
        <div class="page-wrapper">
            <!-- MULAI BREAD CRUMB -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Hasil Prediksi/Kue</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda');?>">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Analisis');?>">Prediksi</a></li>
                        <li class="breadcrumb-item active">Hasil Prediksi</li>
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
                            <div class="card-title">
                                <h2 style="text-align: center;">Prediksi Kue Sosis Solo</h2>
                                <hr>
                            </div>

                            <!-- MULAI CARD BODY -->
                            <div class="card-body" style="padding:5%;">
                                <div class="dropdown">
                                    <a class="btn btn-success m-b-10 m-l-5 dropdown-toggle" data-toggle="dropdown">Jenis Kue </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_nagasari/');?>">Nagasari</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_sosissolo_april/');?>">Sosis Solo</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_risolmayonaise/');?>">Risol Mayonaise</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_kuelumpur/');?>">Kue Lemper</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_boluwarna/');?>">Bolu Warna</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_bolugulamerah/');?>">Bolu Gula Merah</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_bikaambon/');?>">Bika Ambon</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_kuesus/');?>">Kue Sus</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_kuepepe/');?>">Kue Pepe</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_lapisberas/');?>">Lapis Beras</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_rotigoreng/');?>">Roti Goreng</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_pastel/');?>">Pastel</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_putuayu/');?>">Putu Ayu</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_lemperbakar/');?>">Lemper Bakar</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_cucur/');?>">Cucur</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_piesusu/');?>">Pie Susu</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_flacoklat/');?>">Fla Coklat</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_rollgood/');?>">Roll Good</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_dadargulung/');?>">Dadar Gulung</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_rotigulung/');?>">Roti Gulung</a></li>
                                        
                                    </ul>
                                </div>
                                <!-- <div>
                                    <select class="btn btn-success">
                                        <option class="btn btn-success">
                                            <a href="<?php echo base_url('Prediksi/prediksi_nagasari/');?>" class="btn btn-success m-b-10 m-l-5"><i class="fa fa-print"> Kue Nagasari</i></a>
                                        </option>
                                    </select>
                                </div> -->
                                <div class="dropdown">
                                    <a class="btn btn-success m-b-10 m-l-5 dropdown-toggle" data-toggle="dropdown">Bulan </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_sosissolo_april/');?>">April</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_sosissolo_mei/');?>">Mei</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_sosissolo_juni/');?>">Juni</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_sosissolo_juli/');?>">Juli</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_sosissolo_agustus/');?>">Agustus</a></li>
                                    </ul>
                                </div>
                                <div>
                                
                                <a href="" class="btn btn-success m-b-10 m-l-5"><i class="fa fa-print"> Print</i></a>
                                </div>

                                <!-- MULAI TABLE -->
                                <!-- <h4 class="card-title">Data Table</h4>
                                <h6 class="card-subtitle">Data table example</h6> -->
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                    <!-- <table class="table table-hover table-bordered"> -->
                                        <thead>
                                            <tr>
                                                <th>Periode</th>
                                                <th>Tanggal Penjualan</th>
                                            <!--     <th>Nama Kue</th> -->
                                                <th>Jumlah Penjualan</th>
                                                <th>Hasil Prediksi</th>
                                                <th>Error</th>
                                                <!-- <th>Prediksi</th> -->
                                                <th>Galat</th>
                                                <!-- <th>Rata-rata Galat</th> -->
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php 
                                                echo $tabelprediksi_sosissolo_perbulan;
                                                
                                            ?>

                                            <?php
                                                echo $tabelprediksi_sosissolo_perbulan_mei;
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- SELESAI TABLE -->
                            </div>
                            <!-- SELESAI CARD BODY -->

                        </div>
                    </div>
                </div>
                <!-- SELESAI PAGE CONTENT -->
            </div>
            <!-- SELESAI CONTAINER FLUID  -->
        </div>
        <!-- SELESAI PAGE WRAPPER  -->

<?php $this->load->view('admin/vfooter'); ?> 