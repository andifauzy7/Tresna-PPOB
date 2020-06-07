<?php  

	$string_conn	= mysqli_connect("localhost","root","","tresna-ppob");

	function query($string){
		global $string_conn;
		$result			=	mysqli_query($string_conn,"$string");
		// PROSES MENGURAI 1 PERSATU DATA.
		while($satuan 	= 	mysqli_fetch_assoc($result)){
			$hasil[] 	= 	$satuan;
		}
		return $hasil;
	}

	function add_data($string){
		global $string_conn;
		mysqli_query($string_conn, $string);
		return mysqli_affected_rows($string_conn);
	}

	function rupiah($angka){
		$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
		return $hasil_rupiah;
	}

?>