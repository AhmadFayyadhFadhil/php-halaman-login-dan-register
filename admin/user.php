<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman data USER</title>
    <link rel="icon" type="image/png" href="img/logotitle.png">
    <link rel="stylesheet" href="styleadmin.css">
</head>
<body>

<nav class="navbar">
        <div class="container">
            <ul class="navbar-menu">
                <li><a href="#">Mobil</a></li>
                <li><a href="#">Layanan</a></li>
                <li><a href="#">Pegawai</a></li>
                <li><a href="#">Transaksi</a></li>
            </ul>
        </div>
    </nav>

    <section class="user">
        <h1 class="heading">Data User</h1>
        <br>
        <a href="../register.php" class="btn">Tambah User</a>
        <br>
        <br>
        <table border="1" class="table">
            <tr>
                <th>User ID</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Password</th>
                <th>Action</th> 
            </tr>
            <?php
            include '../koneksi.php';
            $query_mysql = mysqli_query($mysqli, "SELECT * FROM user") or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <tr>
                <td><?php echo $data['userid']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['password']; ?></td>
                <td>
                    <a href="hapususer.php?id=<?php echo $data['userid']; ?>" class="btn-hapus">Hapus</a> 
                    <a href="updateuser.php?id=<?php echo $data['userid']; ?>" class="btn-update">Update</a> 
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
