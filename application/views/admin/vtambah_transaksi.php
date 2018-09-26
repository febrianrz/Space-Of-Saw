        <!-- MULAI PAGE WRAPPER  -->
        <div class="page-wrapper">
            <!-- MULAI BREAD CRUMB -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Tambah Data Transaksi</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda');?>">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Produk');?>">Data Transaksi</a></li>
                        <li class="breadcrumb-item active">Tambah Data Transaksi</li>
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
                            <div class="card-body" style="padding-left: 20%; padding-right: 20%; padding-top: 7%; padding-bottom: 7%;">
                                <div class="card-title">
                                    <h2 style="text-align: center;">Tambah Data Transaksi</h2>
                                    <hr>
                                </div>
                                <div class="basic-form">
                                    <form method="POST" action="<?php echo base_url('Transaksi/tambah_transaksi'); ?>" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Tanggal Transaksi</label>
                                            <input type="date" class="form-control" name="tanggal_transaksi" placeholder="Masukkan Tanggal Transaksi" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Kode Transaksi</label>
                                            <input type="text" class="form-control" name="kode_transaksi" placeholder="Masukkan Kode Transaksi" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Produk Yang Dibeli</label>
                                            <input type="text" class="form-control" name="produk_beli" placeholder="Masukkan Produk Yang Dibeli" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Yang Dibeli</label>
                                            <input type="text" class="form-control" name="jumlah" placeholder="Masukkan Jumlah Yang Dibeli" required="">
                                        </div>
                                        <input type="submit" name="save" class="btn btn-success" value="Submit" />
                                        <input type="reset" name="reset" class="btn btn-danger" value="Reset" />
                                        <!-- <a class="btn btn-danger" href="<?php echo base_url()."Transaksi/index";?>">Kembali</a> -->
                                    </form>
                                </div>
                            </div>
                            <!-- SELESAI CARD BODY -->

                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- SELESAI PAGE CONTENT  -->
            </div>
            <!-- SELESAI CONTAINER FLUID  -->
        </div>
        <!-- SELESAI PAGE WRAPPER  -->

<?php $this->load->view('admin/vfooter'); ?> 