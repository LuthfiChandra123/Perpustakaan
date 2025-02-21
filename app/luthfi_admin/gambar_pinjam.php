<?php
include "../conn.php";
if (isset($_POST['tambah'])) {
    $id_peminjam = $_POST['id_peminjam'];
    $id_anggota = $_POST['id_anggota'];
    $id_buku = $_POST['id_buku'];
    $tgl_peminjaman = $_POST['tgl_peminjaman'];
    $tgl_pengembalian = $_POST['tgl_pengembalian'];
    $user = $_POST['id_user'];

    $selSto = mysqli_query($conn, "SELECT * FROM luthfi_buku where id_buku=$id_buku");

    $sto    = mysqli_fetch_array($selSto);
    $stok    = $sto['stok'];

    
    //menghitung sisa stok
    $sisa    = $stok - 1;

   
    if ($stok < 1) {
       
?>
        <script language="JavaScript">
            alert('Oops! Jumlah pengeluaran lebih besar dari stok ...');
            document.location = './tambah-pinjam.php';
        </script>
        <?php
    }
    //proses    
    else {
        $sql = mysqli_query($conn ,"INSERT INTO `luthfi_temp` (`id_anggota`, `id_buku`,`id_user`, `tgl_peminjaman`, `tgl_pengembalian`) VALUES ('$id_anggota', '$id_buku','$user', '$tgl_peminjaman', '$tgl_pengembalian')");


        if ($sql) {
            //update stok
            $upstok = mysqli_query($conn, "UPDATE `luthfi_buku` SET `stok`='$sisa' WHERE `id_buku`='$id_buku'");
            if ($upstok) {


        ?>
        
                <script language="JavaScript">
                    alert('Good! Input transaksi pengeluaran barang berhasil ...');
                    document.location = './tambah-pinjam.php?sts=1&tgl_peminjaman=<?=$tgl_peminjaman?>&tgl_pengembalian=<?=$tgl_pengembalian?>&id_anggota=<?=$id_anggota?>';
                </script>
<?php
            }
        } else {
            echo "<div><b>Oops!</b> 404 Error Server.</div>";
        }
    }
}elseif (isset($_POST['simpan'])){
    $user = $_POST['id_user'];
$tgl_peminjam= $_POST['tgl_peminjaman'];
$tgl_pengembali= $_POST['tgl_pengembalian'];
$id_anggota= $_POST['id_anggota'];
  
$query=mysqli_query($conn ,"INSERT INTO `luthfi_peminjam` (`id_peminjam`, `id_user`, `id_anggota`, `tgl_peminjaman`, `tgl_pengembalian`, `status`) VALUES (NULL, '$user', '$id_anggota', '$tgl_peminjam', '$tgl_pengembali', 'belum')");

if($query){
    $query2 = mysqli_query($conn,"SELECT `id_peminjam` FROM `luthfi_peminjam` WHERE `id_user` = '$user' ORDER BY `id_peminjam` DESC LIMIT 1;");
    $tampung=mysqli_fetch_assoc($query2);
    $id_peminjam=$tampung['id_peminjam'];
    if($query2){
        $query3=mysqli_query($conn,"INSERT INTO `luthfi_peminjam_det` (`id_peminjam`,`id_buku`) SELECT '$id_peminjam',`luthfi_temp`.`id_buku` FROM luthfi_temp WHERE `luthfi_temp`.`id_user`=$user");

        $query4 = mysqli_query($conn,"DELETE FROM `luthfi_temp` WHERE `id_user` = $user");
        echo "<script language='JavaScript'>
        alert('Good! Input transaksi pengeluaran barang berhasil ...');
        document.location = './master-pinjam.php';
    </script>";
    }else{
        echo "<script language='JavaScript'>
        alert('Good! Input transaksi pengeluaran barang gagal ...');
        document.location = './tambah-pinjam.php';
    </script>";
    }
}else{
    echo "<script language='JavaScript'>
    alert('Good! Input transaksi pengeluaran barang gagal ...');
    document.location = './tambah-pinjam.php';
</script>";
}
}

?>