<?php 
include ("../../koneksi.php");

// Jika tidak ada id di query string
if(!isset($_GET['id'])){
    header('Location: layanan.php');
    exit; // Menghentikan eksekusi script jika tidak ada id
}

$id_layanan = $_GET['id'];

// Mengambil data layanan berdasarkan id
$result = mysqli_query($mysqli, "SELECT * FROM layanan WHERE id_layanan=$id_layanan");

// Memeriksa apakah data ditemukan
if(mysqli_num_rows($result) === 0) {
    echo "Data layanan tidak ditemukan.";
    exit; // Menghentikan eksekusi script jika data tidak ditemukan
}

$layanan_data = mysqli_fetch_array($result);
$jenis_layanan = $layanan_data['jenis_layanan'];
$harga_layanan = $layanan_data['harga_layanan'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Layanan</title>
    <link rel="stylesheet" href="styleupdate.css">
</head>
<body>
<div class="container">
    <header>
        <h1 class="title">Update Layanan</h1>
    </header>
    <form method="POST" action="prosesupdate_layanan.php">
        <table>
            <tr>
                <td>Jenis Layanan</td>
                <td><input type="text" name="jenis_layanan" value="<?php echo $jenis_layanan;?>" required></td>
            </tr> 

            <tr>
                <td>Harga Layanan</td>
                <td><input type="number" name="harga_layanan" value="<?php echo $harga_layanan;?>" required></td>
            </tr> 

            <tr>
                <td><input type="hidden" name="id_layanan" value="<?php echo $_GET['id'];?>"></td>
                <td><input type="submit" name="simpan" value="Simpan"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
