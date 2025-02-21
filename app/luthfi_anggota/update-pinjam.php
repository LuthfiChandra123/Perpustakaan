<?php
include "../conn.php";
$id= $_GET['kd'];
$id_buku= $_GET['id_buku'];
$user = $_POST['id_user'];
$selSto = mysqli_query($conn, "SELECT * FROM luthfi_buku where id_buku=$id_buku");

    $sto    = mysqli_fetch_array($selSto);
    $stok    = $sto['stok'];

    
    //menghitung sisa stok
    $sisa    = $stok + 1;

$query= mysqli_query($conn,"UPDATE `luthfi_peminjam` SET  `status` = 'sudah' WHERE id_peminjam = '$id'");
$query2= mysqli_query($conn,"UPDATE `luthfi_buku` INNER JOIN luthfi_peminjam_det ON luthfi_peminjam_det.id_buku = luthfi_buku.id_buku SET  `stok` = '$sisa' WHERE luthfi_peminjam_det.id_peminjam = '$id'");

if ($query2){
header('location:master-pinjam.php');	
} else {
	echo "gagal";
    }