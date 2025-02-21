<?php
include "../conn.php";
$id_buku = $_GET['id_buku'];

$query = mysqli_query($conn, "DELETE FROM luthfi_temp WHERE id_buku='$id_buku'");
if ($query){
	echo "<script>alert('Buku Berhasil Dikembalikan!'); window.location = 'tambah-pinjam.php'</script>";	
} else {
	echo "<script>alert('Data Buku Gagal Dikembalikan!'); window.location = 'tambah-pinjam.php'</script>";	
}
