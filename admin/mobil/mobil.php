<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman data mobil</title>
    <link rel="icon" type="image/png" href="img/logotitle.png">
    <link rel="stylesheet" href="mobil.css">
</head>
<body>


<nav class="navbar">
        <div class="container">
            <ul class="navbar-menu">
                <li><a href="../user.php">USER</a></li>
                <li><a href="mobil.php">MOBIL</a></li>
                <li><a href="#">LAYANAN</a></li>
                <li><a href="#">TRANSAKSI</a></li>
            </ul>
        </div>
    </nav>

    <section class="user">
        <h1 class="heading">Data mobil</h1>
        <br>
        <a href="../../tambah_mobil.php" class="btn">Tambah mobil</a>
        <br>
        <br>
        <table border="1" class="table">
            <tr>
                <th>id_mobil</th>
                <th>plat_mobil</th>
                <th>merk</th>
                <th>pemilik_kendaraan</th>
                <th>Action</th> 
            </tr>
            <?php
            include '../../koneksi.php';
            $query_mysql = mysqli_query($mysqli, "SELECT * FROM mobil") or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <tr>
                <td><?php echo $data['id_mobil']; ?></td>
                <td><?php echo $data['plat_mobil']; ?></td>
                <td><?php echo $data['merk']; ?></td>
                <td><?php echo $data['pemilik_kendaraan']; ?></td>
                <td>
                    <a href="hapususer.php?id=<?php echo $data['id_mobil']; ?>" class="btn-hapus">Hapus</a> 
                    <a href="../mobil/update_mobil.php?id=<?php echo $data['id_mobil']; ?>" class="btn-update">Update</a> 
                </td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <br>
        <a href="../../index.php" class="btn">Log Out</a>
    </section>

    <script src="main.js"></script>
</body>
</html>
