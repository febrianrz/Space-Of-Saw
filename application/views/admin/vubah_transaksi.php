        <!-- MULAI PAGE WRAPPER  -->
        <div class="page-wrapper">
            <!-- MULAI BREAD CRUMB -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Ubah Data Transaksi</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda');?>">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Produk');?>">Data Transaksi</a></li>
                        <li class="breadcrumb-item active">Ubah Data Transaksi</li>
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
                                    <h2 style="text-align: center;">Ubah Data Transaksi</h2>
                                    <hr style="border-width: 3px;">
                                </div>
                                <div class="basic-form">

                                    <?php foreach ($ubah_transaksi as $ubah) { ?>
                                    <form method="POST" action="<?php echo base_url('Transaksi/simpan_transaksi'); ?>" enctype="multipart/form-data">
                                        <input type="hidden" name="id" value="<?php echo $ubah->id; ?>">
                                        <div class="form-group">
                                            <label>Tanggal Transaksi</label>
                                            <input type="text" class="form-control" name="tanggal_transaksi" value="<?php echo $ubah->tanggal_transaksi; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Kode Transaksi</label>
                                            <input type="text" class="form-control" name="kode_transaksi" value="<?php echo $ubah->kode_transaksi; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Produk Yang Dibeli</label>
                                            <input type="text" class="form-control" name="produk_beli" value="<?php echo $ubah->produk_beli; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Produk Yang Dibeli</label>
                                            <input type="text" class="form-control" name="jumlah" value="<?php echo $ubah->jumlah; ?>" >
                                        </div>
                                      
                                        <input type="submit" name="edit" class="btn btn-success" value="Simpan Perubahan" />
                                        <a class="btn btn-danger" href="<?php echo base_url()."Transaksi/index";?>">Batal</a>
                                    </form>
                                    <?php } ?>

                                    <?php

                                        if($this->input->get('update')==1)
                                        {
                                            echo "Data Transaksi Berhasil Diubah !";
                                        }
                                        else if($this->input->get('update')==2)
                                        {
                                            echo "Data Transaksi Gagal Diubah !";
                                        }

                                    ?>
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