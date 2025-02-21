<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location:../index.php');
} else {
    include "../conn.php";
    $today = date('Y-m-d');
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Skadacibook</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="keywords" content="Perpus, Website, Aplikasi, Perpustakaan, Online">
        <link href="../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <link href="../css/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="../css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <link href="../css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <link href="../css/iCheck/all.css" rel="stylesheet" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <style type="text/css">

        </style>
    </head>
    <?php
    $query3 = mysqli_query($conn, "select id_anggota,nama from luthfi_anggota");
    $query2 = mysqli_query($conn, "select id_buku,judul from luthfi_buku");

    ?>

    <body class="skin-blue">
        <header class="header">

            <a href="index.php" class="logo">
                <img src="download.jpg" height="30" width="30" class="img-circle" alt="User Image" />Skadacibook </a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span><?php echo $_SESSION['username']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>

                                <li>
                                    <a href="detail-admin.php?hal=edit&kd=<?php echo $_SESSION['id_user']; ?>">
                                        <i class="fa fa-user fa-fw pull-right"></i>
                                        Profile
                                    </a>
                                    <a href="admin.php">
                                        <i class="fa fa-cog fa-fw pull-right"></i>
                                        Settings
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="../logout.php"><i class="fa fa-ban fa-fw pull-right"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <?php

        ?>
    <?php } ?>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="info">
                        <center>
                            <p>Login Sebagai <?php echo $_SESSION['username']; ?></p>
                        </center>
                        <?php
        $user=$_SESSION['id_user'];

                        $query1 = "SELECT * from luthfi_temp INNER JOIN
                         luthfi_anggota on luthfi_anggota.id_anggota=luthfi_temp.id_anggota INNER JOIN
                         luthfi_buku on luthfi_buku.id_buku=luthfi_temp.id_buku where luthfi_temp.id_user = $user";
                        $query3 = mysqli_query($conn, "SELECT id_anggota,nama from luthfi_anggota");
                        $query2 = mysqli_query($conn, "SELECT id_buku,judul from luthfi_buku");
                        $query4 = mysqli_query($conn, "SELECT luthfi_temp.tgl_peminjaman,luthfi_temp.tgl_pengembalian,luthfi_temp.id_anggota from luthfi_temp INNER JOIN
  luthfi_anggota on luthfi_anggota.id_anggota=luthfi_temp.id_anggota INNER JOIN
  luthfi_buku on luthfi_buku.id_buku=luthfi_temp.id_buku where luthfi_temp.id_user =$user limit 1");
                        $tgl_pinjam = mysqli_fetch_assoc($query4);

                        $tampil = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                        $luthfiB = ["sudah" => "success", "belum" => "danger"];


                        ?>


                    </div>
                </div>
                <?php include "sidebar.php"; ?>
            </section>
        </aside>

        <aside class="right-side">
            <section class="content">

                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel">
                            <header class="panel-heading">
                                <b>Input Peminjaman Buku</b>
                            </header>

                            <div class="panel-body">
                                <form class="form-horizontal style-form" style="margin-top: 20px;" action="gambar_pinjam.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">ID Peminjaman</label>
                                        <div class="col-sm-8">
                                            <input name="id_peminjam" type="text" id="id_peminjam" class="form-control" placeholder="di isi otomatis" autofocus="on" readonly="readonly" />
                                        </div>
                                    </div>
                                         
                                    <?php 
                                    if (isset($_GET['sts'])){
                                        $sts = $_GET['sts'];
                                        $tgl_peminjaman = $_GET['tgl_peminjaman'];
                                        $tgl_pengembalian = $_GET['tgl_pengembalian'];
                                        $id_anggota=$_GET['id_anggota'];

                                        $querya=mysqli_query($conn, "SELECT nama from luthfi_anggota where id_anggota='$id_anggota'");
                                        while($res = mysqli_fetch_assoc($querya)){
                                            $nama = $res['nama'];
                                        }
                                    }
                                    ?>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                                        <div class="col-sm-8">
                                            <select  class="form-select" id="id_anggota" name="id_anggota">
                                                <option value="<?php if(isset($_GET['sts'])){echo"value='$tgl_peminjaman'";}?>"></option>
                                                
                                                    <?php if(isset($_GET['sts'])){ ?>
                                                    <option value="<?= $id_anggota ?>" selected><?= $nama ?></option>

                                                    <?php }else{?>
                                                        <?php foreach ($query3 as $val1) : ?>
                                                    <option value="<?= $val1['id_anggota'] ?>"><?= $val1['nama'] ?></option>
                                                <?php  endforeach; }?>
                                            </select>
                                            <input type="hidden" name="id_user" value="<?= $user?>">
                                        </div>
                                        </div>
                                  
                                        <?php 
                                   
                                    ?>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Buku</label>
                                        <div class="col-sm-8">
                                            <select  class="form-select" id="id_buku" name="id_buku" >
                                                <option value=""></option>
                                                <?php foreach ($query2 as $val2) : ?>
                                                    <option value="<?= $val2['id_buku'] ?>"><?= $val2['judul'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        </div>
                                   
                                        <div class="form-group">
                                        <label class="col-sm-2 control-label">Tanggal Peminjaman</label>
                                        <div class="col-sm-8">
                                            <input name="tgl_peminjaman" class="form-control" id="tgl_peminjaman" type="date" value="<?= $today ?>" readonly required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label"> Tanggal Pengembalian</label>
                                        <div class="col-sm-8">
                                            <input name="tgl_pengembalian" class="form-control" id="tgl_pengembalian" <?php if(isset($_GET['sts'])){echo"value='$tgl_pengembalian'";}?> type="date" placeholder="Masukan Tanggal" required />
                                        </div>
                                    </div>

                            </div>
                            <div class="form-group" style="margin-bottom: 20px;">
                                <label class="col-sm-2 col-sm-2 control-label"></label>
                                <div class="col-sm-8">
                                    <input type="submit" value="Tambah" name="tambah" class="btn btn-sm btn-primary" />
                                    <a href="#" class="btn btn-sm btn-danger">Batal </a>
                                    </form>

                                </div>
                                <div style="margin-top: 20px;"></div>


                                <br><br>
                                <table id="example" class="table table-hover table-bordered">
                                    <thead>

                                    <tbody>
                                        <tr>

                                            <th>
                                                <center>Nama</center>
                                            </th>
                                            <th>
                                                <center>Buku</center>
                                            </th>
                                            <th>
                                                <center>Tgl peminjaman </center>
                                            </th>
                                            <th>
                                                <center>tgl penembalian</center>
                                            </th>
                                            <th>
                                                <center>Foto</center>
                                            </th>
                                            <th>
                                                <center>tools</center>
                                            </th>





                                        </tr>
                                        </thead>

                                        <?php while ($data = mysqli_fetch_array($tampil)) { ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['judul']; ?></td>
                                            <td><?php echo $data['tgl_peminjaman']; ?></td>
                                            <td><?php echo $data['tgl_pengembalian']; ?></td>

                                            <td>
                                                <center><img src="<?php echo $data['gambar']; ?>" class="img-square" height="80" width="75" style="border: 3px solid #333333;" /></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <a onclick="return confirm ('Yakin hapus <?php echo $data['judul']; ?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Buku" href="pengembalian-pinjam.php?hal=hapus&id_buku=<?php echo $data['id_buku']; ?>"><span class="glyphicon glyphicon-trash"></a>
                                                </center>
                                            </td>
                                            </td>

                                            <?php

                                            ?>

                                        </tr>
                            </div>
                        <?php
                                        }
                        ?>
                        </tbody>
                        </table>
                        <div class='row mt-2'>
                            <form action="gambar_pinjam.php" method="post">
                                <input type="hidden" name="tgl_peminjaman" value="<?= $tgl_pinjam['tgl_peminjaman'] ?>">
                                <input type="hidden" name="tgl_pengembalian" value="<?= $tgl_pinjam['tgl_pengembalian'] ?>">
                                <input type="hidden" name="id_anggota" value="<?= $tgl_pinjam['id_anggota'] ?>">
                                <input type="hidden" name="id_user" value="<?= $user?>">
                                <center>
                                <input style="width: 100%;" type="submit" value="Simpan" name="simpan" class="btn me-auto btn-primary w-100" />

                                </center>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
    </div>

    </section>

    </aside>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="../js/jquery.min.js" type="text/javascript"></script>


    <script src="../js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>

    <script src="../js/bootstrap.min.js" type="text/javascript"></script>

    <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

    <script src="../js/plugins/chart.js" type="text/javascript"></script>

    <script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

    <script src="../js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>


    <script src="../js/Director/app.js" type="text/javascript"></script>

    <script src="../js/Director/dashboard.js" type="text/javascript"></script>

    <script type="text/javascript">
        $('input').on('ifChecked', function(event) {
            $(this).parents('li').addClass("task-done");
            console.log('ok');
        });
        $('input').on('ifUnchecked', function(event) {
            $(this).parents('li').removeClass("task-done");
            console.log('not');
        });
    </script>
    <script>
        $('#noti-box').slimScroll({
            height: '400px',
            size: '5px',
            BorderRadius: '5px'
        });

        $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
            checkboxClass: 'icheckbox_flat-grey',
            radioClass: 'iradio_flat-grey'
        });
    </script>
    <script type="text/javascript">
        $(function() {
            "use strict";

            var data = {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                        label: "My First dataset",
                        fillColor: "rgba(220,220,220,0.2)",
                        strokeColor: "rgba(220,220,220,1)",
                        pointColor: "rgba(220,220,220,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(220,220,220,1)",
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                    {
                        label: "My Second dataset",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: [28, 48, 40, 19, 86, 27, 90]
                    }
                ]
            };
            new Chart(document.getElementById("linechart").getContext("2d")).Line(data, {
                responsive: true,
                maintainAspectRatio: false,
            });

        });
    

    </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
   <script type="text/javascript">

     $("#id_buku").select2({
placeholder:"Pilih Buku" 
     });

     $("#id_anggota").select2({
placeholder:"Pilih Anggota"
     });

   
</script>
    </body>

    </html>