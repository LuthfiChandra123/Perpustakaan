<?php
$namafolder = "gambar_buku/"; //tempat menyimpan file

include "../conn.php";

if (!empty($_FILES["nama_file"]["tmp_name"])) {
   $jenis_gambar = $_FILES['nama_file']['type'];
   $id = $_POST['id_buku'];
   $judul = $_POST['judul'];
   $pengarang = $_POST['pengarang'];
   $th_terbit = $_POST['th_terbit'];
   $penerbit = $_POST['penerbit'];
   $isbn = $_POST['isbn'];
   $kategori = $_POST['kategori'];
   $jumlah_buku = $_POST['jumlah_buku'];
   $Stok = $_POST['stok'];
   $asal = $_POST['asal'];

   if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif" || $jenis_gambar == "image/png") {
      $gambar = $namafolder . basename($_FILES['nama_file']['name']);
      if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
         $sql ="UPDATE `luthfi_buku` SET `judul` = '$judul', `pengarang` = '$pengarang', `th_terbit` = '$th_terbit', `penerbit` = '$penerbit', `isbn` = '$isbn', `kategori` = '$kategori', `jumlah_buku` = '$jumlah_buku', `asal` = '$asal', `gambar` = '$gambar', `stok` = '$Stok' WHERE `luthfi_buku`.`id_buku` =$id";
         $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
         echo "Gambar berhasil dikirim ke direktori" . $gambar;
         header('location:master-buku.php');
      } else {
         echo "<p>Gambar gagal dikirim</p>";
      }
   } else {
      echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
   echo "Anda belum memilih gambar";
}
