<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="menu_1">
    <h2>Tambah Menu</h2>
    <form action="tambah_layanan.php" method="post">
        <div class="menu-input">
            <label for="jenis_layanan">Jenis Layanan:</label>
            <input type="text" class="form-control" id="jenis_layanan" name="jenis_layanan" required>
        </div>

        <div class="menu-input">
            <label for="harga_layanan">Harga Layanan:</label>
            <input type="number" class="form-control" id="harga_layanan" name="harga_layanan" required>
        </div>

        <button name="submit" type="submit">Tambah</button>

        <?php
        if (isset($_POST['submit'])) {
            $jenis_layanan = $_POST['jenis_layanan'];
            $harga_layanan = $_POST['harga_layanan'];

            include "../koneksi1.php";

            $result = mysqli_query($mysqli, "INSERT INTO layanan (jenis_layanan, harga_layanan) VALUES ('$jenis_layanan', '$harga_layanan')");

            if ($result) {
                header("Location: layanan.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($mysqli);
            }
        }
        ?>
    </form>
</div>
</body>
</html>
