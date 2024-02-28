<?php
include '../koneksi.php';

if(isset($_POST['update'])) {
    $id_user = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan proses update data di database
    $query = "UPDATE user SET username='$username', password='$password' WHERE nama=$nama";
    $result = mysqli_query($mysqli, $query);

    if($result) {
        echo "Data berhasil diperbarui.";
        header("Location: user.php"); // Redirect kembali ke halaman data user
        exit();
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($mysqli);
    }
}

// Mendapatkan data user yang akan diupdate
if(isset($_GET['id'])) {
    $nama = $_GET['id'];
    $query = "SELECT * FROM user WHERE id_user=$nama";
    $result = mysqli_query($mysqli, $query);

    if($result && mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_assoc($result);
    } else {
        echo "Data user tidak ditemukan.";
        exit();
    }
} else {
    echo "ID user tidak ditemukan.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.
