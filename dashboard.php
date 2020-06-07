<?php  

    require 'functions.php';
    

    $penjualan = query("SELECT * FROM daftarpenjualan INNER JOIN kategori ON daftarpenjualan.id_kategori=kategori.id_kategori ORDER BY tanggal DESC LIMIT 10");

    $angka     = query("SELECT SUM(biaya_admin), SUM(biaya_transaksi), COUNT(id_penjualan) FROM daftarpenjualan");
    $angka     = $angka[0];

    for ($i=6; $i >= 0; $i--) { 
        $date       = date('Y-m-d');
        $tanggal    = date_create($date);
        $tanggal    = date_sub($tanggal,date_interval_create_from_date_string("$i days"));
        $tanggal    = date_format($tanggal,"Y-m-d");
        $mingguan[] = $tanggal;
        $jual       = query("   SELECT COUNT(id_penjualan) 
                                FROM daftarpenjualan
                                WHERE tanggal='$tanggal'");
        $hasilNew[] = $jual[0]["COUNT(id_penjualan)"];
    }

    for ($i=6; $i >= 0; $i--) { 
        $tanggal    = date_create($mingguan[0]);
        $tanggal    = date_sub($tanggal,date_interval_create_from_date_string("1 days"));
        $tanggal    = date_sub($tanggal,date_interval_create_from_date_string("$i days"));
        $tanggal    = date_format($tanggal,"Y-m-d");
        $jual       = query("   SELECT COUNT(id_penjualan) 
                                FROM daftarpenjualan
                                WHERE tanggal='$tanggal'");
        $hasilOld[] = $jual[0]["COUNT(id_penjualan)"];
    }

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script type="text/javascript">
        var mingguan = <?php echo json_encode($mingguan); ?>;
        var hasilNew = <?php echo json_encode($hasilNew); ?>;
        var hasilOld = <?php echo json_encode($hasilOld); ?>;
    </script>
</head>
<body>
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Total Transaksi</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><?=$angka['COUNT(id_penjualan)'];?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Pendapatan Kotor</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash2"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple"><?=$angka['SUM(biaya_transaksi)'];?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Pendapatan Bersih</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id="sparklinedash3"></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info"><?=$angka['SUM(biaya_admin)'];?></span></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <h3 class="box-title">Rekapitulasi Penjualan Harian</h3>
                <ul class="list-inline text-right">
                    <li>
                        <h5><i class="fa fa-circle m-r-5 text-info"></i>Minggu Ini</h5> </li>
                    <li>
                        <h5><i class="fa fa-circle m-r-5 text-inverse"></i>Minggu Kemarin</h5> </li>
                </ul>
                <div id="ct-visits" style="height: 405px;"></div>
            </div>
        </div>
    </div>
                
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Penjualan Terbaru</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>JENIS TRANSAKSI</th>
                                <th>TANGGAL</th>
                                <th>BIAYA TRANSAKSI</th>
                                <th>BIAYA ADMIN</th>
                                <th>KETERANGAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i=1; 
                            foreach ($penjualan as $jual): ?>
                            <tr>
                                <td><?=$i;?></td>
                                <td class="txt-oflo"><?=$jual['layanan'] . " - " . $jual['nama_kategori'];?></td>
                                <td><?=$jual["tanggal"];?></td>
                                <td><span class="text-success"><?=rupiah($jual["biaya_transaksi"]);?></span></td>
                                <td><span class="text-info"><?=rupiah($jual["biaya_admin"]);?></span></td>
                                <td><?=$jual["keterangan"];?></td>
                            </tr>
                            <?php
                            $i++; 
                            endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>