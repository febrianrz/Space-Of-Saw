<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Profil Admin</h4> </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="Beranda">Beranda</a></li>
                    <li class="active">Profil Admin</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <!-- BIKIN KONTEN UPLOAD DATA DIBAWAH INI-->
        <TABLE>
            <?php foreach ($profil as $lihat) { ?>
                <tr>Nama : <?php echo $lihat->nama;  ?></tr><br>
                <tr>Alamat : <?php echo $lihat->alamat;  ?></tr>
            <?php } ?>
            <a href="Profil/edit_profil" class="btn btn-success btn-xs">Ubah Desain</a>
        </TABLE>
    </div>
</div>
