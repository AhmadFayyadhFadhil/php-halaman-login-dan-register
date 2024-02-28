<?php
include '../koneksi.php';

$userid = $_GET['id']; // Ambil id user dari parameter URL

// Hapus data user dari database
$hapus = mysqli_query($mysqli, "DELETE FROM user WHERE userid = '$userid'") or die(mysqli_error($mysqli));

if($hapus) {
    // Redirect kembali ke halaman user.php setelah berhasil menghapus
    header("Location: user.php");
    exit();
} else {
    echo "Gagal menghapus user.";
}
?>