<?php
        if(isset($_POST['preview'])) // Jika user menekan tombol Preview pada form 
        { 
            if(isset($upload_error)) // Jika proses upload gagal
            { 
                // Muncul pesan error upload
                echo "<div style='color: red;'>".$upload_error."</div>"; 

                die; // stop skrip
            }
        
        // Buat sebuah tag form untuk proses import data ke database
        echo "<form method='post' action=".base_url("Transaksi/import")."'>";
        
        // Buat sebuah div untuk alert validasi kosong
        echo "<div style='color: red;' id='kosong'>
        Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
        </div>";
        
        echo "<table border='1' cellpadding='8'>
        <tr>
          <th colspan='5'>Preview Data</th>
        </tr>
        <tr>
          <th>Tanggal Transaksi</th>
          <th>Kode Transaksi</th>
          <th>Produk Yang Dibeli</th>
          <th>Jumlah Produk Yang Dibeli</th>
        </tr>";
        
        $numrow = 1;
        $kosong = 0;
        
        // Lakukan perulangan dari data yang ada di excel
        // $sheet adalah variabel yang dikirim dari controller
        foreach($sheet as $row)
        { 
          // Ambil data pada excel sesuai Kolom
          $tanggal_transaksi  = $row['A']; // Ambil data NIS
          $kode_transaksi     = $row['B']; // Ambil data nama
          $produk_beli        = $row['C']; // Ambil data jenis kelamin
          $jumlah             = $row['D']; // Ambil data alamat
          
          // Cek jika semua data tidak diisi
          if(empty($tanggal_transaksi) && empty($kode_transaksi) && empty($produk_beli) && empty($jumlah))
                continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
          
          // Cek $numrow apakah lebih dari 1
          // Artinya karena baris pertama adalah nama-nama kolom
          // Jadi dilewat saja, tidak usah diimport
          if($numrow > 1)
          {
            // Validasi apakah semua data telah diisi
            $tanggal_transaksi   = ( ! empty($tanggal_transaksi))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
            $kode_transaksi      = ( ! empty($kode_transaksi))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
            $produk_beli         = ( ! empty($produk_beli))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
            $jumlah            = ( ! empty($jumlah))? "" : " style='background: #E07171;'"; // Jika Alamat kosong, beri warna merah
            
            // Jika salah satu data ada yang kosong
            if(empty($tanggal_transaksi) or empty($kode_transaksi) or empty($produk_beli) or empty($jumlah))
            {
              $kosong++; // Tambah 1 variabel $kosong
            }
            
            echo "<tr>";
            echo "<td".$tanggal_transaksi.">".$tanggal_transaksi."</td>";
            echo "<td".$kode_transaksi.">".$kode_transaksi."</td>";
            echo "<td".$produk_beli.">".$produk_beli."</td>";
            echo "<td".$jumlah.">".$jumlah."</td>";
            echo "</tr>";
          }
          
          $numrow++; // Tambah 1 setiap kali looping
        }
        
        echo "</table>";
        
        // Cek apakah variabel kosong lebih dari 1
        // Jika lebih dari 1, berarti ada data yang masih kosong
        if($kosong > 1){
        ?>  
          <script>
          $(document).ready(function(){
            // Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
            $("#jumlah_kosong").html('<?php echo $kosong; ?>');
            
            $("#kosong").show(); // Munculkan alert validasi kosong
          });
          </script>
        <?php
        }else{ // Jika semua data sudah diisi
          echo "<hr>";
          
          // Buat sebuah tombol untuk mengimport data ke database
          echo "<button type='submit' name='import'>Import</button>";
          echo "<a href='".base_url("Transaksi/index")."'>Cancel</a>";
        }
        
        echo "</form>";
      }
      ?>