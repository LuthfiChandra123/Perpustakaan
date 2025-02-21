<!DOCTYPE php>
<php lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <meta name="description" content="Skadacibook">
  <meta name="Skadacibook" content="Skadacibook">
  <link rel="icon" href="../../favicon.ico">

  <title>Skadacibook</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="login.css" rel="stylesheet">
  <script src="boostrap/ie-emulation-modes-warning.js"></script>
  <script src="boostrap/jquery.min.js"></script>
  <script src="boostrap/bootstrap.js"></script>

</head>



  <div class="container">

    <form class="form-signin" action="proseslogin.php" method="post">
      <center>
      <center><img src="download.jpg" height="80" width="80" class="img-circle" alt="User Image" style="border: 3px solid white;" /></center><h2 class="form-signin-heading"></span> Skadacibook</h2>
       
        
      </center>
      <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" autocomplete="off"
          autofocus="on" required>
      </div>
      <div class="input-group" style="margin-top: 5px;">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input type="text" id="password" name="password" class="form-control" placeholder="Password" autocomplete="off"
          required>
      </div>
      <div class="input-group" style="margin-top: 5px;">
        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
        <select class="form-control" name="level" id="level">
          <option> -- Pilih Salah Satu --</option>
          <option value="admin"> Admin</option>
          <option value="anggota"> Anggota</option>
        </select>
      </div>
      <br />
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      <button class="btn btn-lg btn- btn-block" type="submit"><a href="luthfi_signup.php"> Sign up </a></button>
      <p class="text-right"> Kembali ke Home,<a href="index.php">klik disini</a></p>
    </form>
  <div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title" id="myModalLabel">Contact Us</h4>
        </div>
        <div class="modal-body">
          <table>
            <tr>

          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <script src="boostrap/ie10-viewport-bug-workaround.js"></script>
</body>

</php>