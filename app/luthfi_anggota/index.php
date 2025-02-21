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
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
<img src="download.jpg" height="30" width="30" class="img-circle" alt="User Image" />Skadacibook            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-user"></i>
                                <span><?php echo $_SESSION['username']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>

                                <li>
                                    <a href="detail-admin.php?hal=edit&kd=<?php echo $_SESSION['id']; ?>">
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
        
    <?php } ?>
    <div class="wrapper row-offcanvas row-offcanvas-left">
    
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar">
                <div class="user-panel">
                    <div>
                        
                    </div>
                    <div class="info">
                        <center>
                        <p><?php echo $_SESSION['username']; ?>  sebagai Petugas</p>
                        </center>

                    </div>
                </div>

                <?php include "sidebar.php"; ?>
            </section>
    
        </aside>

        <aside class="right-side">

            <!-- Main content -->
            <section class="content">

                <div class="row" style="margin-bottom:5px;">

                  

                <!-- Main row -->
                <div class="row">

                    <div class="col-md-8">
                        <!--earning graph start-->
                        <section class="panel">
                            <header class="panel-heading">
                                Gambar Buku
                            </header>
                            <div class="panel-body">
                           
                            <img src="gambar_buku/9beecc09-6d1e-4ed0-b3bb-ff66d34377b5.jpg" height="130px" width="130px" class="img-square" alt="User Image" />
                                    <img src="gambar_buku/Cover_Septihan.jpeg" height="130px" width="130px" class="img-square" alt="User Image" />
                                    <img src="gambar_buku/18ea2ec6-87a6-4af2-ac1f-be6d89dac9c1.jpg" height="130px" width="130px" class="img-square" alt="User Image" />
                                    <img src="gambar_buku/c7001ce9-e0dc-4e86-8581-3a814bd91c23.jpg" height="130px" width="130px" class="img-square" alt="User Image" />
                                    <img src="gambar_buku/ed7d3a96-54af-4cc4-8bb3-af2aa8877b9c.jpg" height="130px" width="130px" class="img-square" alt="User Image" />
                                    <br><br>
                                    <img src="gambar_buku/88fa64d4-7641-4f42-a103-9f7286fe42f8.jpg" height="130px" width="130px" class="img-square" alt="User Image" />
                                    <img src="gambar_buku/fea0ab63-c12a-4ed1-9223-0022aedde99b.jpg" height="130px" width="130px" class="img-square" alt="User Image" />
                                    <img src="gambar_buku/92fd4697-bbf3-48e0-93dd-181aa1986f88.jpg" height="130px" width="130px" class="img-square" alt="User Image" />
                                    <img src="gambar_buku/6c7016ba-fa2a-4c39-b553-72b6079f5810.jpg" height="130px" width="130px" class="img-square" alt="User Image" />
                                    <img src="gambar_buku/IMG_20210201_210025.jpg" height="130px" width="130px" class="img-square" alt="User Image" />
                            </div>
                        </section>
                     

                        <div class="col-md-3">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-green"><i class="fa fa-user"></i></span>
                            <div class="sm-st-info">
                                <?php $tampil = mysqli_query($conn, "select * from luthfi_anggota order by id_anggota desc");
                                $total = mysqli_num_rows($tampil);
                                ?>
                                <span><?php echo "$total"; ?></span>
                                Total Anggota
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-red"><i class="fa fa-book"></i></span>
                            <div class="sm-st-info">
                                <?php $tampil = mysqli_query($conn, "select * from luthfi_buku order by id_buku desc");
                                $total1 = mysqli_num_rows($tampil);
                                ?>
                                <span><?php echo "$total1"; ?></span>
                                Total Buku
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="sm-st clearfix">
                            <span class="sm-st-icon st-blue"><i class="fa fa-user"></i></span>
                            <div class="sm-st-info">
                                <?php $tampil = mysqli_query($conn, "select * from luthfi_admin order by id_user desc");
                                $total2 = mysqli_num_rows($tampil);
                                ?>
                                <span><?php echo "$total2"; ?></span>
                                Total Admin
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-4">

                        <!--chat start-->
                        <section class="panel">
                            <header class="panel-heading">
                                notifikasi
                            </header>
                            <div class="panel-body" id="noti-box">
                                <?php
                                $tampil = mysqli_query($conn, "select * from luthfi_anggota order by id_anggota desc limit 1");
                                while ($data2 = mysqli_fetch_array($tampil)) {
                                ?>
                                    <div class="alert alert-block alert-success">
                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        <strong><?php echo $data2['nama']; ?></strong>, Ada Anggota Baru Nih.
                                    </div>
                                <?php } ?>

                                <?php
                                $tampil = mysqli_query($conn, "select * from luthfi_admin order by id_user desc limit 1");
                                while ($data3 = mysqli_fetch_array($tampil)) {
                                ?>
                                    <div class="alert alert-danger">
                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        <strong><?php echo $data3['fullname']; ?></strong>, Ada Admin Baru Nih.
                                    </div>
                                    
                                <?php } ?>

                                <?php
                                $tampil = mysqli_query($conn, "select * from luthfi_buku order by id_buku desc limit 1");
                                while ($data4 = mysqli_fetch_array($tampil)) {
                                ?>
                                    <div class="alert alert-info">
                                        <button data-dismiss="alert" class="close close-sm" type="button">
                                            <i class="fa fa-times"></i>
                                        </button>
                                        <strong><?php echo $data4['judul']; ?></strong>, Ada Buku Baru Nih.
                                    </div>
                                <?php } ?>

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
    <script src="../js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

    <script src="../js/Director/app.js" type="text/javascript"></script>

    <!-- Director dashboard demo (This is only for demo purposes) -->
    <script src="../js/Director/dashboard.js" type="text/javascript"></script>

    <!-- Director for demo purposes -->
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
    </body>

    </html>
