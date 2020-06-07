
<?php  

	require 'functions.php';
	$hasil		= query("SELECT * FROM kategori");
	$tanggal 	= date('Y-m-d');

	if(isset($_POST["tambah"])){
		$id_kategori 		= $_POST["kategori"];
		$tanggal 			= $_POST["tanggal"];
		$biaya_transaksi	= $_POST["biaya_transaksi"];
		$biaya_admin 		= $_POST["biaya_admin"];
		$keterangan 		= $_POST["keterangan"];
		add_data("	INSERT INTO daftarpenjualan
					VALUES('', '$id_kategori', '$tanggal', '$biaya_transaksi', '$biaya_admin', '$keterangan')");
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
            <form class="form-horizontal form-material" method="post">
                <div class="form-group">
                    <label class="col-md-12" for="kategori">Jenis Transaksi</label>
                    <div class="col-md-12">
                		<select class="form-control" id="kategori" name="kategori">
                            <option>-- PILIH JENIS TRANSAKSI --</option>
                            <?php foreach ($hasil as $kategori): ?>
                            	<option value="<?=$kategori['id_kategori'];?>"><?=$kategori["layanan"] . " - " . $kategori["nama_kategori"];?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
				<div class="form-group row">
				  <label for="tanggal" class="col-md-12">Tanggal</label>
				  <div class="col-md-12">
				    <input class="form-control" type="date" value="<?=$tanggal;?>" id="tanggal" name="tanggal" required>
				  </div>
				</div>
                <div class="form-group">
                    <label class="col-md-12" for="biaya_transaksi">Biaya Transaksi</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Contoh : 125000" class="form-control form-control-line" required name="biaya_transaksi" id="biaya_transaksi" autocomplete="off"> </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12" for="biaya_admin">Biaya Admin</label>
                    <div class="col-md-12">
                        <input type="text" placeholder="Contoh : 2500" class="form-control form-control-line" required name="biaya_admin" id="biaya_admin" autocomplete="off"> </div>
                </div>
                <div class="form-group">
                    <label class="col-md-12" for="keterangan">Keterangan</label>
                    <div class="col-md-12">
                        <input type="text" id="keterangan" name="keterangan" placeholder="Contoh : Beli Buku di Tokopedia" class="form-control form-control-line" autocomplete="off"> </div>
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