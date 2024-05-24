<?php
include '../koneksi.php';

// Ambil user ID yang akan dihapus
$userid = $_GET['id'];

// Mulai transaksi
mysqli_begin_transaction($mysqli);

// Query untuk menghapus data mobil yang terkait dengan user ID
$hapus_mobil = mysqli_query($mysqli, "DELETE FROM mobil WHERE userid = '$userid'") or die(mysqli_error($mysqli));

// Query untuk menghapus data pengguna
$hapus_user = mysqli_query($mysqli, "DELETE FROM user WHERE userid = '$userid'") or die(mysqli_error($mysqli));

if($hapus_mobil && $hapus_user) {
    // Jika kedua query berhasil, commit transaksi
    mysqli_commit($mysqli);

    // Arahkan kembali ke halaman user.php
    header("Location: user.php");
    exit();
} else {
    // Jika ada kesalahan, rollback transaksi
    mysqli_rollback($mysqli);

    echo "Gagal menghapus data.";
}
?>
