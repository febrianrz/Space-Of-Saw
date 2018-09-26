        <!-- MULAI PAGE WRAPPER  -->
        <div class="page-wrapper">
            <!-- MULAI BREAD CRUMB -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Prediksi</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda');?>">Beranda</a></li>
                        <li class="breadcrumb-item active">Prediksi</li>
                    </ol>
                </div>
            </div>
            <!-- SELESAI BREAD CRUMB -->

            <!-- MULAI CONTAINER FLUID  -->
            <div class="container-fluid">
                <!-- MULAI PAGE CONTENT -->
                <div class="row">
                    <!-- /# column -->
                    <!-- <div class="col-md-8"> -->
                    <div class="col-md-12">
                        <div class="card" style="margin:0%;">
                            
                            <!-- MULAI CARD BODY -->
                            <!-- <div class="card-body" style="padding:7%;"> -->
                            <div class="card-body" style="padding-left: 20%; padding-right: 20%; padding-top: 7%; padding-bottom: 2%;">
                                <div class="card-title">
                                    <h2 style="text-align: center;">Prediksi Data Penjualan Kue Basah</h2>
                                    <hr>
                                </div>

                                <!-- <div class="dropdown">
                                    <a class="btn btn-success m-b-10 m-l-5 dropdown-toggle" data-toggle="dropdown">Jenis Kue </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo base_url('PrediksiBulan');?>">Nagasari</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_sosissolo/');?>">Sosis Solo</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_risolmayonaise/');?>">Risol Mayonaise</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_kuelumpur/');?>">Kue Lemper</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_boluwarna/');?>">Bolu Warna</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_bolugulamerah/');?>">Bolu Gula Merah</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_bikaambon/');?>">Bika Ambon</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_kuesus/');?>">Kue Sus</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_kuepepe/');?>">Kue Pepe</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_lapisberas/');?>">Lapis Beras</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_rotigoreng/');?>">Roti Goreng</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_pastel/');?>">Pastel</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_putuayu/');?>">Putu Ayu</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_lemperbakar/');?>">Lemper Bakar</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_cucur/');?>">Cucur</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_piesusu/');?>">Pie Susu</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_flacoklat/');?>">Fla Coklat</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_rollgood/');?>">Roll Good</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_dadargulung/');?>">Dadar Gulung</a></li>
                                        <li><a href="<?php echo base_url('PrediksiKue/prediksi_rotigulung/');?>">Roti Gulung</a></li>
                                        
                                    </ul>
                                </div>
                                <div> -->
                                    
                                
                                <div class="basic-form">
                                <form method="POST" action="<?php echo base_url('PrediksiInputBulan/prediksibulan'); ?>" enctype="multipart/form-data">
                                    <div class="basic-form">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="checkbox">              
                                                    <h4>
                                                        <label>Pilih Bulan Untuk Diprediksi : </label><br>
                                                        

                                                        <!-- name="bulan[<?php echo $value['month(tanggal_transaksi)'] ?>]" -->
                                                        <label>
                                                            <?php foreach ($c as $value) { ?>
                                                            <input type="checkbox" name="bulan" value=""> <?php echo bulan($value['month(tanggal_transaksi)']) ; echo " "; echo $value['year(tanggal_transaksi)']; echo "<br><br>";?>
                                                            <?php } ?>

                                                        </label>
                                                        
                                                        
                                                        <br>
                                                        <!-- <label>Pilih Tahun Untuk Diprediksi : </label><br>
                                                        <label>
                                                            <?php foreach ($c as $value) { ?>
                                                            <input type="checkbox" name="tahun" value=""> <?php echo ($value['year(tanggal_transaksi)']); echo "<br><br>";?>
                                                            <?php } ?>
                                                        </label>
                                                         -->
                                                    </h4>
                                                    <br>
                                                
                                                </div>
                                                <div>
                                                    <input type="submit" name="save" class="btn btn-success" value="Proses" />
                                                    <input type="reset" name="reset" class="btn btn-danger" value="Reset" />
                                                </div>
                                                 <!-- <div class="form-group">
                                                    <label>Rentang Tanggal Awal</label>
                                                    <input type="date" class="form-control" name="tgl_mulai" placeholder="Masukkan Batas Tanggal Awal">
                                                </div>
                                                <div class="form-group">
                                                    <label>Rentang Tanggal Akhir</label>
                                                    <input type="date" class="form-control" name="tgl_akhir" placeholder="Masukkan Batas Tanggal Akhir">
                                                </div> -->

                                            <!-- <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Nilai Minimum Support</label>
                                                    <input type="text" class="form-control" name="minsup" placeholder="Masukkan Milai Minimum Support">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nilai Minimum Confidence</label>
                                                    <input type="text" class="form-control" name="mincof" placeholder="Masukkan Nilai Minimum Confidence">
                                                </div>
                                            </div> -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div>
                                        <input type="submit" name="save" class="btn btn-success" value="Proses" />
                                        <input type="reset" name="reset" class="btn btn-danger" value="Reset" />
                                    </div> -->
                                </form>
                                </div>

                            </div>
                            <!-- SELESAI CARD BODY -->
                        </div>
                    </div>
                    <!-- /# column -->
                    <!-- <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- <a href="<?php echo base_url('Produk/formtambah_produk');?>" class="btn btn-success m-b-10 m-l-5"><i class="fa fa-plus"> Tambah Produk</i></a> -->
                                <!-- <a href="<?php echo base_url('Produk/index');?>" class="btn btn-success m-b-10 m-l-5"><i class="fa fa-refresh"> Refresh</i></a> -->

                                <!-- <a href="" class="btn btn-success m-b-10 m-l-5"><i class="fa fa-print"> Print</i></a>   -->

                            </div>
                        </div>
                    </div> -->
                </div>
                <!-- SELESAI PAGE CONTENT -->
            </div>
            <!-- SELESAI CONTAINER FLUID  -->
        </div>
        <!-- SELESAI PAGE WRAPPER  -->

<?php $this->load->view('admin/vfooter'); ?> 