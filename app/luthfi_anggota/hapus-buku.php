<?php
include "../conn.php";
$id_buku = $_GET['kd'];

$query = mysqli_query($conn, "DELETE FROM luthfi_buku WHERE id_buku='$id_buku'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'master-buku.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'master-buku.php'</script>";	
}
