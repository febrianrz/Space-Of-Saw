        <!-- MULAI PAGE WRAPPER  -->
        <div class="page-wrapper">
            <!-- MULAI BREAD CRUMB -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Hasil Prediksi Bulan Berikutnya</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda');?>">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Prediksi');?>">Prediksi</a></li>
                        <li class="breadcrumb-item active">Hasil Prediksi Bulan Berikutnya</li>
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
                                <h2 style="text-align: center;">Hasil Prediksi Kue Nagasari Pada Bulan Berikutnya</h2>
                                <hr>
                            </div>

                            <!-- MULAI CARD BODY -->
                            <div class="card-body" style="padding:5%;">
                                <div class="dropdown">
                                    <a class="btn btn-success m-b-10 m-l-5 dropdown-toggle" data-toggle="dropdown">Prediksi Kue </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url('Prediksi');?>">Nagasari</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_sosissolo_berikutnya/');?>">Sosis Solo</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_risolmayonaise_berikutnya/');?>">Risol Mayonaise</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_kuelumpur_berikutnya/');?>">Kue Lemper</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_boluwarna_berikutnya/');?>">Bolu Warna</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_bolugulamerah_berikutnya/');?>">Bolu Gula Merah</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_bikaambon_berikutnya/');?>">Bika Ambon</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_kuesus_berikutnya/');?>">Kue Sus</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_kuepepe_berikutnya/');?>">Kue Pepe</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_lapisberas_berikutnya/');?>">Lapis Beras</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_rotigoreng_berikutnya/');?>">Roti Goreng</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_pastel_berikutnya/');?>">Pastel</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_putuayu_berikutnya/');?>">Putu Ayu</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_lemperbakar_berikutnya/');?>">Lemper Bakar</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_cucur_berikutnya/');?>">Cucur</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_piesusu_berikutnya/');?>">Pie Susu</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_flacoklat_berikutnya/');?>">Fla Coklat</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_rollgood_berikutnya/');?>">Roll Good</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_dadargulung_berikutnya/');?>">Dadar Gulung</a></li>
                                        <li><a href="<?php echo base_url('Prediksi/prediksi_rotigulung_berikutnya/');?>">Roti Gulung</a></li>
                                    </ul>
                                </div>
                                <!-- <div>
                                    <a href="" class="btn btn-success m-b-10 m-l-5"><i class="fa fa-print"> Print</i></a>
                                </div> -->
                                <!-- MULAI TABLE -->
                                <!-- <h4 class="card-title">Data Table</h4>
                                <h6 class="card-subtitle">Data table example</h6> -->
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                    <!-- <table class="table table-hover table-bordered"> -->
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Kue</th>
                                                <th>Periode</th>
                                                <th>Tanggal Penjualan</th>
                                                <th>Hasil Prediksi</th>
                                                <th>MAPE</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php 
                                                echo $tabel_nagasari_berikutnya;
                                            ?>
                                            <?php
                                                // echo $tabel_sosissolo_berikutnya;
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