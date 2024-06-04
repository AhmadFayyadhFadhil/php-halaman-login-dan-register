<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Layanan</title>
    <link rel="stylesheet" href="layanan.css">
</head>
<body>
    <?php
    include "../../koneksi.php";

    // Variabel untuk menyimpan data layanan
    $data = [
        'id_layanan' => '',
        'jenis_layanan' => '',
        'harga' => '',
        'gambar' => '',
        'deskripsi' => '',
        'website' => ''
    ];

    if (isset($_GET['id'])) {
        $id_layanan = htmlspecialchars($_GET["id"]);
        $sql = "SELECT * FROM layanan WHERE id_layanan='$id_layanan'";
        $hasil = mysqli_query($mysqli, $sql);
        $data = mysqli_fetch_assoc($hasil);
    }

    if (isset($_POST['update'])) {
        $id_layanan = htmlspecialchars($_POST['id_layanan']);
        $jenis_layanan = htmlspecialchars($_POST['jenis_layanan']);
        $harga = htmlspecialchars($_POST['harga']);
        $gambar = htmlspecialchars($_POST['gambar']);
        $deskripsi = htmlspecialchars($_POST['deskripsi']);
        $website = htmlspecialchars($_POST['website']);

        $sql = "UPDATE layanan SET 
                jenis_layanan='$jenis_layanan', 
                harga='$harga', 
                gambar='$gambar', 
                deskripsi='$deskripsi', 
                website='$website' 
                WHERE id_layanan='$id_layanan'";

        $hasil = mysqli_query($mysqli, $sql);

        if ($hasil) {
            header("Location: layanan.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Data gagal diupdate.</div>";
        }
    }
    ?>

    <h1 class="judul">Update Data Layanan</h1>
    <form method="post" action="updatelayanan.php">
        <input type="hidden" name="id_layanan" value="<?php echo $data['id_layanan']; ?>">
        <label for="jenis_layanan">Jenis Layanan</label>
        <input type="text" name="jenis_layanan" value="<?php echo $data['jenis_layanan']; ?>" required>
        <label for="harga">Harga</label>
        <input type="text" name="harga" value="<?php echo $data['harga']; ?>" required>
        <label for="gambar">Gambar</label>
        <input type="text" name="gambar" value="<?php echo $data['gambar']; ?>" required>
        <label for="deskripsi">Deskripsi</label>
        <textarea name="deskripsi" required><?php echo $data['deskripsi']; ?></textarea>
        <label for="website">Website</label>
        <input type="text" name="website" value="<?php echo $data['website']; ?>" required>
        <button type="submit" name="update" class="btn">Update Layanan</button>
    </form>
</body>
</html>
