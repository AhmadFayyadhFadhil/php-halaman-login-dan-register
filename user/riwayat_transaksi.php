<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <link rel="stylesheet" href="riwayat1.css">
    <style>
        body {
            background: url('21 Top Black Matte Edition Cars You Should Check Out.jpeg') no-repeat center center/cover;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #000000;
            padding: 10px 0;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .navbar-menu {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        .navbar-menu li {
            display: inline;
        }

        .navbar-menu li a {
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            transition: background-color 0.3s ease;
        }

        .navbar-menu li a:hover {
            background-color: #ddd;
            color: black;
            border-radius: 5px;
        }

        .user {
            width: 80%;
            margin: 20px auto;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .heading {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
        }

        .card h3 {
            margin-top: 0;
            color: #007bff;
        }

        .card p {
            margin: 5px 0;
            color: #333;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <ul class="waru3">
                <ul class="biasa">
                    <li><a href="TA2DASPROG.php">Beranda</a></li>
                    <li><a href="layanan.php">Layanan</a></li>
                    <li><a href="Transaksi.php">Transaksi</a></li>
                </ul>
                <ul class="WARU">
                    <p class="waru2" class="logo"><span class="waru4">CUCI</span>MOBIL</p>
                </ul>
            </ul>
        </nav>
    </header>

    <div class="Lah">
        <a href="TA2DASPROG.php" class="Lah1"><span class="Lah2">Back TO</span>Home</a>
    </div>

    <section class="user">
        <h1 class="heading">Riwayat Transaksi</h1>
        <?php
        include '../koneksi.php';

        // Query dengan ORDER BY untuk mengurutkan berdasarkan tanggal_transaksi secara descending
        $query_mysql = mysqli_query($mysqli, "SELECT transaksi.id_transaksi, transaksi.tanggal_transaksi, transaksi.jenis_transaksi, user.username, transaksi.plat_mobil, mobil.jenis_mobil, layanan.harga, layanan.jenis_layanan
        FROM transaksi 
        JOIN mobil ON transaksi.id_mobil = mobil.id_mobil
        JOIN layanan ON transaksi.id_layanan = layanan.id_layanan
        JOIN user ON transaksi.userid = user.userid
        ORDER BY transaksi.tanggal_transaksi DESC") or die(mysqli_error($mysqli));

        if(mysqli_num_rows($query_mysql) > 0) {
            while($data = mysqli_fetch_array($query_mysql)) {
                $total_transaksi = $data['harga'];
        ?>
        <div class="card">
            <h3>Transaksi No: <?php echo $data['id_transaksi']; ?></h3>
            <p><strong>Tanggal Transaksi:</strong> <?php echo $data['tanggal_transaksi']; ?></p>
            <p><strong>Jenis Transaksi:</strong> <?php echo $data['jenis_transaksi']; ?></p>
            <p><strong>Plat Mobil:</strong> <?php echo $data['plat_mobil']; ?></p>
            <p><strong>Total Transaksi:</strong> <?php echo $total_transaksi; ?></p>
            <p><strong>Username:</strong> <?php echo $data['username']; ?></p>
            <p><strong>Jenis Mobil:</strong> <?php echo $data['jenis_mobil']; ?></p>
            <p><strong>Jenis Layanan:</strong> <?php echo $data['jenis_layanan']; ?></p>
        </div>
        <?php
            }
        } else {
            echo "<p>Tidak ada data ditemukan</p>";
        }
        ?>
    </section>
    <div class="footer-bottom" display="center">
        <p>&copy;WA: 0989898787 || @.Carwash clean || FB: Carwash clean</p>
    </div>
</body>
</html>
