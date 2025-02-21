`<?php
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
                                <span><?php echo $_SESSION['username']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                                <li class="dropdown-header text-center">Account</li>

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
    <?php } ?>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="info">
                    <center>
                            <p> <?php echo $_SESSION['username']; ?> Login Sebagai Admin</p>
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
                                <b>Input Buku</b>

                            </header>
                            <div class="panel-body">
                                <form class="form-horizontal style-form" style="margin-top: 20px;" action="gambar-buku.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
            
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Judul</label>
                                        <div class="col-sm-8">
                                            <input name="judul" type="text" id="judul" class="form-control" autocomplete="off" placeholder="Judul Buku" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Pengarang</label>
                                        <div class="col-sm-8">
                                            <input name="pengarang" type="text" id="pengarang" class="form-control" autocomplete="off" placeholder="Pengarang" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Tahun Terbit</label>
                                        <div class="col-sm-8">
                                            <input name="th_terbit" type="text" id="th_terbit" class="form-control" autocomplete="off" placeholder="Tahun Terbit" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Penerbit</label>
                                        <div class="col-sm-8">
                                            <input name="penerbit" type="text" id="penerbit" class="form-control" autocomplete="off" placeholder="Penerbit" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">ISBN</label>
                                        <div class="col-sm-8">
                                            <input name="isbn" type="text" id="isbn" class="form-control" autocomplete="off" placeholder="ISBN" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Kategori</label>
                                        <div class="col-sm-8">
                                            <input name="kategori" type="text" id="Kategori" class="form-control" autocomplete="off" placeholder="Kategori" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Stok</label>
                                        <div class="col-sm-8">
                                            <input name="stok" type="text" id="stok" class="form-control" autocomplete="off" placeholder="Stok" required="" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Jumlah Halaman</label>
                                        <div class="col-sm-8">
                                            <input name="jumlah_buku" type="text" id="jumlah_buku" class="form-control" autocomplete="off" placeholder="Jumlah Halaman" required />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Asal</label>
                                        <div class="col-sm-4">
                                            <select class="form-control" name="asal" id="asal" required>
                                                <option value=""> -- Pilih Salah Satu --</option>
                                                <option value="Pembelian"> Pembelian</option>
                                                <option value="Sumbangan"> Sumbangan</option>
                                                <option value="Koleksi Skadacibook"> Koleksi Skadacibook</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Tanggal Input</label>
                                        <div class="col-sm-8">
                                            <input name="tgl_input" type="text" id="tgl_input" class="form-control" autocomplete="off" value="<?php echo "" . date("Y/m/d") . ""; ?>" readonly="readonly" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                                        <div class="col-sm-8">
                                            <input name="nama_file" id="nama_file" type="file" />
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <label class="col-sm-2 col-sm-2 control-label"></label>
                                        <div class="col-sm-8">
                                            <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                            <a href="master-buku.php" class="btn btn-sm btn-danger">Batal </a>
                                        </div>
                                    </div>
                                    <div style="margin-top: 20px;"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
             
            </section>


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
    </body>

    </html>`