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
