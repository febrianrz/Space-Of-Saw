        <!-- MULAI PAGE WRAPPER  -->
        <div class="page-wrapper">
            <!-- MULAI BREAD CRUMB -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Data Penjualan</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda');?>">Beranda</a></li>
                        <li class="breadcrumb-item active">Data Penjualan</li>
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
                                <!-- <h4 class="card-title">Data Export</h4>
                                <h6 class="card-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6> -->

                                
                                <!-- <a href="<?php echo base_url('Transaksi/formtambah_transaksi');?>" class="btn btn-success m-b-10 m-l-5"><i class="fa fa-plus"> Tambah Data Transaksi</i></a> -->
                                <a href="<?php echo base_url('Transaksi/form');?>" class="btn btn-success m-b-10 m-l-5"><i class="fa fa-plus"> Tambah Data Penjualan</i></a>
                                <a href="<?php echo base_url('Transaksi/index');?>" class="btn btn-success m-b-10 m-l-5"><i class="fa fa-refresh"> Refresh</i></a>
                                <!-- <a href="" class="btn btn-success m-b-10 m-l-5"><i class="fa fa-print"> Print</i></a> -->

                                <!-- MULAI TABLE -->
                                <!-- <h4 class="card-title">Data Table</h4>
                                <h6 class="card-subtitle">Data table example</h6> -->
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                    <!-- <table class="table table-hover table-bordered"> -->
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                
                                                <th>ID</th>
                                                <th>Nama Kue</th>
                                                <th>Tanggal Penjualan</th>
                                                <th>Jumlah Penjualan</th>
                                                <th>Stock/Hari</th>
                                                <!-- <th><center>Kode Produk</center></th> -->
                                                
                                                <!-- <th><center>Gambar Produk</center></th> -->
                                                <th style="text-align: left;">Aksi</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <?php
                                                
                                                $no=0;

                                                    foreach ($tampilkan as $lihat) 
                                                    { 
                                                        $no++;
                                                    ?>
                                                        <td><?php echo $no;?></td>
                                                        
                                                        <!-- <td><?php echo tgl_indo($lihat->tanggal_transaksi);?></td>
                                                        <td><?php echo $lihat->kode_transaksi;?></td>
                                                        <td><?php echo $lihat->produk_beli;?></td>
                                                        <td><?php echo $lihat->jumlah;?></td> -->


                                                        <td><?php echo $lihat->id;?></td>
                                                        <td><?php echo $lihat->nama_produk;?></td>
                                                        <td><?php echo tgl_indo($lihat->tanggal_transaksi);?></td>
                                                        <td><?php echo $lihat->jumlah_penjualan;?></td>
                                                        <td><?php echo $lihat->stock;?></td>
                                                        

                                                        <td style="text-align: left;">
                                                    
                                                                <!-- <a href="<?php echo base_url('Transaksi/ubah_transaksi/');?><?php echo $lihat->id;?>" class="btn btn-success btn-xs"><i class="fa fa-edit"> Ubah Transaksi</i></a> -->
                                                                <a href="<?php echo base_url('Transaksi/hapus_transaksi/');?><?php echo $lihat->id;?>" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Transaksi Ini?')" class="btn btn-danger btn-xs"><i class="fa fa-times"> Hapus Data</i></a>
                                                        </td>
                                            </tr>
                                            <?php
                                                }
                                               
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