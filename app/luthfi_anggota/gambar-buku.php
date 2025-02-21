<?php


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
    $asal = $_POST['asal'];
    $Stok = $_POST['Stok'];
    $tgl_input = $_POST['tgl_input'];
    $link_buku = $_POST['link_buku'];


    if ($jenis_gambar == "image/jpeg" || $jenis_gambar == "image/jpg" || $jenis_gambar == "image/gif" || $jenis_gambar == "image/png") {
        $gambar = $namafolder . basename($_FILES['nama_file']['name']);
        if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
            $sql = "INSERT INTO luthfi_buku(id_buku,judul,pengarang,th_terbit,penerbit,isbn,kategori,jumlah_buku,asal,Stok,tgl_input,gambar) VALUES
            ('$id','$judul','$pengarang','$th_terbit','$penerbit','$isbn','$kategori','$jumlah_buku','$asal','$Stok','$tgl_input','$gambar')";
            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
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
