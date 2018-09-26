        <!-- MULAI PAGE WRAPPER  -->
        <div class="page-wrapper">
            <!-- MULAI BREAD CRUMB -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Prediksi</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda');?>">Beranda</a></li>
                        <li class="breadcrumb-item active">Prediksi</li>
                    </ol>
                </div>
            </div>
            <!-- SELESAI BREAD CRUMB -->

            <!-- MULAI CONTAINER FLUID  -->
            <div class="container-fluid">
                <!-- MULAI PAGE CONTENT -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Default Tab</h4>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Home</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Profile</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><span class="hidden-sm-up"><i class="ti-email"></i></span> <span class="hidden-xs-down">Messages</span></a> </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane active" id="home" role="tabpanel">
                                        <div class="p-20">
                                            <!-- <h5>Best Clean Tab ever</h5>
                                            <h6>you can use it with the small code</h6>
                                            <p>Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a.</p> -->
                                            <!-- MULAI TABLE -->
                                            <div class="table-responsive m-t-40">
                                                <table id="myTable" class="table table-bordered table-striped">
                                                <!-- <table class="table table-hover table-bordered"> -->
                                                    <thead>
                                                        <tr>
                                                            <th>Periode</th>
                                                            <th>Tanggal Penjualan</th>
                                                            <th>Jumlah Penjualan</th>
                                                            <th>Hasil Prediksi</th>
                                                            <th>Error</th>
                                                            <th>Galat</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php 
                                                            echo $tabel_prediksi;
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- SELESAI TABLE -->
                                        </div>
                                    </div>
                                    <div class="tab-pane  p-20" id="profile" role="tabpanel">
                                        <!-- MULAI TABLE -->
                                            <div class="table-responsive m-t-40">
                                                <table id="myTable" class="table table-bordered table-striped">
                                                <!-- <table class="table table-hover table-bordered"> -->
                                                    <thead>
                                                        <tr>
                                                            <th>Periode</th>
                                                            <th>Tanggal Penjualan</th>
                                                            <th>Jumlah Penjualan</th>
                                                            <th>Hasil Prediksi</th>
                                                            <th>Error</th>
                                                            <th>Galat</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php 
                                                            echo $tabel_update;
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- SELESAI TABLE -->
                                    </div>
                                    <div class="tab-pane p-20" id="messages" role="tabpanel">3</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->

                </div>
            </div>

        </div>
<?php $this->load->view('admin/vfooter'); ?> 