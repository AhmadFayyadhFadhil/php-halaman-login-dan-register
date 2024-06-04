<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Layanan</title>
    <link rel="stylesheet" href="tambahlayanan.css">
</head>
<body>
    <?php
    include "../../koneksi.php";

    if (isset($_POST['submit'])) {
        $jenis_layanan = htmlspecialchars($_POST['jenis_layanan']);
        $harga = htmlspecialchars($_POST['harga']);
        $gambar = $_FILES['gambar']['name']; // Ambil nama file gambar yang diunggah
        $deskripsi = htmlspecialchars($_POST['deskripsi']);
        $website = htmlspecialchars($_POST['website']);

        // Lokasi folder penyimpanan gambar
        $targetDir = "uploaded_img/";

        // Path file gambar yang diunggah
        $targetFile = $targetDir . basename($_FILES["gambar"]["name"]);

        // Pindahkan file gambar yang diunggah ke folder uploaded_img
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile)) {
            echo "File berhasil diunggah.";
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file.";
        }

        $sql = "INSERT INTO layanan (jenis_layanan, harga, gambar, deskripsi, website) VALUES ('$jenis_layanan', '$harga', '$gambar', '$deskripsi', '$website')";
        $hasil = mysqli_query($mysqli, $sql);

        if ($hasil) {
            header("Location: layanan.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Data gagal ditambahkan.</div>";
        }
    }
    ?>

    <h1 class="judul">Tambah Data Layanan</h1>
    <div class="form-container">
        <form method="post" action="tambahlayanan.php" enctype="multipart/form-data">
            <label for="jenis_layanan">Jenis Layanan</label>
            <input type="text" name="jenis_layanan" required>
            <label for="harga">Harga</label>
            <input type="number" step="0.01" name="harga" required>
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" required>
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" required></textarea>
            <label for="website">Website</label>
            <input type="text" name="website" required>
            <button type="submit" name="submit" class="btn">Tambah Layanan</button>
        </form>
    </div>
</body>
</html>
