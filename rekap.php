
<?php  
	
	require 'functions.php';
	$penjualan = query("SELECT * FROM daftarpenjualan INNER JOIN kategori ON daftarpenjualan.id_kategori=kategori.id_kategori ORDER BY tanggal DESC");

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Daftar Penjualan</h3>
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