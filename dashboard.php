<?php  

    require 'functions.php';
    $penjualan = query("SELECT * FROM daftarpenjualan INNER JOIN kategori ON daftarpenjualan.id_kategori=kategori.id_kategori ORDER BY tanggal DESC LIMIT 10");

    $angka     = query("SELECT SUM(biaya_admin), SUM(biaya_transaksi), COUNT(id_penjualan) FROM daftarpenjualan");
    $angka     = $angka[0];

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
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
                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><?=$angka["COUNT(id_penjualan)"];?></span></li>
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
                    <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple"><?=$angka["SUM(biaya_transaksi)"];?></span></li>
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
                    <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info"><?=$angka["SUM(biaya_admin)"];?></span></li>
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
                        <h5><i class="fa fa-circle m-r-5 text-info"></i>Mac</h5> </li>
                    <li>
                        <h5><i class="fa fa-circle m-r-5 text-inverse"></i>Windows</h5> </li>
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
                            $i = 0;
                            foreach ($penjualan as $jual): ?>
                            <tr>
                                <td><?=$i+1;?></td>
                                <td class="txt-oflo"><?=$jual["layanan"] . " - " . $jual["nama_kategori"];?></td>
                                <td class="txt-oflo"><?=$jual["tanggal"];?></td>
                                <td><span class="text-success"><?=rupiah($jual["biaya_transaksi"]); ?></span></td>
                                <td><span class="text-info"><?=rupiah($jual["biaya_admin"]); ?></span></td>
                                <td><?=$jual["keterangan"];?></td>
                            </tr>
                            <?php 
                            $i++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>