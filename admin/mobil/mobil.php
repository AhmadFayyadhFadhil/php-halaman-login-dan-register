<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data mobil</title>
    <link rel="icon" type="image/png" href="img/logotitle.png">
    <link rel="stylesheet" href="mobil.css">
</head>
<body>


<nav class="navbar">
        <div class="container">
            <ul class="navbar-menu">
                <li><a href="../user.php">USER</a></li>
                <li><a href="mobil.php">MOBIL</a></li>
                <li><a href="../layanan/layanan.php">LAYANAN</a></li>
                <li><a href="../transactionadmin/transaksiadmin.php">TRANSAKSI</a></li>
            </ul>
        </div>
    </nav>

    <section class="user">
        <h1 class="heading">Data mobil</h1>
        
        <br>
        <table border="1" class="table">
            <tr>
                <th>No</th>
                <th>jenis_mobil</th>
                <th>plat_mobil</th>
                <th>action</th>
            </tr>
            <?php
            include '../../koneksi.php';
            $query_mysql = mysqli_query($mysqli, "SELECT * FROM mobil") or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <tr>
                <td><?php echo $data['id_mobil']; ?></td>
                <td><?php echo $data['jenis_mobil']; ?></td>
                <td><?php echo $data['plat_mobil']; ?></td>
                <td>
                    <a href="proseshapusmobil.php?id=<?php echo $data['id_mobil']; ?>" class="btn-hapus">Hapus</a> 
                </td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <br>
       
    </section>

    
</body>
</html>
