<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>asset/table-ela/images/favicon.png">

    <title>WEBSITE AYAS SNACK</title>


    <!-- Bootstrap Core CSS -->

    <link href="<?php echo base_url(); ?>asset/table-ela/css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">

    <!-- SELESAI Bootstrap Core CSS -->

    <!-- <link href="<?php echo base_url(); ?>asset/table-ela/css/helper.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/table-ela/css/style.css" rel="stylesheet"> -->
    <!-- Custom CSS -->

    <link href="<?php echo base_url(); ?>asset/table-ela/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/table-ela/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/table-ela/css/lib/owl.carousel.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/table-ela/css/lib/owl.theme.default.min.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>asset/table-ela/css/helper.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>asset/table-ela/css/style.css" rel="stylesheet">
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>asset/chartjs/Chart.js"></script> -->

    <!-- <script src="<?php echo base_url(); ?>https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script> -->

    <!-- SELESAI Custom CSS -->

</head>

<body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url('Beranda');?>">
                        <!-- Logo icon -->
                        <b><img src="<?php echo base_url(); ?>asset/table-ela/images/logo.png" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span><img src="<?php echo base_url(); ?>asset/table-ela/images/logo-text.png" alt="homepage" class="dark-logo" /></span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                       <!--  <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li> -->
                        
                    </ul>
                    <!-- User profile and search -->
                    
                    <!-- End User profile and search -->
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label"><h3 style="text-align: left;">Menu Utama</h3></li>
                        <li >
                            <a class="" aria-expanded="false" href="<?php echo base_url('Beranda');?>"><i class="fa fa-home fa-fw"></i><span class="hide-menu">Beranda</span></a>
                        </li>
                        <li>
                            <a class="" href="<?php echo base_url('Produk');?>"><i class="fa fa-table fa-fw"></i>Data Kue</a>
                        </li>
                        <li>
                            <a class="" href="<?php echo base_url('Transaksi');?>"><i class="fa fa-database fa-fw"></i>Data Penjualan</a>
                        </li>
                        <li>
                             <a class="" href="<?php echo base_url('PrediksiSemuaKue');?>"><i class="fa fa-desktop fa-fw"></i>Prediksi</a>
                           <!--  <a class="" href="<?php echo base_url('PrediksiSemua');?>"><i class="fa fa-database fa-fw"></i>Data Penjualan</a> -->
                            <ul aria-expanded="false" >
                                 
                                <li><a href="<?php echo base_url('PrediksiSemuaKue');?>"><i class="fa fa-arrow-circle-o-right fa-fw"></i>Prediksi Periode Hari</a></li>
                                <li><a href="<?php echo base_url('PrediksiMinggu');?>"><i class="fa fa-arrow-circle-o-right fa-fw"></i>Prediksi Periode Minggu</a></li>
                                <!-- <li><a href="<?php echo base_url('PrediksiInputBulan');?>"><i class="fa fa-arrow-circle-o-right fa-fw"></i>Prediksi Input Bulan</a></li> -->


                                <!-- <li><a href="<?php echo base_url('Prediksi');?>"><i class="fa fa-arrow-circle-o-right fa-fw"></i>Prediksi Bulan Berikutnya</a></li>
                                <li><a href="<?php echo base_url('PrediksiKue');?>"><i class="fa fa-arrow-circle-o-right fa-fw"></i>Prediksi Per Kue</a></li>
                                <li><a href="<?php echo base_url('PrediksiBulan');?>"><i class="fa fa-arrow-circle-o-right fa-fw"></i>Prediksi Kue/Bulan</a></li> -->
                            </ul>
                        </li>
                        <li>
                            <a class="" href="<?php echo base_url('Bantuan');?>"><i class="fa fa-info-circle fa-fw"></i>Bantuan</a>
                        </li>
                        <li>
                            <a class="" href="<?php echo base_url('Profil');?>"><i class="fa fa-user fa-fw"></i>Profil Toko</a>
                        </li>
                    </ul>
                    <div class="center p-30">
                        <a href="<?php echo base_url('Login/logout');?>" class="btn btn-danger btn-sm btn-block waves-effect waves-light"><i class="fa fa-power-off"></i> Log Out</a>
                    </div>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->

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
                                    <table id="myTable" class="table table-bordered table-striped">
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
                                                            <a href="<?php echo base_url('Produk/hapus_produk/');?><?php echo $lihat->id_produk;?>" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Produk Ini?')" class="btn btn-danger btn-xs"><i class="fa fa-times"> Hapus Kue</i></a>
                                                        
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
            <!-- footer -->
                <footer class="footer"> © TOKO KUE BASAH AYAS SNACK</footer>
            <!-- End footer -->
    </div>
    <!-- PAGE WRAPPER -->
</div>

<!-- MAIN WRAPPER -->


<!-- All Jquery -->
    <script src="<?php echo base_url(); ?>asset/table-ela/js/lib/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo base_url(); ?>asset/table-ela/js/lib/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/table-ela/js/lib/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url(); ?>asset/table-ela/js/jquery.slimscroll.js"></script>
    <!--Menu sidebar -->
    <!-- <script src="<?php echo base_url(); ?>asset/table-ela/js/sidebarmenu.js"></script> -->
    <!--stickey kit -->
    <script src="<?php echo base_url(); ?>asset/table-ela/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url(); ?>asset/table-ela/js/scripts.js"></script>


    <script src="<?php echo base_url(); ?>asset/table-ela/js/lib/datatables/datatables.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/table-ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/table-ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/table-ela/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/table-ela/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/table-ela/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>asset/table-ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/table-ela/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>asset/table-ela/js/lib/datatables/datatables-init.js"></script>




    <!-- <script src="<?php echo base_url(); ?>js/jquery.min.js"></script> -->

    <!-- CHART -->
    <script src="<?php echo base_url(); ?>asset/table-ela/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="<?php echo base_url(); ?>asset/table-ela/js/lib/chart-js/chartjs-init.js"></script>


<!-- chrart bar -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

</body>
</html>
  



    
