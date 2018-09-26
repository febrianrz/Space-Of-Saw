        <!-- MULAI PAGE WRAPPER  -->
        <div class="page-wrapper">
            <!-- MULAI BREAD CRUMB -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Profil Toko</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda');?>">Beranda</a></li>
                        <li class="breadcrumb-item active">Profil Toko</li>
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
                                <?php foreach ($profil as $lihat) { ?>

                                    <div class="card-two">
                                        <header>
                                            <div class="avatar">
                                                <img src="<?php echo base_url();?><?php echo $lihat->gambar_admin; ?>"/>
                                            </div>
                                        </header>

                                        <h3><?php echo $lihat->nama;  ?></h3>
                                        <div class="desc">
                                            <?php echo $lihat->deskripsi;  ?>
                                        </div>
                                    </div>
                            
                                    <div class="table-responsive" style="padding-left: 10%; padding-right: 10%">
                                        <table class="table">
                                            <tbody>
                                                <!-- <form> -->
                                                <tr>
                                                    <th>Nama Toko</th>
                                                    <td></td>
                                                    <td>:</td>
                                                    <!-- <td><input type="password" name="password" class="form-control" value="<?php echo $lihat->password;  ?>"></td> -->
                                                    <td style="text-align: left"><?php echo $lihat->nama;  ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Alamat</th>
                                                    <td></td>
                                                    <td>:</td>
                                                    <td style="text-align: left"><?php echo $lihat->alamat;  ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td></td>
                                                    <td>:</td>
                                                    <td style="text-align: left"><?php echo $lihat->email;  ?></td>
                                                </tr>
                                                <tr>
                                                    <th>No. Telepon</th>
                                                    <td></td>
                                                    <td>:</td>
                                                    <td style="text-align: left"><?php echo $lihat->telepon;  ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Username</th>
                                                    <td></td>
                                                    <td>:</td>
                                                    <td style="text-align: left"><?php echo $lihat->username;  ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Password</th>
                                                    <td></td>
                                                    <td>:</td>
                                                    <td style="text-align: left">
                                                    <?php 

                                                    $pass=strlen($lihat->password);
                                                    
                                                    for ($i=0; $i < $pass ; $i++)

                                                    { 
                                                    ?>
                                                    <?php echo "*";  ?>
                                                    <?php } ?>
                                                    </td>

                                                    <!-- <td style="text-align: left"><?php echo $lihat->password;  ?></td> -->
                                                </tr>
                                                <!-- </form> -->
                                            </tbody>
                                        </table>

                                        <!-- <div class="col-md-6">
                                            <form>
                                                <div class="form-group row">
                                                    <label class="control-label text-right col-md-3">Address:</label>
                                                    <div class="col-md-9">
                                                        <p class="form-control-static"><?php echo $lihat->username;  ?></p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div> -->

                                        <div style="text-align: right;">
                                            <p >
                                                <br>
                                                <a href="<?php echo base_url('Profil/ubah_profil/');?>" class="btn btn-md btn-success">Ubah Profil</a>
                                            </p>
                                        </div>

                                    </div>
                                <?php } ?>
                            </div>
                            <!-- SELESAI CARD BODY -->
                        </div>
                    </div>  
                </div>
                <!-- SELESAI PAGE CONTENT -->
            </div>
            <!-- SELESAI CONTAINER FLUID  -->
        <!-- </div> -->
        <!-- SELESAI PAGE WRAPPER  -->

<?php $this->load->view('admin/vfooter'); ?> 