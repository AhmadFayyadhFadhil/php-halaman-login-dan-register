<?php
include '../../koneksi.php';

// Pastikan id_layanan sudah ada di query string
if(isset($_GET['id'])){
    $id_layanan = $_GET['id'];

    // Query untuk menghapus data layanan
    $hapus = mysqli_query($mysqli, "DELETE FROM layanan WHERE id_layanan = '$id_layanan'") or die(mysqli_error($mysqli));

    if($hapus) {
        // Jika berhasil dihapus, arahkan kembali ke halaman layanan.php
        header("Location: layanan.php");
        exit();
    } else {
        echo "Gagal menghapus layanan.";
    }
} else {
    echo "ID layanan tidak ditemukan.";
}
?>
