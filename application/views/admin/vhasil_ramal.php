        <!-- MULAI PAGE WRAPPER  -->
        <div class="page-wrapper">
            <!-- MULAI BREAD CRUMB -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Hasil Prediksi</h3> </div>
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

                            <!-- MULAI CARD BODY -->
                            <div class="card-body" style="padding:5%;">
                    
                                <a href="" class="btn btn-success m-b-10 m-l-5"><i class="fa fa-print"> Print</i></a>

                                <!-- MULAI TABLE -->
                                <!-- <h4 class="card-title">Data Table</h4>
                                <h6 class="card-subtitle">Data table example</h6> -->
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                    <!-- <table class="table table-hover table-bordered"> -->
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Penjualan</th>
                                                <th>Nama Kue</th>
                                                <th>Jumlah Penjualan</th>
                                                <th>Stock Kue/Hari</th>
                                                <th>Persentasi</th>
                                                <th>Prediksi</th>
                                                <th>Galat</th>
                                                <!-- <th>Rata-rata Galat</th> -->
                                            </tr>
                                        </thead>

                                        <tbody>
                                           <?php
                                             echo $meja;
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