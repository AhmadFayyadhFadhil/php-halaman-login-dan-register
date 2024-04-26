<?php
include "koneksi.php";

if(isset($_POST['submit'])) {
    $jenis_mobil = 
    $plat_mobil = mysqli_real_escape_string($mysqli, $_POST['plat_mobil']);
    $merk = mysqli_real_escape_string($mysqli, $_POST['merk']);
    $pemilik_mobil = mysqli_real_escape_string($mysqli, $_POST['pemilik_mobil']);
    $level = "user";

    if(!$mysqli) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    $stmt = $mysqli->prepare("INSERT INTO mobil (jenis_mobil, plat_mobil, merk, pemilik_mobil, level) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $plat_mobil, $merk, $pemilik_mobil, $level);

    if($stmt->execute()) {

        header("location:mobil.php");
    } else {
        echo "Gagal memasukkan data.";
    }

    $stmt->close();
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mobil</title>
    <link rel="stylesheet" href="tambah_mobil.css">
</head>
<body>
<div class="register_1">
    <h2>Registrasi</h2>
    <form action= "register.php" method = "post">
     <div class="reregist">
        <label for="plat_mobil">Plat_mobil:</label>
        <input type="text" class="form-control" id="plat_mobil" name="plat_mobil" required>
      </div>

      <div class="reregisteer1">
        <label for="merk">Merk:</label>
        <input type="text" class="form-control" id="merk" name="merk" required>
      </div>

      <div class="reregister2">
        <label for="pemilik_mobil">Pemilik_mobil:</label>
        <input type="text" class="form-control" id="pemilik_mobil" name="pemilik_mobil" required>
      </div>

      <button  name="submit" type="submit" >Daftar</button>
    </from>

      <div class="login-link">
      Sudah punya akun? <a href="index.php">Masuk disini</a>
    </div>
  </div>
</body>
</html>
