<?php
session_start();
include "conn.php"; // Pastikan Anda memiliki file koneksi ke database

// Cek apakah pengguna sudah login
if (isset($_SESSION['username'])) {
    header('Location:index.php');
    exit();
}

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Gunakan hashing yang lebih aman seperti password_hash di sistem nyata

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $_SESSION['username'] = $username;
        header('Location:index.php');
        exit();
    } else {
        echo "<script>alert('Username atau password salah');</script>";
    }
}

// Proses sign up dengan unggah gambar
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $jenis_gambar = $_FILES['nama_file']['type'];
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $username = $_POST['username']; // Gunakan password_hash di sistem nyata
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
			header('location:index.php');
		} else {
			echo "<p>Gambar gagal dikirim</p>";
		}
	} else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
	}
} else {
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 400px;
            margin-top: 50px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="mb-3">
                <input type="text" name="nama" class="form-control" placeholder="Nama" required>
            </div>
            <div class="mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username" required>
            </div>
            <div class="mb-3">
                <select name="jk" class="form-control">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <input type="text" name="kelas" class="form-control" placeholder="Kelas" required>
            </div>
            <div class="mb-3">
                <input type="date" name="ttl" class="form-control" placeholder="Tanggal Lahir" required>
            </div>
            <div class="mb-3">
                <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
            </div>
            <div class="mb-3">
                <label>Upload Foto Profil</label>
                <input type="file" name="nama_file" class="form-control" required>
            </div>
            <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
        </form>
    </div>
</body>
</html>
