        <!-- MULAI PAGE WRAPPER  -->
        <div class="page-wrapper">
            <!-- MULAI BREAD CRUMB -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Ubah Data Kue</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda');?>">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Produk');?>">Data Kue</a></li>
                        <li class="breadcrumb-item active">Ubah Data Kue</li>
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
                                    <h2 style="text-align: center;">Ubah Data Kue</h2>
                                    <hr style="border-width: 3px;>
                                </div>
                                <div class="basic-form">

                                    <?php foreach ($ubah_produk as $ubah) { ?>
                                    <form method="POST" action="<?php echo base_url('Produk/simpan_produk'); ?>" enctype="multipart/form-data">
                                        <input type="hidden" name="id_produk" value="<?php echo $ubah->id_produk; ?>">
                                        <div class="form-group">
                                            <label>Nama Kue</label>
                                            <input type="text" class="form-control" name="nama_produk" value="<?php echo $ubah->nama_produk; ?>" required="">
                                        </div>
                                       <!--  <div class="form-group">
                                            <label>Harga Produk</label>
                                            <input type="text" class="form-control" name="harga_produk" value="<?php echo $ubah->harga_produk; ?>" >
                                        </div> -->
                                      
                                        <input type="submit" name="edit" class="btn btn-success" value="Simpan Perubahan" />
                                        <a class="btn btn-danger" href="<?php echo base_url()."Produk/index";?>">Batal</a>
                                    </form>
                                    <?php } ?>

                            
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