<?php
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $plat_nomor = $_POST['plat_nomor'];
    $jenis_mobil = $_POST['jenis_mobil'];
    $layanan = $_POST['layanan'];
    $jenis_transaksi = $_POST['jenis_transaksi'];
    $tanggal_transaksi = $_POST['tanggal_transaksi'];
    $userid = $_POST['userid']; // Pastikan untuk mendapatkan userid dari form

    // Cek apakah jenis mobil sudah ada
    $stmt_check_mobil = $mysqli->prepare("SELECT id_mobil FROM mobil WHERE jenis_mobil = ?");
    if ($stmt_check_mobil === false) {
        die('Prepare gagal: ' . $mysqli->error);
    }
    $stmt_check_mobil->bind_param("s", $jenis_mobil);
    $stmt_check_mobil->execute();
    $stmt_check_mobil->store_result();

    if ($stmt_check_mobil->num_rows == 0) {
        // Insert jenis mobil baru jika belum ada
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
        $stmt_check_mobil->bind_result($id_mobil);
        $stmt_check_mobil->fetch();
    }

    $stmt_check_mobil->close();

    // Insert transaksi baru
    $stmt = $mysqli->prepare("INSERT INTO transaksi (plat_mobil, id_mobil, id_layanan, jenis_transaksi, tanggal_transaksi, userid) VALUES (?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die('Prepare gagal: ' . $mysqli->error);
    }

    $stmt->bind_param("siissi", $plat_nomor, $id_mobil, $layanan, $jenis_transaksi, $tanggal_transaksi, $userid);

    if ($stmt->execute()) {
        echo "Transaksi baru berhasil ditambahkan";
        header("Location: transaksiadmin.php"); // Redirect ke halaman admin
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$query_mysql_mobil = mysqli_query($mysqli, "SELECT * FROM mobil") or die(mysqli_error($mysqli));
$query_mysql_layanan = mysqli_query($mysqli, "SELECT * FROM layanan") or die(mysqli_error($mysqli));
$query_mysql_user = mysqli_query($mysqli, "SELECT * FROM user") or die(mysqli_error($mysqli));
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Transaksi</title>
  <link rel="stylesheet" href="tambahdata.css">
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
          <input list="jenis_mobil_list" name="jenis_mobil" required>
          <datalist id="jenis_mobil_list">
            <option value="Sedan">
            <option value="Pick Up">
            <option value="Truk">
            <option value="Bus">
            <?php while($data = mysqli_fetch_array($query_mysql_mobil)) { ?>
              <option value="<?php echo $data['jenis_mobil']; ?>">
            <?php } ?>
          </datalist>
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
      <tr>
        <td>User</td>
        <td>:
          <select name="userid" required>
            <?php while($data = mysqli_fetch_array($query_mysql_user)) { ?>
              <option value="<?php echo $data['userid']; ?>"><?php echo $data['username']; ?></option>
            <?php } ?>
          </select>
        </td>
      </tr>
    </table>
    <hr>
    <input type="submit" value="Kirim">
    <input type="reset" value="Reset">
  </form>
</div>

<div class="footer-bottom">
    <p>&copy;WA: 0989898787 || @.Carwash clean || FB: Carwash clean</p>
</div>
</body>
</html>
