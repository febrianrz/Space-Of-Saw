        <!-- MULAI PAGE WRAPPER  -->
        <div class="page-wrapper">
            <!-- MULAI BREAD CRUMB -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Bantuan</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda');?>">Beranda</a></li>
                        <li class="breadcrumb-item active">Bantuan</li>
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
                            <!-- <div class="card-body" style="padding-left:7%; padding-right: 7%;"> -->
                            <div class="card-body" style="padding:7%;">
                                <p>
                                    <h4 style="text-align: center;">BANTUAN DAN PETUNJUK PENGGUNAAN APLIKASI PREDIKSI PERSEDIAAN KUE BASAH</h4><br>
                                    <hr style="border-width: 3px;">
                                </p>
                                <p>
                                    <h4><a href="<?php echo base_url('Produk');?>"><i class="fa fa-table fa-fw"></i> Data Kue</a></h4>
                                    <h5 style="text-align: justify;">
                                    Pada menu data kue, pengguna dapat menambahkan data kue, mengubah data kue, menghapus data kue, serta melihat table data kue.
                                    </h5>

                                    <h4><a href="<?php echo base_url('Transaksi');?>"><i class="fa fa-database fa-fw"></i> Data Penjualan</a></h4>
                                    <h5 style="text-align: justify;">
                                    Pada menu data penjualan, admin dapat menambahkan data penjualan melalui fitur upload file yang bersekstensi ".xlsx". Fitur lain yang tersedia dalam menu ini yang dapat digunakan oleh pengguna adalah fitur pencarian data penjualan, fitur cetak data penjualan, dan fitur hapus data penjualan.
                                    </h5>

                                    <h4><a href="<?php echo base_url('Analisis');?>"><i class="fa fa-desktop fa-fw"></i> Prediksi</a></h4>
                                    <h5 style="text-align: justify;">
                                    Menu prediksi merupakan fitur utama dari dari website ini. Menu prediksi ini digunakan untuk melakukan prediksi persediaan kue basah setiap harinya dengan mengolah data penjualan menggunakan metode Trend Projection. Menu ini terdiri dari empat sub menu, yaitu submenu untuk melihat prediksi bulan berikutnya untuk masing-masing kue, submenu untuk melihat prediksi periode terakhir untuk semua jenis kue, submenu untuk melihat prediksi periode dimasa lalu untuk masing-masing jenis kue, dan submenu untuk melihat hasil prediksi 30 hari dalam satu bulan dimasa lalu untuk setiap jenis kue.
                                    </h5>

                                    <h4><a href="<?php echo base_url('Bantuan');?>"><i class="fa fa-info-circle fa-fw"></i> Bantuan</a></h4>
                                    <h5 style="text-align: justify;">
                                    Menu bantuan merupakan halaman yang menampilkan informasi mengenai fitur-fitur pada setiap menu yang tersedia di website ini.
                                    </h5>

                                    <h4><a href="<?php echo base_url('Profil');?>"><i class="fa fa-user fa-fw"></i> Profil Toko</a></h4>
                                    <h5 style="text-align: justify;">
                                    Pada menu profil toko, fitur yang tersedia adalah mengubah data profil toko, seperti mengubah foto profil toko, nama toko, alamat toko, email, nomor telepon, username, serta password. 
                                    </h5>
                                </p>
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