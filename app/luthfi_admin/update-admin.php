<?php
include "../conn.php";
$user_id       = $_POST['id_user'];
$username      = $_POST['username'];
$password      = $_POST['password'];
$fullname      = $_POST['fullname'];

$query = mysqli_query($conn, "UPDATE luthfi_admin SET username='$username', password='$password', fullname='$fullname' WHERE id_user='$user_id'")or die(mysqli_error($conn));
if ($query){
header('location:master-admin.php');	
} else {
	echo "gagal";
    }
