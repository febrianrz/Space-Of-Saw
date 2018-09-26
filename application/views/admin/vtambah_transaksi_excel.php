		        <!-- MULAI PAGE WRAPPER  -->
        <div class="page-wrapper">
            <!-- MULAI BREAD CRUMB -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Tambah Data Penjualan</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda');?>">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Produk');?>">Data Penjualan</a></li>
                        <li class="breadcrumb-item active">Tambah Data Penjualan</li>
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
                                    <h2 style="text-align: center;">Tambah Data Penjualan</h2>
                                    <hr style="border-width: 3px;">
                                </div>
                                <div class="basic-form">
                                    <form method="POST" action="<?php echo base_url('Transaksi/form'); ?>" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Upload Data Penjualan</label>
                                            <input type="file" class="form-control" name="file">
                                        </div>
                                        <input type="submit" name="preview" class="btn btn-success" value="Preview" />
                                    </form>
  <?php
  if(isset($_POST['preview']))
  { // Jika user menekan tombol Preview pada form 
    if(isset($upload_error))
    { // Jika proses upload gagal
      echo "<div style='color: red;'>".$upload_error."</div>"; // Muncul pesan error upload
      die; // stop skrip
    }

    // Buat sebuah tag form untuk proses import data ke database
    echo "<form method='post' action='".base_url("Transaksi/import")."'>";
    
    // Buat sebuah div untuk alert validasi kosong
    //echo "<div style='color: red;' id='kosong'>
    //Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
    //</div>";
    
    echo "<table border='1' cellpadding='8'>
    <tr>
      <th colspan='5'>Preview Data</th>
    </tr>
    <tr>
      <th>ID</th>
      <th>ID Kue</th>
      <th>Tanggal Transaksi</th>
      <th>Jumlah Penjualan</th>
      <th>Stock</th>
    </tr>";

    $numrow = 1;
    $kosong = 0;

    // Lakukan perulangan dari data yang ada di excel
    // $sheet adalah variabel yang dikirim dari controller
    foreach($sheet as $row)
    { 
      // Ambil data pada excel sesuai Kolom
      $id                   = $row['A']; // Ambil data NIS
      $id_produk            = $row['B']; // Ambil data nama
      $tanggal_transaksi    = $row['C']; // Ambil data jenis kelamin
      $jumlah_penjualan     = $row['D']; // Ambil data alamat
      $stock                = $row['E'];

      // Cek jika semua data tidak diisi
      if(empty($id) && empty($id_produk) && empty($tanggal_transaksi) && empty($jumlah_penjualan) && empty($stock))
        continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

      // Cek $numrow apakah lebih dari 1
      // Artinya karena baris pertama adalah nama-nama kolom
      // Jadi dilewat saja, tidak usah diimport
      if($numrow > 1)
      {
        // Validasi apakah semua data telah diisi
        $nis_td = ( ! empty($id))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
        $nama_td = ( ! empty($id_produk))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
        $jk_td = ( ! empty($tanggal_transaksi))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
        $alamat_td = ( ! empty($jumlah_penjualan))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
        $stock_td = ( ! empty($stock))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah

        // Jika salah satu data ada yang kosong
        if(empty($id) or empty($id_produk) or empty($tanggal_transaksi) or empty($jumlah_penjualan) or empty($stock))
        {
          $kosong++; // Tambah 1 variabel $kosong
        }

        echo "<tr>";
        echo "<td".$nis_td.">".$id."</td>";
        echo "<td".$nama_td.">".$id_produk."</td>";
        echo "<td".$jk_td.">".$tanggal_transaksi."</td>";
        echo "<td".$alamat_td.">".$jumlah_penjualan."</td>";
        echo "<td".$stock_td.">".$stock."</td>";
        echo "</tr>";

        }
      
      $numrow++; // Tambah 1 setiap kali looping
    }

    echo "</table>";

    if($kosong > 1)
    {
    ?>  
      <script>
      $(document).ready(function(){
        // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
        $("#jumlah_kosong").html('<?php echo $kosong; ?>');
        
        $("#kosong").show(); // Munculkan alert validasi kosong
      });
      </script>
    <?php
    }

    else

    { // Jika semua data sudah diisi
      echo "<hr>";
      
      // Buat sebuah tombol untuk mengimport data ke database
      echo "<button type='submit' name='import'>Import</button>";
      echo "<a href='".base_url("Transaksi/form")."'>Cancel</a>";
    }

    echo "</form>";

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


        <script>
            $(document).ready(function()
            {
            // Sembunyikan alert validasi kosong
            $("#kosong").hide();
            }
            );
        </script>

<?php $this->load->view('admin/vfooter'); ?> 							




