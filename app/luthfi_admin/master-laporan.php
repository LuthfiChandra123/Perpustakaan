<?php
session_start();
if (empty($_SESSION['username'])) {
    header('location:../index.php');
} else {
    include "../conn.php";
}

$tgl_mulai = isset($_POST['tgl_mulai']) ? $_POST['tgl_mulai'] : '';
$tgl_selesai = isset($_POST['tgl_selesai']) ? $_POST['tgl_selesai'] : '';

$query = "SELECT luthfi_peminjam.*, luthfi_admin.username, luthfi_anggota.nama FROM luthfi_peminjam 
          INNER JOIN luthfi_peminjam_det ON luthfi_peminjam.id_peminjam = luthfi_peminjam_det.id_peminjam 
          INNER JOIN luthfi_admin ON luthfi_peminjam.id_user = luthfi_admin.id_user 
          INNER JOIN luthfi_anggota ON luthfi_anggota.id_anggota = luthfi_peminjam.id_anggota ";

if (!empty($tgl_mulai) && !empty($tgl_selesai)) {
    $query .= " WHERE tgl_peminjaman BETWEEN '$tgl_mulai' AND '$tgl_selesai'";
}

$query .= " GROUP BY luthfi_peminjam_det.id_peminjam";
$tampil = mysqli_query($conn, $query) or die(mysqli_error($conn));
?>

<!DOCTYPE html>
<html lang="id">
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
    <style>

        .kop-container {
            text-align: center;
            margin-bottom: 20px;
        }
        .kop-line {
            border-bottom: 3px solid black;
            margin: 10px auto;
            width: 80%;
        }
        .signature {
            margin-top: 50px;
            text-align: right;
        }
        .signature p {
            margin-bottom: 80px;
        }
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>
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
    <div class="container mt-3">
        <div class="no-print">
            <form method="POST" action="" class="mb-3">
                <div class="row">
                    <div class="col-md-4">
                        <label for="tgl_mulai">Tanggal Mulai:</label>
                        <input type="date" name="tgl_mulai" class="form-control" value="<?php echo $tgl_mulai; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="tgl_selesai">Tanggal Selesai:</label>
                        <input type="date" name="tgl_selesai" class="form-control" value="<?php echo $tgl_selesai; ?>">
                    </div>
                    <div class="col-md-4 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary w-100">Filter</button>
                        <button onclick="window.print()" class="btn btn-primary w-100">Cetak Laporan</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="kop-container">
            <img src="download.jpg" alt="Logo" height="80">
            <div>
                <h3>Perpustakaan SMK NEGERI 2 CIMAHI</h3>
                <p>Jalan Kamarung No 69, Citeureup, Cimahi Utara</p>
                <p>Telp/Fax: (022) 87805857 | Email: smkn2cmi@yahoo.com</p>
                <p>Kota Cimahi 40512</p>
            </div>
        </div>
        <div class="kop-line"></div>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Kode Peminjaman</th>
                    <th>Nama</th>
                    <th>Tgl Peminjaman</th>
                    <th>Tgl Pengembalian</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($data = mysqli_fetch_array($tampil)) { ?>
                    <tr>
                        <td>0P0<?php echo $data['id_peminjam']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['tgl_peminjaman']; ?></td>
                        <td><?php echo $data['tgl_pengembalian']; ?></td>
                        <td><span class="badge badge-<?php echo ($data['status'] == 'sudah') ? 'success' : 'danger'; ?>">
                            <?php echo ucfirst($data['status']); ?> Dikembalikan
                        </span></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="signature">
            <p>Cimahi, <?php echo date('d-m-Y'); ?></p>
            <p><strong>Petugas Perpustakaan</strong></p>
            <p>________________________</p>
        </div>
    </div>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
