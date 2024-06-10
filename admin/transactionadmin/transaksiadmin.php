<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Data Transaksi</title>
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
        <h1 class="heading">Data Transaksi</h1>
        <br>
        <a href="../transactionadmin/tambahtransaksi.php" class="btn">Tambah Data Mobil</a>
        <br>
        <table border="1" class="table">
            <tr>
                <th>No</th>
                <th>Tanggal Transaksi</th>
                <th>Jenis Transaksi</th>
                <th>Plat Mobil</th>
                <th>Total Transaksi</th>
                <th>Username</th>
                <th>Jenis Mobil</th>
                <th>Jenis Layanan</th>
                <th>Aksi</th>
            </tr>
            <?php
            include '../../koneksi.php';

            // Query untuk mengambil data transaksi beserta harga layanan, diurutkan dari yang terbaru
            $query_mysql = mysqli_query($mysqli, "SELECT transaksi.id_transaksi, transaksi.tanggal_transaksi, transaksi.jenis_transaksi, user.username, transaksi.plat_mobil, mobil.jenis_mobil, layanan.harga, transaksi.total_transaksi, layanan.jenis_layanan
            FROM transaksi 
            JOIN mobil ON transaksi.id_mobil = mobil.id_mobil
            JOIN layanan ON transaksi.id_layanan = layanan.id_layanan
            JOIN user ON transaksi.userid = user.userid
            ORDER BY transaksi.tanggal_transaksi DESC") or die(mysqli_error($mysqli));

            $nomor = 1; 
            if(mysqli_num_rows($query_mysql) > 0) {
                while($data = mysqli_fetch_array($query_mysql)) {
                    $total_transaksi = $data['harga']; // Mengambil harga layanan untuk total transaksi
                    
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['tanggal_transaksi']; ?></td>
                <td><?php echo $data['jenis_transaksi']; ?></td>
                <td><?php echo $data['plat_mobil']; ?></td>
                <td><?php echo $total_transaksi; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['jenis_mobil']; ?></td>
                <td><?php echo $data['jenis_layanan']; ?></td>
                <td>
                    <a href="proseshapustransaksi.php?id=<?php echo $data['id_transaksi']; ?>" class="btn-hapus">Hapus</a>
                    <a href="updatetransaksi.php?id=<?php echo $data['id_transaksi']; ?>" class="btn-update">Update</a>
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
