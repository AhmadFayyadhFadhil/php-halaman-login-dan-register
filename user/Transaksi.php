<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $plat_nomor = $_POST['plat_nomor'];
    $jenis_mobil = $_POST['jenis_mobil'];
    $layanan = $_POST['layanan'];
    $jenis_transaksi = $_POST['jenis_transaksi'];
    $tanggal_transaksi = $_POST['tanggal_transaksi'];

    $stmt_check = $mysqli->prepare("SELECT id_mobil FROM mobil WHERE plat_mobil = ?");
    if ($stmt_check === false) {
        die('Prepare gagal: ' . $mysqli->error);
    }
    $stmt_check->bind_param("s", $plat_nomor);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows == 0) {
        $stmt_insert_mobil = $mysqli->prepare("INSERT INTO mobil (plat_mobil, jenis_mobil) VALUES (?, ?)");
        if ($stmt_insert_mobil === false) {
            die('Prepare gagal: ' . $mysqli->error);
        }
        $stmt_insert_mobil->bind_param("ss", $plat_nomor, $jenis_mobil);

        if ($stmt_insert_mobil->execute()) {
            $id_mobil = $stmt_insert_mobil->insert_id;
        } else {
            echo "Error inserting mobil: " . $stmt_insert_mobil->error;
            exit();
        }

        $stmt_insert_mobil->close();
    } else {
        $stmt_check->bind_result($id_mobil);
        $stmt_check->fetch();
    }

    $stmt_check->close();

    $stmt = $mysqli->prepare("INSERT INTO transaksi (plat_mobil, id_mobil, id_layanan, jenis_transaksi, tanggal_transaksi) VALUES (?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die('Prepare gagal: ' . $mysqli->error);
    }

    $stmt->bind_param("siiss", $plat_nomor, $id_mobil, $layanan, $jenis_transaksi, $tanggal_transaksi);

    if ($stmt->execute()) {
        echo "Transaksi baru berhasil ditambahkan";
        header("Location: Cuci sekarang.php"); // Redirect ke halaman admin
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$query_mysql_mobil = mysqli_query($mysqli, "SELECT * FROM mobil") or die(mysqli_error($mysqli));
$query_mysql_layanan = mysqli_query($mysqli, "SELECT * FROM layanan") or die(mysqli_error($mysqli));
?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Transaksi</title>
  <link rel="stylesheet" href="transaction.css">
</head>
<body>

<header>
    <nav>
        <ul class="waru3">
            <ul class="biasa">
                <li><a href="TA2DASPROG.php">Beranda</a></li>
                <li><a href="layanan.php">Layanan</a></li>
                <li><a href="transaksi.php">Transaksi</a></li>
            </ul>
            <ul class="WARU">
                <p class="waru2" href="#" class="logo"><span class="waru4">CUCI</span>MOBIL</p>
            </ul>
        </ul>
    </nav>
</header>   

<div>
  <center class="anjay"><b>Input Transaksi</b></center>
</div>
   
<div class="container">
  <form method="post" action="">
    <hr>
    <table>
      <tr>
        <td>Plat mobil</td>
        <td>: <input type="text" name="plat_nomor" required></td>
      </tr>
      <tr>
        <td>Jenis mobil</td>
        <td>:
          <select name="jenis_mobil" required>
            <?php while($data = mysqli_fetch_array($query_mysql_mobil)) { ?>
              <option value="<?php echo $data['id_mobil']; ?>"><?php echo $data['jenis_mobil']; ?></option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Daftar layanan</td>
        <td>:      
          <select name="layanan" required>
            <?php while($data = mysqli_fetch_array($query_mysql_layanan)) { ?>
              <option value="<?php echo $data['id_layanan']; ?>"><?php echo $data['jenis_layanan']; ?></option>
            <?php } ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>Jenis transaksi</td>
        <td>:
          <select name="jenis_transaksi" required>
            <option value="debit">Debit</option>
            <option value="cash">Cash</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>Tanggal Transaksi</td>
        <td>: <input type="date" name="tanggal_transaksi" placeholder="yyyy-mm-dd" required></td>
      </tr>
    </table>
    <hr>
    <input type="submit" value="Kirim">
    <input type="reset" value="Reset">
  </form>
</div>



</body>
</html>
