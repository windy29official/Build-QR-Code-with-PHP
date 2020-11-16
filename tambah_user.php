<?php 
require_once('koneksi.php');
include("phpqrcode/qrlib.php");
$tempdir = "qrcode/"; //<-- Nama Folder file QR Code kita nantinya akan disimpan
if (!file_exists($tempdir))#kalau folder belum ada, maka buat.
mkdir($tempdir);

		$nama 	= $_REQUEST['nama'];
		$date	= date('ymd');
		
		$query = "SELECT max(iduser) as maxKode FROM user";
		$hasil = mysqli_query($conn, $query);
		$data = mysqli_fetch_array($hasil);
		$id = $data['maxKode'];
		$noUrut = (int) substr($id, 9, 3);
		$noUrut++;
		$char = "US-";
		$id = $char . $date . sprintf("%03s", $noUrut);
		
		$query = mysqli_query($conn, "INSERT INTO user (iduser, nama,status_aktif) 
		VALUES ('$id','$nama','Y')");
	
		if($query) {
			#parameter inputan
		$isi_teks = $id;
		$namafile = base64_encode($nama).'.png';
		$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
		$ukuran = 10; //batasan 1 paling kecil, 10 paling besar
		$padding = 1;
		
			QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
			echo json_encode(array( 'response'=>'1' ));
		} else {
			echo json_encode(array( 'response'=>'0' ));
		}
	
	mysqli_close($conn);
	
?>