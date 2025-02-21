<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location:../index.php');
} else {
    include "../conn.php";
?>


<!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Skadacibook</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta name="description" content="Hakko Bio Richard">
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

        
        <style type="text/css">

        </style>
    </head>
    <body class="skin-blue">
        <header class="header">
        <a href="index.php" class="logo">
            <img src="download.jpg" height="30" width="30" class="img-circle" alt="User Image" />Skadacibook            </a>
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
                                <span><?php echo $_SESSION['level']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">

                            <li>
                                    <a>
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
                            <p><?php echo $_SESSION['username']; ?> Sebagai Petugas</p>
                        </center>

                    </div>
                </div>
                <?php include "sidebar.php"; ?>
            </section>
        </aside>
        <aside class="right-side">
        <style>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
  border: 1px solid #ddd;
}

.pagination a.active {
  background-color: skyblue;
  color: white;
  border: 1px solid skyblue;
}

.pagination a:hover:not(.active) {background-color: skyblue;}
</style>
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <header class="panel-heading">
                    <b>Data Anggota</b>

                </header>
                <div class="panel-body table-responsive">
                    <div class="box-tools m-b-15">
                        <form action="master-anggota.php" method="POST">
                            <div class="input-group">
                                <input type='text' class="form-control input-sm pull-right" style="width: 150px;" name='qcari'  required />
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                    <div class="text-right" style="margin-right: 97%;">
                             <a href="tambah-anggota.php" class="btn btn-sm btn-info">Tambah Anggota <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    <?php
                    $query1 = "select * from luthfi_anggota";

                    if (isset($_POST['qcari'])) {
                        $qcari = $_POST['qcari'];
                        $query1 = "SELECT * FROM  luthfi_anggota 
       where email like '%$qcari%'
       or nama like '%$qcari%'  ";
                    }
                    $tampil = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                    ?>
                    <table id="example" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <center>Email </center>
                                </th>
                                <th>
                                    <center>Nama </center>
                                </th>
                                <th>
                                    <center>Username </center>
                                </th>
                                <th>
                                    <center>Jenis Kelamin </center>
                                </th>
                                <th>
                                    <center>Kelas</center>
                                </th>
                                <th>
                                    <center>Tanggal Lahir </center>
                                </th>
                                <th>
                                    <center>Alamat </center>
                                </th>
                                <th>
                                    <center>Tools</center>
                                </th>
                            </tr>
                        </thead>
                        <?php while ($data = mysqli_fetch_array($tampil)) { ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $data['email']; ?></td>
                                    <td><a href="detail-anggota.php?hal=edit&kd=<?php echo $data['id_anggota']; ?>"><span class="fa fa-user"></span> <?php echo $data['nama']; ?></a></td>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><?php echo $data['jk']; ?></td>
                                    <td><?php echo $data['kelas']; ?></td>
                                    <td><?php echo $data['ttl']; ?></td>
                                    <td><?php echo $data['alamat']; ?></td>
                                    <td>
                                        <center>
                                            <div id="thanks"><a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Anggota" href="edit-anggota.php?hal=edit&kd=<?php echo $data['id_anggota']; ?>"><span class="glyphicon glyphicon-edit"></span></a>
                                                <a onclick="return confirm ('Yakin hapus <?php echo $data['nama']; ?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Anggota" href="hapus-anggota.php?hal=hapus&kd=<?php echo $data['id_anggota']; ?>"><span class="glyphicon glyphicon-trash"></a>
                                        </center>
                                    </td>
                                </tr>
                </div>
            <?php
                        }
            ?>
            </tbody>
            </table>
            <center>
                        <div class="pagination">
  <a href="#">&laquo;</a>
  <a href="#">1</a>
  <a href="#" class="active">2</a>
  <a href="#">3</a>
  <a href="#">4</a>
  <a href="#">5</a>
  <a href="#">6</a>
  <a href="#">&raquo;</a>
</div>
                </center>


            <?php $tampil = mysqli_query($conn, "select * from luthfi_anggota order by id_anggota");
                        $user = mysqli_num_rows($tampil);
                        ?>
                        <center>
                            <h4>Jumlah Anggota : <?php echo "$user"; ?> Orang </h4>
                        </center>

                        <div class="text-right" style="margin-top: 10px;">
                             <a href="tambah-anggota.php" class="btn btn-sm btn-info">Tambah Anggota <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                        </div>
                    </div>
                </div>
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
    </script>
    </body>

    </html>
