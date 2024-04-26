<?php
include '../../koneksi.php';

if (isset($_POST['update'])) {
    // Ubah nilai variabel sesuai dengan data Anda
    $id_mobil = $_POST['id_mobil'];
    $jenis_mobil = $_POST['jenis_mobil'];
    $plat_mobil = $_POST['plat_mobil'];
    $merk = $_POST['merk'];
    $pemilik_kendaraan = $_POST['pemilik_kendaraan'];

    // Hapus kolom username, password, dan userid
    $query = "UPDATE mobil SET jenis_mobil='$jenis_mobil', plat_mobil='$plat_mobil', merk='$merk', pemilik_kendaraan='$pemilik_kendaraan' WHERE id_mobil=$id_mobil";
    $result = mysqli_query($mysqli, $query);

    if($result) {
        echo "Data berhasil diperbarui.";
        header("Location: ../mobil.php");
        exit();
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($mysqli);
    }


    
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Mobil</title>
    <link rel="icon" type="image/png" href="img/logotitle.png">
    <link rel="stylesheet" href="update.css">
</head>
<body>
<div class="container">
        <header>
            <h1 class="title">Update Mobil</h1>
        </header>
        <section class="form">
        <form method="POST" action="">
        <input type="hidden" name="id_mobil" value="<?php echo isset($data['id_mobil']) ? $data['id_mobil'] : ''; ?>">

        <label for="jenis_mobil">jenis_mobil</label><br>
        <input type="text" id="jenis_mobil" name="jenis_mobil" value="<?php echo isset($data['jenis_mobil']) ? $data['jenis_mobil'] : ''; ?>"><br>

        <label for="plat_mobil">plat_mobil:</label><br>
        <input type="text" id="plat_mobil" name="plat_mobil" value="<?php echo isset($data['plat_mobil']) ? $data['plat_mobil'] : ''; ?>"><br>

        <label for="merk">merk:</label><br>
        <input type="merk" id="merk" name="merk" value="<?php echo isset($data['merk']) ? $data['merk'] : ''; ?>"><br>

        <label for="pemilik_kendaraan">pemilik_kendaraan:</label><br>
        <input type="pemilik_kendaraan" id="pemilik_kendaraan" name="pemilik_kendaraan" value="<?php echo isset($data['pemilik_kendaraan']) ? $data['pemilik_kendaraan'] : ''; ?>"><br><br>
        <input type="submit" name="update" value="Update" class="button">
    </form>
        </section>
    </div>
    
</body>
</html>
