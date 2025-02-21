<?php
include "../conn.php"; 

$user_id       = $_POST['id_anggota'];
$induk      = $_POST['email'];
$nama      = $_POST['nama'];
$username      = $_POST['username'];
$jk      = $_POST['jk'];
$kelas      = $_POST['kelas'];
$ttl      = $_POST['ttl'];
$alamat      = $_POST['alamat'];

$query = mysqli_query($conn, "UPDATE luthfi_anggota SET email='$induk', nama='$nama', username='$username', jk='$jk', kelas='$kelas', ttl='$ttl', alamat='$alamat' WHERE luthfi_anggota.id_anggota='$user_id'");
if ($query){
 header('location:master-anggota.php');	
} else {
	echo "gagal";
    } 