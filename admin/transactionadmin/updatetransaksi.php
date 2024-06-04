<?php
include '../../koneksi.php';

if (isset($_GET['id'])) {
    $id_transaksi = $_GET['id'];
    $query_mysql = mysqli_query($mysqli, "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi'") or die(mysqli_error($mysqli));
    $data = mysqli_fetch_array($query_mysql);

    $query_layanan = mysqli_query($mysqli, "SELECT * FROM layanan") or die(mysqli_error($mysqli));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_transaksi = $_POST['id_transaksi'];
    $tanggal_transaksi = $_POST['tanggal_transaksi'];
    $jenis_transaksi = $_POST['jenis_transaksi'];
    $plat_mobil = $_POST['plat_mobil'];
    $jenis_mobil = $_POST['jenis_mobil'];
    $id_layanan = $_POST['id_layanan'];
    $userid = $_POST['userid'];

    // Insert or update mobil data
    $query_check_mobil = "SELECT id_mobil FROM mobil WHERE plat_mobil='$plat_mobil'";
    $result_check_mobil = mysqli_query($mysqli, $query_check_mobil);
    
    if (mysqli_num_rows($result_check_mobil) > 0) {
        // Mobil already exists, get id_mobil
        $row_mobil = mysqli_fetch_assoc($result_check_mobil);
        $id_mobil = $row_mobil['id_mobil'];
    } else {
        // Insert new mobil data
        $query_insert_mobil = "INSERT INTO mobil (jenis_mobil, plat_mobil) VALUES ('$jenis_mobil', '$plat_mobil')";
        if (mysqli_query($mysqli, $query_insert_mobil)) {
            $id_mobil = mysqli_insert_id($mysqli);
        } else {
            echo "Error inserting mobil data: " . mysqli_error($mysqli);
            exit;
        }
    }

    $query_update = "UPDATE transaksi SET 
                     tanggal_transaksi = '$tanggal_transaksi', 
                     jenis_transaksi = '$jenis_transaksi',
                     id_mobil = '$id_mobil',
                     id_layanan = '$id_layanan',
                     userid = '$userid' 
                     WHERE id_transaksi = '$id_transaksi'";

    if (mysqli_query($mysqli, $query_update)) {
        echo "<script>alert('Data berhasil diupdate'); window.location.href='transaksiadmin.php';</script>";
    } else {
        echo "Error updating record: " . mysqli_error($mysqli);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Transaksi</title>
    <link rel="stylesheet" href="transaksiadmin.css">
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <ul class="navbar-menu">
                <li><a href="../user.php">USER</a></li>
                <li><a href="../mobil/mobil.php">MOBIL</a></li>
                <li><a href="../layanan/layanan.php">LAYANAN</a></li>
                <li><a href="transaksiadmin.php">TRANSAKSI</a></li>
            </ul>
        </div>
    </nav>
    <section class="user">
        <h1 class="heading">Update Data Transaksi</h1>
        <br>
        <form action="updatetransaksi.php" method="post">
            <input type="hidden" name="id_transaksi" value="<?php echo $data['id_transaksi']; ?>">
            <table>
                <tr>
                    <td>Tanggal Transaksi</td>
                    <td><input type="date" name="tanggal_transaksi" value="<?php echo $data['tanggal_transaksi']; ?>" required></td>
                </tr>
                <tr>
                    <td>Jenis Transaksi</td>
                    <td>
                        <select name="jenis_transaksi" required>
                            <option value="debit" <?php if($data['jenis_transaksi'] == 'debit') echo 'selected'; ?>>Debit</option>
                            <option value="cash" <?php if($data['jenis_transaksi'] == 'cash') echo 'selected'; ?>>Cash</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Plat Mobil</td>
                    <td><input type="text" name="plat_mobil" value="<?php echo $data['plat_mobil']; ?>" required></td>
                </tr>
                <tr>
                    <td>Jenis Mobil</td>
                    <td><input type="text" name="jenis_mobil" value="<?php echo $data['jenis_mobil']; ?>" required></td>
                </tr>
                <tr>
                    <td>Jenis Layanan</td>
                    <td>
                        <select name="id_layanan" required>
                            <?php while($row_layanan = mysqli_fetch_array($query_layanan)) { ?>
                                <option value="<?php echo $row_layanan['id_layanan']; ?>" <?php if($data['id_layanan'] == $row_layanan['id_layanan']) echo 'selected'; ?>>
                                    <?php echo $row_layanan['jenis_layanan']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>UserID</td>
                    <td><input type="text" name="userid" value="<?php echo $data['userid']; ?>" required></td>
                </tr>
            </table>
            <br>
            <input type="submit" value="Update">
        </form>
    </section>
</body>
</html>
