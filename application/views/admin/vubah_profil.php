        <!-- MULAI PAGE WRAPPER  -->
        <div class="page-wrapper">
            <!-- MULAI BREAD CRUMB -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Ubah Profil Toko</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda');?>">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Produk');?>">Profil Toko</a></li>
                        <li class="breadcrumb-item active">Ubah Profil Toko</li>
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
                                    <h2 style="text-align: center;">Ubah Profil Toko</h2>
                                    <hr>
                                </div>                                <div class="basic-form">
                                    <?php foreach ($ubah_profil as $ubah) { ?>
                                    <form method="POST" action="<?php echo base_url(); ?>Profil/simpan_profil/<?php echo $ubah->id_admin;?>" enctype="multipart/form-data">
                                        <input type="hidden" name="id_admin" value="<?php echo $ubah->id_admin; ?>">
                                        <div class="form-group">
                                            <label>Nama Toko</label>
                                            <input type="text" class="form-control" name="nama" value="<?php echo $ubah->nama; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi Toko</label>
                                            <input type="text" class="form-control" name="deskripsi" value="<?php echo $ubah->deskripsi; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input type="text" class="form-control" name="alamat" value="<?php echo $ubah->alamat; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="Email" class="form-control" name="email" value="<?php echo $ubah->email; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>No. Telepon</label>
                                            <input type="text" class="form-control" name="telepon" value="<?php echo $ubah->telepon; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username" value="<?php echo $ubah->username; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" value="<?php echo $ubah->password; ?>" >
                                        </div>
                                        <div class="form-group">
                                            <label>Foto Profil Toko</label>
                                            <input type="file" class="form-control" name="gambar_admin" value="<?php echo $ubah->gambar_admin; ?>" >
                                        </div>

                                      
                                        <input type="submit" name="edit" class="btn btn-success" value="Simpan Perubahan" />
                                        <a class="btn btn-danger" href="<?php echo base_url()."Profil/index";?>">Batal</a>
                                    </form>
                                    <?php } ?>

                                    <?php

                                        if($this->input->get('update')==1)
                                        {
                                            echo "Profil Toko Berhasil Diubah !";
                                        }
                                        else if($this->input->get('update')==2)
                                        {
                                            echo "Profil Toko Gagal Diubah !";
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