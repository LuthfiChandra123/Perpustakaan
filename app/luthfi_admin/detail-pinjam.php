<?php
include "../conn.php";
if(isset($_POST['simpan'])){
$id_peminjam = $_POST['kd'];



$sql ="UPDATE `luthfi_peminjam` SET status = 'sudah' WHERE id_peminjam ='$id_peminjam'";
$res = mysqli_query($conn, $sql);

$luthfi_cek = mysqli_num_rows($res);
if ($luthfi_cek > 0) {
    $luthfi_status = 'sudah';
} else {
    $luthfi_status = 'sudah';
}

$sql = "UPDATE `luthfi_peminjam` SET status = '$luthfi_status'
                 WHERE id_peminjam = '$id_peminjam'";
$res= mysqli_query($conn, $sql);

echo "<script>
        window.location.href = 'master-pinjam.php';
      </script>";
}
