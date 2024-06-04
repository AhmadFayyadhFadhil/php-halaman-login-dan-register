<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carwash clean</title>
    <link rel="stylesheet" href="layanan1111.css">
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

<h1><center>DAFTAR LAYANAN</center></h1><br>
<section class="container">
    <?php
    include '../koneksi.php';
    $query_mysql = mysqli_query($mysqli, "SELECT * FROM layanan") or die(mysqli_error($mysqli));
    while($data = mysqli_fetch_array($query_mysql)) {
        $imagePath = '../admin/layanan/uploaded_img/' . $data['gambar'];
        $imageURL = '../admin/layanan/uploaded_img/' . rawurlencode($data['gambar']);
        ?>
        
    <div class="card">
        <div class="card-image">
            <?php 

            if (file_exists($imagePath)) {
                echo '<img src="' . $imageURL . '" alt="' . $data['jenis_layanan'] . '">';
            } else {
                echo '<img src="default_image.png" alt="Default Image">';

            }
            ?>
        </div>
        <h2><?php echo $data['jenis_layanan']; ?></h2>
        <p><?php echo $data['deskripsi']; ?></p>
        <a href="<?php echo $data['website']; ?>">Read More</a>
    </div>
    <?php } ?>
</section>

       <div class="footer-bottom">
            <p>&copy;WA: 0989898787 || @.Carwash clean || FB: Carwash clean</p>
       </div>

</body>
</html>
