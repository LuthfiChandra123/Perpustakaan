<?php

include "../conn.php";
if (!empty($_FILES["nama_file"]["tmp_name"])) {
	$jenis_gambar = $_FILES['nama_file']['type'];
	$id = $_POST['id_anggota'];
	$email = $_POST['email'];
	$nama = $_POST['nama'];
	$username = $_POST['username'];
	$jk = $_POST['jk'];
	$kelas = $_POST['kelas'];
	$ttl = $_POST['ttl'];
	$alamat = $_POST['alamat'];

	if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif" || $jenis_gambar == "image/png") {
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql = "INSERT INTO luthfi_anggota(id_anggota,email,nama,username,jk,kelas,ttl,alamat,gambar) VALUES
            ('$id','$email','$nama','$username','$jk','$kelas','$ttl','$alamat','$gambar')";
			$res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
			header('location:master-anggota.php');
		} else {
			echo "<p>Gambar gagal dikirim</p>";
		}
	} else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
	}
} else {
	echo "Anda belum memilih gambar";
}
