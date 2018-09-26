<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Ubah Profil Admin</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url('Beranda');?>">Beranda</a></li>
                    <li><a href="<?php echo base_url('Profil');?>">Profil Admin</a></li>
                    <li class="active">Ubah Profil</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <!-- BIKIN KONTEN UPLOAD DATA DIBAWAH INI-->
        <!-- .row -->
                <div class="row">
                    <?php foreach ($edit_profil as $edit) { ?>
                    <form class="form-horizontal form-material" method="POST" action="<?php echo base_url(); ?>Profil/simpan_profil/<?php echo $edit->id_admin;?>" enctype="multipart/form-data">
                    
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg"> <img width="100%" alt="user" src="../plugins/images/large/img1.jpg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <a href="javascript:void(0)"><img src="<?php echo base_url();?><?php echo $edit->gambar_admin; ?>" class="thumb-lg img-circle" alt="img"></a>
                                        <h4 class="text-white">User Name</h4>
                                        <h5 class="text-white">info@myadmin.com</h5> </div>
                                </div>
                            </div>
                            <!-- <div class="user-btm-box">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-purple"><i class="ti-facebook"></i></p>
                                    <h1>258</h1> </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-blue"><i class="ti-twitter"></i></p>
                                    <h1>125</h1> </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-danger"><i class="ti-dribbble"></i></p>
                                    <h1>556</h1> </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">

                            <!-- <?php foreach ($edit_profil as $edit) { ?>
                            <form class="form-horizontal form-material" method="POST" action="<?php echo base_url(); ?>Profil/simpan_profil/<?php echo $edit->id_admin;?>" enctype="multipart/form-data"> -->
                                
                                <div class="form-group">
                                    <label class="col-md-12">Nama Perusahaan</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="" name="nama" class="form-control form-control-line" value="<?php echo $edit->nama;?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Alamat</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="" name="alamat" class="form-control form-control-line" value="<?php echo $edit->alamat;?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="" class="form-control form-control-line" name="email" id="example-email" value="<?php echo $edit->email;?>">  </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Username</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="" class="form-control form-control-line" name="username" value="<?php echo $edit->username;?>"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" value="password" name="password" class="form-control form-control-line"  value="<?php echo $edit->password;?>"> </div>
                                </div>
                                <!-- <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="123 456 7890" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Message</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" class="form-control form-control-line"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-12">Select Country</label>
                                    <div class="col-sm-12">
                                        <select class="form-control form-control-line">
                                            <option>London</option>
                                            <option>India</option>
                                            <option>Usa</option>
                                            <option>Canada</option>
                                            <option>Thailand</option>
                                        </select>
                                    </div>
                                </div> -->
                                 
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="submit" name="save" value="Simpan" class="btn btn-success" >
                                        <!-- <a class="btn btn-success">Simpan Profil</a> -->
                                       <!--  </form> -->
                                         <a href="<?php echo base_url('Profil');?>" class="btn btn-danger">Batal</a>
                                    </div>
                                </div>
                            
                           
                            
            <!--                 </form>
                <?php } ?> -->
                        </div>
                    </div>
                    </form>
                <?php } ?>
                </div>
                <!-- /.row -->

    </div>
</div>