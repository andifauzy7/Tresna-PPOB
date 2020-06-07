<?php  
	
	require 'functions.php';
	$jenisTransaksi = query("SELECT * FROM kategori");
	$tanggal 		= date('Y-m-d');

	if(isset($_POST["tambah"])){
		$kategori 			= $_POST["jenis"];
		$tanggal 			= $_POST["tanggal"];
		$biaya_transaksi	= $_POST["biaya_transaksi"];
		$biaya_admin 		= $_POST["biaya_admin"];
		$keterangan 		= $_POST["keterangan"];
		add_data("	INSERT INTO daftarpenjualan 
					VALUES('', 	'$kategori', 
								'$tanggal', 
								'$biaya_transaksi', 
								'$biaya_admin', 
								'$keterangan')");
		// echo 	'<script>
		// 			alert("Data Berhasil Ditambahkan!");
		// 		 </script>';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<div class="row">
    <div class="col-md-12 col-xs-12">
        <div class="white-box">
            <form class="form-horizontal form-material" method="post" action="">
                <div class="form-group">
                    <label class="col-md-12" for="jenis">Jenis Transaksi</label>
                    <div class="col-md-12">
			            <select class="form-control" id="jenis" name="jenis" required>
			            	<option>-- PILIH JENIS TRANSAKSI --</option>
			            	<?php foreach ($jenisTransaksi as $transaksi): ?>
			            		<option value="<?=$transaksi['id_kategori'];?>"><?=$transaksi['layanan'] . " - " . $transaksi['nama_kategori'];?></option>
			            	<?php endforeach ?>
					    </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12" for="tanggal">Tanggal</label>
                    <div class="col-md-12">
                        <input type="date" id="tanggal" name="tanggal" placeholder="Contoh : 300000" class="form-control form-control-line" required autocomplete="off" value="<?=$tanggal;?>"> </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12" for="biaya_transaksi">Biaya Transaksi</label>
                    <div class="col-md-12">
                        <input type="text" id="biaya_transaksi" name="biaya_transaksi" placeholder="Contoh : 300000" class="form-control form-control-line" required autocomplete="off"> </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12" for="biaya_admin">Biaya Admin</label>
                    <div class="col-md-12">
                        <input type="text" id="biaya_admin" name="biaya_admin" placeholder="Contoh : 2500" class="form-control form-control-line" required autocomplete="off"> </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12" for="keterangan">Keterangan</label>
                    <div class="col-md-12">
                        <input type="text" id="keterangan" name="keterangan" placeholder="Contoh : Beli Buku di Tokopedia melalui BRIVA" class="form-control form-control-line" autocomplete="off"> </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-12">
                        <button class="btn btn-success" name="tambah">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>