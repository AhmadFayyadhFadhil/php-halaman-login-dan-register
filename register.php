<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Layanan</title>
    <link rel="stylesheet" href="layananada.css">
</head>
<body>
    <?php
        include "../../koneksi.php";

        if (isset($_GET['id_layanan'])) {
            $id_layanan = htmlspecialchars($_GET["id_layanan"]);

            $sql = "DELETE FROM layanan WHERE id_layanan='$id_layanan'";
            $hasil = mysqli_query($mysqli, $sql);

            if ($hasil) {
                echo "<div class='alert alert-success'>Data berhasil dihapus.</div>";
            } else {
                echo "<div class='alert alert-danger'>Data gagal dihapus.</div>";
            }
        }
    ?>

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

    <h1 class="judul">Input Data Layanan</h1>
    <br>
    <a href="tambahlayanan.php" class="btn">Tambah layanan</a>
    <br>

    <table class="my-3 table table-bordered">
        <thead>
            <tr class="table-primary">
                <th class="no-col">No</th>
                <th class="nama-col">Jenis Layanan</th>
                <th class="harga-col">Harga</th>
                <th class="image-col">Image</th>
                <th class="deskripsi-col">Deskripsi</th>
                <th class="website-col">Website</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM layanan";
            $hasil = mysqli_query($mysqli, $sql);
            $no = 0;
            while ($data = mysqli_fetch_array($hasil)) {
                $no++;
            ?>
            <tr>
                <td class="no-col"><?php echo $no; ?></td>
                <td class="nama-col"><?php echo htmlspecialchars($data["jenis_layanan"]); ?></td>
                <td class="harga-col"><?php echo htmlspecialchars($data["harga"]); ?></td>
                <td class="image-col">
                    <?php
                        $gambarPath = "uploaded_img/" . htmlspecialchars($data["gambar"]);
                    ?>
                    <img src="<?php echo $gambarPath; ?>" alt="Gambar layanan" width="100">
                </td>
                <td class="deskripsi-col"><?php echo nl2br(htmlspecialchars($data["deskripsi"])); ?></td>
                <td class="website-col"><?php echo htmlspecialchars($data["website"]); ?></td>
                <td>
                    <a href="updatelayanan.php?id=<?php echo htmlspecialchars($data['id_layanan']); ?>" class="btn-update">Update</a>
                    <br><br>
                    <a href="hapuslayanan.php?id=<?php echo htmlspecialchars($data['id_layanan']); ?>" class="btn-hapus">Hapus</a> 
                </td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>
</html>
