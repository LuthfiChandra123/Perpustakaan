<?php
$namafolder = "gambar_admin/";

include "../conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"])) {
	$jenis_gambar = $_FILES['nama_file']['type'];
	$user_id = $_POST['id_user'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$fullname = $_POST['fullname'];
	$level = $_POST['level'];

	if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif" || $jenis_gambar == "image/png") {
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql = "INSERT INTO luthfi_admin(id_user,username,password,fullname,level,gambar) VALUES
            ('$user_id','$username','$password','$fullname','$level','$gambar')";
			$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            header('location:master-admin.php');
		} else {
			echo "<p>Gambar gagal dikirim</p>";
		}
	} else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
	}
} else {
	echo "Anda belum memilih gambar";
}