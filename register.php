<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="registerr.css">
</head>
<body>
<div class="register_1">
    <h2>Registrasi</h2>
    <form action= "register.php" method = "post">
     <div class="reregist">
        <label for="username">Nama:</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
      </div>

      <div class="reregisteer1">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>

      <div class="reregister2">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>

      <button  name="submit" type="submit" >Daftar</button>

      <?php
        
        if(isset($_POST['submit'])) {
          $nama= $_POST['nama'];
          $username = $_POST['username'];
          $password = $_POST['password'];
          $level = "user";

          include "koneksi.php";



          $result = mysqli_query($mysqli, "INSERT INTO user(nama,username,password,level)
          VALUES('$nama','$username','$password','$level')");

          header("location:index.php");
      }
      ?>   </form>
    <div class="login-link">
      Sudah punya akun? <a href="index.php">Masuk disini</a>
    </div>
  </div>
</body>
</html>