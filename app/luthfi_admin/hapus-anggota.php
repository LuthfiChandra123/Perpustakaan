<?php
include "../conn.php";
$id = $_GET['kd'];

$query = mysqli_query($conn,"DELETE FROM luthfi_anggota WHERE id_anggota ='$id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'master-anggota.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'master-anggota.php'</script>";	
}
