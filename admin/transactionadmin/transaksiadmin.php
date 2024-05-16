<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman data USER</title>
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
        
        <h1 class="heading">Data User</h1>
        
        <br>
        <table border="1" class="table">
            <tr>
                <th>jenis transaksi</th>
                <th>tanggal transaksi</th>
                <th>plat mobil</th>
                <th>jenis mobil</th>
                <th>layanan</th> 
                <th>total transaksi</th> 
            </tr>
            <?php
            include '../koneksi1.php';
            $query_mysql = mysqli_query($mysqli, "SELECT user.nama, mobil.plat_mobil, layanan.jenis_layanan, layanan.harga_layanan, layanan.jenis_layanan*layanan.harga_layanan AS total_transaksi
            FROM transaksi 
            JOIN user ON transaksi.userid = user.userid
            JOIN mobil ON transaksi.id_mobil = mobil.id_mobil
            JOIN layanan ON transaksi.id_layanan = layanan.id_layanan") or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <tr>
                <td><?php echo $data['id_transaksi']; ?></td>
                <td><?php echo $data['tanggal_transaksi']; ?></td>
                <td><?php echo $data['jenis_transaksi']; ?></td>
                <td><?php echo $data['']; ?></td>
                <td>
                    <a href="hapususer.php?id=<?php echo $data['userid']; ?>" class="btn-hapus">Hapus</a> 
                    <a href='updateuser.php?id=<?php echo $data['userid']; ?>' class="btn-update">Update 
                </a> 
                </td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <br>
        <a href="../index.php" class="btn">Log Out</a>
    </section>

    <script src="main.js"></script>
</body>
</html>
