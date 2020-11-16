<?php
include("phpqrcode/qrlib.php");
$tempdir = "qrcode/"; //<-- Nama Folder file QR Code kita nantinya akan disimpan
if (!file_exists($tempdir))#kalau folder belum ada, maka buat.
mkdir($tempdir);

#parameter inputan
$isi_teks = 'windi';
$namafile = "windi.png";
$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
$ukuran = 10; //batasan 1 paling kecil, 10 paling besar
$padding = 1;

QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
?>
