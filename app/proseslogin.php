<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'conn.php';
 
// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];
 
 
// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"select * from luthfi_admin where username='$username' and password='$password'");
/// menyeleksi data user dengan username dan password yang sesuai;

$cek = mysqli_num_rows($login);
 
if($cek > 0){
 
 $data = mysqli_fetch_assoc($login);

 $_SESSION['id_user']= $data['id_user'];
 // cek jika user login sebagai admin
 if($data['level']=="Admin"){
 
 // buat session login dan username
 $_SESSION['username'] = $username;
 $_SESSION['level'] = "Admin";
 // alihkan ke halaman dashboard admin
 header("location:luthfi_admin/index.php");
 
 // cek jika user login sebagai pegawai
 }else if($data['level']=="Petugas"){
 // buat session login dan username
 $_SESSION['username'] = $username;
 $_SESSION['level'] = "Petugas";
 // alihkan ke halaman dashboard pegawai
 header("location:luthfi_anggota/index.php");
 
 // cek jika user login sebagai pengurus
 }else if($data['level']=="pengurus"){
 // buat session login dan username
 $_SESSION['username'] = $username;
 $_SESSION['level'] = "pengurus";
 // alihkan ke halaman dashboard pengurus
 header("location:luthfi_petugas/index.php");
 
 }else{
 header("location:index.php?pesan=gagal");
 }
 
 
}else{
 header("location:index.php?pesan=gagal");
}
 



?>