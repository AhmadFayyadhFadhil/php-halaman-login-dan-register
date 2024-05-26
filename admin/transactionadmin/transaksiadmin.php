<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman data Transaksi</title>
    <link rel="icon" type="image/png" href="img/logotitle.png">
    <link rel="stylesheet" href="transaksiadmin.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <ul class="navbar-menu">
                <li><a href="../user.php">USER</a></li>
                <li><a href="../mobil/mobil.php">MOBIL</a></li>
                <li><a href="../layanan/layanan.php">LAYANAN</a></li>
                <li><a href="transaksiadmin.php">TRANSAKSI</a></li>
            </ul>
        </div>
    </nav>
    <section class="user">
        <h1 class="heading">Data Transaction</h1>
        <br>
        <table border="1" class="table">
            <tr>
                <th>id_transaksi</th>
                <th>tanggal_transaksi</th>
                <th>jenis_transaksi</th>
                <th>plat_mobil</th>
                <th>total_transaksi</th>
                <th>userid</th>
                <th>id_mobil</th>
                <th>id_layanan</th>
                <th>Delete</th>
            </tr>
            <?php
            include '../koneksi1.php';

            $query_mysql = mysqli_query($mysqli, "SELECT transaksi.id_transaksi, transaksi.tanggal_transaksi, transaksi.jenis_transaksi, transaksi.userid, transaksi.id_mobil, transaksi.id_layanan, mobil.plat_mobil, layanan.harga_layanan
            FROM transaksi 
            JOIN mobil ON transaksi.id_mobil = mobil.id_mobil
            JOIN layanan ON transaksi.id_layanan = layanan.id_layanan") or die(mysqli_error($mysqli));

            if(mysqli_num_rows($query_mysql) > 0) {
                while($data = mysqli_fetch_array($query_mysql)) {
                    $total_transaksi = $data['harga_layanan'];
            ?>
            <tr>
                <td><?php echo $data['id_transaksi']; ?></td>
                <td><?php echo $data['tanggal_transaksi']; ?></td>
                <td><?php echo $data['jenis_transaksi']; ?></td>
                <td><?php echo $data['plat_mobil']; ?></td>
                <td><?php echo $total_transaksi; ?></td>
                <td><?php echo $data['userid']; ?></td>
                <td><?php echo $data['id_mobil']; ?></td>
                <td><?php echo $data['id_layanan']; ?></td>
                <td>
                    <a href="proseshapustransaksi.php?id=<?php echo $data['id_transaksi']; ?>" class="btn-hapus">Hapus</a>
                </td>
            </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='9'>Tidak ada data ditemukan</td></tr>";
            }
            ?>
        </table>
        <br>
        <br>
        <a href="../index.php" class="btn">Log Out</a>
    </section>
    
</body>
</html>
