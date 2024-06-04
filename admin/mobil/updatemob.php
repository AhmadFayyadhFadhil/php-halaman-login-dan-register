<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Mobil</title>
    <link rel="stylesheet" href="mobil.css">
</head>
<body>
    <?php
    include "../../koneksi.php";

    // Variabel untuk menyimpan data mobil
    $data = [
        'id_mobil' => '',
        'jenis_mobil' => '',
        'plat_mobil' => ''
    ];

   // ...
if (isset($_GET['id'])) {
    $id_mobil = htmlspecialchars($_GET["id"]);
    $sql = "SELECT * FROM mobil WHERE id_mobil='$id_mobil'";
    $hasil = mysqli_query($mysqli, $sql);

    if ($hasil && mysqli_num_rows($hasil) > 0) {
        $data = mysqli_fetch_assoc($hasil);
    } else {
        echo "<div class='alert alert-danger'>Data mobil dengan ID $id_mobil tidak ditemukan.</div>";
    }
}
// ...


    if (isset($_POST['update'])) {
        $id_mobil = htmlspecialchars($_POST['id_mobil']);
        $jenis_mobil = htmlspecialchars($_POST['jenis_mobil']);
        $plat_mobil = htmlspecialchars($_POST['plat_mobil']);

        $sql = "UPDATE mobil SET 
                jenis_mobil='$jenis_mobil', 
                plat_mobil='$plat_mobil'
                WHERE id_mobil='$id_mobil'";

        $hasil = mysqli_query($mysqli, $sql);

        if ($hasil) {
            header("Location: mobil.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'>Data gagal diupdate.</div>";
        }
    }
    ?>

    <h1 class="judul">Update Data Mobil</h1>
    <form method="post" action="">
        <input type="hidden" name="id_mobil" value="<?php echo $data['id_mobil']; ?>">
        <label for="jenis_mobil">Jenis Mobil</label>
        <input type="text" name="jenis_mobil" value="<?php echo isset($data['jenis_mobil']) ? $data['jenis_mobil'] : ''; ?>" required>
        <label for="plat_mobil">Plat Mobil</label>
        <input type="text" name="plat_mobil" value="<?php echo isset($data['plat_mobil']) ? $data['plat_mobil'] : ''; ?>" required>
        <button type="submit" name="update" class="btn">Update Mobil</button>
    </form>
</body>
</html>
