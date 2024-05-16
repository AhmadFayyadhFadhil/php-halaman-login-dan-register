<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dafrat layanan</title>
    <link rel="icon" type="image/png" href="img/logotitle.png">
    <link rel="stylesheet" href="layanan.css">
</head>
<body>


<nav class="navbar">
        <div class="container">
            <ul class="navbar-menu">
                <li><a href="../user.php">USER</a></li>
                <li><a href="../mobil/mobil.php">MOBIL</a></li>
                <li><a href="layanan.php">LAYANAN</a></li>
                <li><a href="../transactionadmin/transaksiadmin.php">TRANSAKSI</a></li>
            </ul>
        </div>
    </nav>

    <section class="user">
        <h1 class="heading">menu layanan</h1>
        
        <br>
        <table border="1" class="table">
            <tr>
                <th>No</th>
                <th>jenis_layanan</th>
                <th>harga_layanan</th>
                <th>action</th>
                
            </tr>
            <?php
            include '../koneksi1.php';
            $query_mysql = mysqli_query($mysqli, "SELECT * FROM layanan") or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <tr>
                <td><?php echo $data['id_layanan']; ?></td>
                <td><?php echo $data['jenis_layanan']; ?></td>
                <td><?php echo $data['harga_layanan']; ?></td>
                <td>
                    <a href="proseshapuslayanan.php?id=<?php echo $data['id_layanan']; ?>" class="btn-hapus">Hapus</a> 
                </td>
            </tr>
            <?php } ?>
        </table>
        <br>
        <br>
       
    </section>

    
</body>
</html>
