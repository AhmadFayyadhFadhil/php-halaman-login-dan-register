<?php
            include '../koneksi.php';
            $query_mysql = mysqli_query($mysqli, "SELECT 'user.nama', 'mobil.plat_mobil', 'layanan.jenis_layanan', 'layanan.harga_layanan', 'layanan.jenis_layanan*layanan.harga_layanan' AS 'total_transaksi'
            FROM transaksi 
            JOIN user ON transaksi.userid = 'user.userid'
            JOIN mobil ON transaksi.id_mobil = 'mobil.id_mobil'
            JOIN layanan ON transaksi.id_layanan = 'layanan.id_layanan'") or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql))  
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Input Transaction</title>
  <link rel="stylesheet" href="transaction.css">
</head>
<body>

<header>
    <nav>
        <ul class="waru3">
            <ul class="biasa">
                <li><a href="TA2DASPROG.php">Beranda</a></li>
                <li><a href="layanan.php">Layanan</a></li>
                <li><a href="transaksi.php">transaksi</a></li>
            </ul>
            <ul class="WARU">
                <p class="waru2" href="#" class="logo"><span class="waru4">CUCI</span>MOBIL</p>
            </ul>
        </ul>
    </nav>
</header>   

<div>
  <center class="anjay"><b>Input Transaction</b></center>
</div>
   
<div class="container">
  <form method="post" action="">

    <hr>

    <table>
      <tr>
        <td>Plat mobil</td>
        <td>: <input type="text" name="plat_mobil" required></td>
      </tr>
      <tr>
        <td>Jenis mobil</td>
        <td>:
          <select name="jenis_mobil" required>
                    <option value="Sedan">Sedan</option>
                    <option value="Sport Utility Vehicle [SUV]">Sport Utility Vehicle[SUV]</option>
                    <option value="Multi Purpose Vehicle [MPV]">Multi Purpose Vehicle [MPV]</option>
                    <option value="hatchback">hatchback</option>
                    <option value="coupe">coupe</option>
                    <option value="convertible">convertible</option>
                    <option value="mobil listrik">mobil listrik</option>
                    <option value="mobil hybrid">mobil hybrid</option>
                    <option value="truk">truk</option>
                    <option value="pick up">pick up</option>
                    <option value="Sport">Sport</option>
                    <option value="F1">F1</option>

          </select>
        </td>
      </tr>
      <tr>
        <td>Daftar layanan</td>
        <td>:         
            <select name="layanan" required>
                    <option value="1">CUCI STEAM Rp 250.000 </option>
                    <option value="2">CUCI INTERIOR Rp 200.00</option>
                    <option value="3">SERVICE Rp 150.000</option>
            </select>

        </td>
      </tr>
      <tr>
        <td>Jenis transaksi</td>
        <td>:
          <select name="jenis_transaksi" required>
            <option value="Cash">Cash</option>
            <option value="Debit">Debit</option>
            <option value="Credit">Credit</option>
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
