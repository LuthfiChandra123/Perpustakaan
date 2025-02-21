<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location:../index.php');
} else {
    include "../conn.php";
?>
   <?php include "sidebar.php"; ?>
<h3>
    <center>Daftar Buku Perpustakaan</center>
</h3>
<p>
<h3>
    <center>SMK Negeri 2 Cimahi</center>
</h3>
<a href="index.php?page=bukutambah">Tambah Buku</a>

<!--awal table-->
<table align="center" border="1">
    <!--awal header table-->
    <tr>
        <td width="5%" align="center">No</td>
        <td width="10%" align="center">ID Buku</td>
        <td width="30%" align="center">Judul</td>
        <td width="10%" align="center">Pengarang</td>
        <td width="25%" align="center">Penerbit</td>
        <td width="25%" align="center">Stok</td>
        <td width="20%" align="center">Aksi</td>
    </tr>
    <?php
        $ambildata = "SELECT * FROM luthfi_buku";
        $nomor =1;
        while ($tampildata = mysqli_fetch_array($ambildata1)) {
    ?>
        <tr>
            <td> <?php echo $nomor++?></td>
            <td> <?php echo $tampildata['id_buku'] ?></td>
            <td> <?php echo $tampildata['judul'] ?></td>
            <td> <?php echo $tampildata['pengarang']?></td>
            <td> <?php echo $tampildata['penerbit']?></td>
            <td> <?php echo $tampildata['Stok']?></td>
            <td align="center">
                <a href="../admin/index.php?page=bukuubah&idbuku=<?php echo $tampildata['id_buku'];?>">
                    Edit
                </a>
                |
                <a href="halaman/buku/bukuhapus.php?idbuku=<?php echo $tampildata['id_buku'];?>" onclick="return confirm('Apa Anda yakin akan menghapus Data Buku?')">
                    Delete
                </a>
            </td>
        </tr>
        <!--akhir menampilkan data dari tabel buku ke halaman web-->

    <?php
        }
    }
    ?>
</table>
<!--akhir table-->