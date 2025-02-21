<?php
include "../conn.php";
$user_id = $_GET['kd'];

$query = mysqli_query($conn, "DELETE FROM luthfi_admin WHERE id_user='$user_id'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'master-admin.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'master-admin.php'</script>";	
}
