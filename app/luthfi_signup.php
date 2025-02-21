<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Skadacibook">
  <meta name="Skadacibook" content="Skadacibook">
  <link rel="icon" href="../../favicon.ico">

  <title>CHANDperpus</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="login.css" rel="stylesheet">
  <script src="js/ie-emulation-modes-warning.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>

</head>

<body background="img/page-background.png">

  <div class="container">

    <form class="form-signin" action="tambah-anggota.php" method="post">
      <center>
 <h2>
<img src="download.jpg" height="80" width="80" class="img-circle" alt="User Image" />Skadacibook</h2>    
      </center>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" id="email" name="email" class="form-control" placeholder="Email" autocomplete="off" autofocus="on" required>
      </div>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" autocomplete="off" autofocus="on" required>
      </div>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" autocomplete="off" autofocus="on" required>
      </div>
      <div class="input-group" style="margin-top: 5px;">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input type="text" id="password" name="password" class="form-control" placeholder="Password" autocomplete="off" required>
      </div>
      <div class="input-group" style="margin-top: 5px;">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <select class="form-control" name="jk" id="jk">
          <option> -- Pilih Salah Satu --</option>
          <option value="P"> Perempuan</option>
          <option value="L"> Laki-laki</option>
        </select>
      </div>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" id="kelas" name="kelas" class="form-control" placeholder="Usia" autocomplete="off" autofocus="on" required>
      </div>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" id="ttl" name="ttl" class="form-control" placeholder="Tempat, Tanggal Lahir (DD MM YY)" autocomplete="off" autofocus="on" required>
      </div>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat" autocomplete="off" autofocus="on" required>
      </div>
      <br />
      <input type="submit" value="Daftar" class="btn btn-sm btn-primary" />&nbsp;
      <a href="luthfi_login.php" class="btn btn-sm btn-danger">Batal </a>
      <p>Login? <a href="luthfi_login.php">klik disini</a></p>
    </form>

  </div> 

  <center>
   
    </h5>
  </center>


  <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>

</html>