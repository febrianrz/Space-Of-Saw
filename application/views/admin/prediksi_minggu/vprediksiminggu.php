        <!-- MULAI PAGE WRAPPER  -->
        <div class="page-wrapper">
            <!-- MULAI BREAD CRUMB -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Hasil Prediksi Minggu Berikutnya</h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Beranda');?>">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('Prediksi');?>">Prediksi</a></li>
                        <li class="breadcrumb-item active">Hasil Prediksi Minggu Berikutnya</li>
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
                            <div class="card-body" style="padding: 5%;">
                                <!-- MULAI CARD TITLE -->
                                <div class="card-title">
                                    <h2 style="text-align: center">Hasil Prediksi Minggu Berikutnya</h2>
                                    <hr style="border-width: 3px;">
                                </div>
                                <!-- SELESAI CARD TITLE -->

                                <div>
                                    <p>
                                        <h5>
                                        Tabel prediksi periode terakhir (minggu berikutnya) untuk semua jenis kue:
                                        </h5>
                                    </p>
                                </div>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                    <!-- <table class="table table-hover table-bordered"> -->
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Kue</th>
                                                <th>Periode</th>
                                                <th>Tanggal Penjualan</th>
                                                <th>Hasil Prediksi</th>
                                                <th>MAPE %</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php 
                                                echo $tabel_nagasari_berikutnya;
                                                
                                            ?>
                                        </tbody>
                                    </table>

                                    <div ><h5><br><br>
                               

                                    *Diketahui: <br><br>
                                    Banyaknya n = <?php echo $n; ?><br>
                                    Jumlah Periode (x) = <?php echo $j_x; ?><br>
                                    Jumlah Penjualan (y) = <?php echo $j_y; ?> <br>
                                    Jumlah Penjualan (y) = <?php echo $j_y; ?> <br>
                                    Jumlah x kuadrat = <?php echo $j_xkuadrat; ?> <br>
                                    Jumlah x.y  = <?php echo $j_xy; ?> <br>
                                  
                                    


                                    <br>
                                    *Rumus:<br><Br>
                                    - Mencari Rata-rata X = Jumlah x / n = <?php echo $j_x; ?> / <?php echo $n; ?> = <?php echo $rt_x; ?> <br><br>

                                    - Mencari Rata-rata Y = Jumlah y / n = <?php echo $j_y; ?> / <?php echo $n; ?> = <?php echo $rt_y; ?><br><br>

                                    - Mencari Nilai b = 
                                    (Jumlah xy - (n).(rata-rata x).(rata-rata y)) / (Jumlah x kuadrat - (n)(rata-rata x)(rata-rata x)) = <br>
                                    (<?php echo $j_xy; ?> - (<?php echo $n; ?>).(<?php echo $rt_x; ?>).(<?php echo $rt_y; ?>)) / (<?php echo $j_xkuadrat; ?> - (<?php echo $n; ?>).(<?php echo $rt_x; ?>).(<?php echo $rt_x; ?>)) = 
                                    <?php echo $nil_b; ?>
                                    <br><br>

                                    - Mencari Nilai a = (Rata-rata y) - (nilai b).(Rata-rata x) = (<?php echo $rt_y; ?>) - (<?php echo $nil_b; ?>).(<?php echo $rt_x; ?>) = <?php echo $nil_a; ?>  <br><br>

                                    - Mencari prediksi (Y) = Nilai a + (Nilai b).(Periode Yang Diprediksi) = <?php echo $j_prediksi; ?>

                                    
                                </h5></div>

                                    <!-- <?php
                                        echo "<h3>Hasil Prediksi</h3>";
                                        echo "<br>Tanggal : ";
                                        echo "<br><br>Prediksi Terbesar : ".$max_prediksi;
                                        echo "<br>Nama Kue : ";
                                        echo "<br><br>Prediksi Terkecil : ".$min_prediksi;
                                        echo "<br>Nama Kue : ";
                                        echo "<br><br>MAPE terkecil :  ";
                                        echo "<br>Nama Kue : ";


                                    ?> -->
                                </div>
                                <!-- SELESAI TABLE -->



                            </div>
                            <!-- SELESAI CARD BODY -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
<canvas id="myChart" width="2" height="2" style="padding-right: 10%; padding-left: 10%"></canvas>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        // labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
        labels: [],
        datasets: [{
            label: '# of Votes',
            data: [11, 12, 13, 14, 15],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>

                        </div>
                    </div>

                    
                </div>
                <!-- SELESAI PAGE CONTENT -->
            </div>
            <!-- SELESAI CONTAINER FLUID  -->
        </div>
        <!-- SELESAI PAGE WRAPPER  -->

<?php $this->load->view('admin/vfooter'); ?> 