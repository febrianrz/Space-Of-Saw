        <!-- MULAI PAGE WRAPPER  -->
        <div class="page-wrapper">

            <!-- MULAI BREAD CRUMB -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Data Kue</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda');?>">Beranda</a></li>
                        <li class="breadcrumb-item active">Data Kue</li>
                    </ol>
                </div>
            </div>
            <!-- SELESAI BREAD CRUMB -->

            <!-- MULAI CONTAINER FLUID  -->
            <div class="container-fluid">
                <!-- MULAI PAGE CONTENT -->
                <div class="row">
                    <div class="col-md-12">
                        

                        <?php echo $this->session->flashdata('pesan'); ?>

                       
                        <div class="card" style="margin:0%;">

                            <!-- MULAI CARD BODY -->
                            <div class="card-body" style="padding:5%;">
                                <!-- <h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->
                                <div class="card-title">
                                    <h2 style="text-align: center;">Tabel Data Kue</h2>
                                    <hr style="border-width: 3px;">
                                </div>
                                
                                <a href="<?php echo base_url('Produk/formtambah_produk');?>" class="btn btn-success m-b-10 m-l-5"><i class="fa fa-plus"> Tambah Data Kue</i></a>
                                <a href="<?php echo base_url('Produk/index');?>" class="btn btn-success m-b-10 m-l-5"><i class="fa fa-refresh"> Refresh</i></a>
                                <!-- <a href="" class="btn btn-success m-b-10 m-l-5"><i class="fa fa-print"> Print</i></a> -->

                                <!-- MULAI TABLE -->
                                <div class="table-responsive m-t-40">
                                    <table id="" class="table table-bordered table-striped">
                                    <!-- <table class="table table-hover table-bordered"> -->
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kode Kue</th>
                                                <th>Nama Kue</th>
                                                <!-- <th>Harga</th> -->
                                                <!-- <th><center>Gambar Produk</center></th> -->
                                                <th style="text-align: left;">Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <?php

                                                $no=0;

                                                foreach ($produk as $lihat) 
                                                { 
                                                    $no++;
                                                ?>
                                                    <td><?php echo $no;?></td>
                                                    <td><?php echo $lihat->id_produk;?></td>
                                                    <td><?php echo $lihat->nama_produk;?></td>
                                                    <!-- <td>Rp. <?php echo $lihat->harga_produk;?></td> -->
                                                   <!--  <td><center><?php echo $lihat->nama_produk;?></center></td> -->
                                                    <td style="text-align: left;">
                                                        
                                                            <a href="<?php echo base_url('Produk/ubah_produk/');?><?php echo $lihat->id_produk;?>" class="btn btn-success btn-xs"><i class="fa fa-edit"> Ubah Kue</i></a>
                                                            <a href="<?php echo base_url('Produk/hapus_produk/');?><?php echo $lihat->id_produk;?>" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Kue Ini?')" class="btn btn-danger btn-xs"><i class="fa fa-times"> Hapus Kue</i></a>
                                                        
                                                    </td>
                                            </tr>
                                             <?php } ?>
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
        <!-- </div> -->
        <!-- SELESAI PAGE WRAPPER  -->
<?php $this->load->view('admin/vfooter'); ?> 
