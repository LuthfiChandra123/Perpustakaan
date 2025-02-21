<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location:../index.php');
} else {
    include "../conn.php";
?>
    <!DOCTYPE html>
    <html>
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
    <head>
        <meta charset="UTF-8">
        <title></title>
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
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
     
        <link href="../css/style.css" rel="stylesheet" type="text/css" />




        <style type="text/css">

        </style>
    </head>

    <body class="skin-blue">
        <header class="header">
            <a href="index.php" class="logo">
            <img src="download.jpg" height="30" width="30" class="img-circle" alt="User Image" />Skadacibook            </a>
            <nav class="navbar navbar-static-top">
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
                                <li class="dropdown-header text-center">Account</li>

                                <li>
                                    <a href="detail-admin.php?hal=edit&kd=<?php echo $_SESSION['id_user']; ?>">
                                        <i class="fa fa-user fa-fw pull-right"></i>
                                        Profile
                                    </a>
                                    <a href="master-admin.php">
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
                            <p><?php echo $_SESSION['username']; ?>  Sebagai <?php echo $_SESSION['level']; ?></p>
                        </center>

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
                                <b>Data Peminjaman</b>

                            </header>
                            <div class="panel-body table-responsive">
                                <div class="box-tools m-b-15">
                                    <form action="master-pinjam.php" method="POST">
                                        <div class="input-group">
                                            <input type='text' class="form-control input-sm pull-right" style="width: 150px;" name='qcari'  required />
                                            <div class="input-group-btn">
                                                <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="text-right" style="margin-right: 100%;">
                        <a href="tambah-pinjam.php" class="btn btn-sm btn-info">Peminjaman buku<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                        <br>
                                <?php
                         $query1 ="SELECT luthfi_peminjam.*, luthfi_admin.username, luthfi_anggota.nama FROM luthfi_peminjam INNER JOIN luthfi_peminjam_det ON luthfi_peminjam.id_peminjam = luthfi_peminjam_det.id_peminjam INNER JOIN luthfi_admin ON luthfi_peminjam.id_user = luthfi_admin.id_user INNER JOIN luthfi_anggota ON luthfi_anggota.id_anggota = luthfi_peminjam.id_anggota GROUP BY luthfi_peminjam_det.id_peminjam";
$query2 ="SELECT * from luthfi_peminjam INNER JOIN
luthfi_anggota on luthfi_anggota.id_anggota=luthfi_peminjam.id_anggota INNER JOIN
luthfi_buku on luthfi_buku.id_buku=luthfi_peminjam.id_buku";

$batas = 10;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$query4 = "SELECT luthfi_peminjam.*, luthfi_admin.username, luthfi_anggota.nama 
            FROM luthfi_peminjam 
            INNER JOIN luthfi_peminjam_det ON luthfi_peminjam.id_peminjam = luthfi_peminjam_det.id_peminjam 
            INNER JOIN luthfi_admin ON luthfi_peminjam.id_user = luthfi_admin.id_user 
            INNER JOIN luthfi_anggota ON luthfi_anggota.id_anggota = luthfi_peminjam.id_anggota 
            GROUP BY luthfi_peminjam_det.id_peminjam 
            LIMIT $halaman_awal, $batas";
			
                
                        $tampil = mysqli_query($conn, $query1) or die(mysqli_error($conn));
                        $total_data = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM luthfi_peminjam"));
                        $total_halaman = ceil($total_data / $batas);
                        $luthfiB = ["sudah"=>"success","belum"=>"danger"];
                                ?>
                                

                                <table id="example" class="table table-hover table-bordered">
                                    <thead>
                                  
                                        <tbody>
                                        <tr>
                                            <th>
                                                <center>Kode Peminjaman </center>
                                            </th>
                                            <th>
                                                <center>Nama</center>
                                            </th>
                                            <!-- <th>
                                                <center>Buku</center>
                                            </th> -->
                                            <th>
                                                <center>Tgl peminjaman </center>
                                            </th>
                                            <th>
                                                <center>tgl penembalian</center>
                                            </th>
                                            <!-- <th>
                                                <center>Foto</center>
                                            </th> -->
                                            <th>
                                                <center>Petugas</center>
                                            </th>
                                            <th>
                                                <center>Status</center>
                                            </th>

                                            <th>
                                                <center>tools</center>
                                            </th>

                                        
                                        </tr>
                                    </thead>
                                     
                                            <?php while ($data = mysqli_fetch_array($tampil)) { ?>
                                            <tbody>
                                            <tr>
                                                <td>0P0<?php echo $data['id_peminjam']; ?></td>
                                                <td><?= $data['nama']?></td>
                                                <td><?php echo $data['tgl_peminjaman']; ?></td>
                                                <td><?php echo $data['tgl_pengembalian']; ?></td>
                                               
                            
                                                <td><?php echo $data['username']; ?></td>
                                                <td><div class="btn btn-sm btn-<?= $luthfiB[$data['status']]?>"><?= $data['status']?></div></td>
                                                <td>
                                                    
                                        <center> 
                                                <a class="btn btn-sm btn-info tooltips" data-placement="bottom" data-toggle="tooltip" title="Pengembalian Buku" name="id_peminjam" href="lihat-detail-pinjam.php?id=<?php echo $data['id_peminjam']; ?>">detail</a>
                                                <a class="btn btn-sm btn-success tooltips" data-placement="bottom" data-toggle="tooltip" title="Pengembalian Buku" name="id_peminjam" href="update-pinjam.php?hal=edit&kd=<?php echo $data['id_peminjam']; ?>&id_buku=<?php echo $data['id_peminjam']; ?>">sudah<span class="glyphicon glyphicon-ok"></a>
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
                        </div>
                    </div>
                </div>
    </div>
  
    </section><!-- /.content -->

    </aside><!-- /.right-side -->

    </div>



    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script src="../js/jquery.min.js" type="text/javascript"></script>

    <!-- jQuery UI 1.10.3 -->
    <script src="../js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
    <!-- Bootstrap -->
    <script src="../js/bootstrap.min.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

    <script src="../js/plugins/chart.js" type="text/javascript"></script>
    <script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- calendar -->
    <script src="../js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>
    <script src="../js/Director/app.js" type="text/javascript"></script>
    <script src="../js/Director/dashboard.js" type="text/javascript"></script>
    <script type="text/javascript">
        s('input').on('ifChecked', function(event) {
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
    </body>

    </html>
