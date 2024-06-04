<?php
include '../../koneksi.php';

// Pastikan id_layanan sudah ada di query string
if(isset($_GET['id'])){
    $id_layanan = $_GET['id'];

    // Mulai transaksi
    mysqli_begin_transaction($mysqli);

    try {
        // Query untuk menghapus data terkait di tabel transaksi
        $hapus_transaksi = mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_layanan = '$id_layanan'") or die(mysqli_error($mysqli));
        
        // Query untuk menghapus data layanan
        $hapus_layanan = mysqli_query($mysqli, "DELETE FROM layanan WHERE id_layanan = '$id_layanan'") or die(mysqli_error($mysqli));

        // Commit transaksi
        mysqli_commit($mysqli);

        // Jika berhasil dihapus, arahkan kembali ke halaman layanan.php
        header("Location: layanan.php");
        exit();
    } catch (Exception $e) {
        // Rollback transaksi jika ada kesalahan
        mysqli_rollback($mysqli);
        echo "Gagal menghapus layanan: " . $e->getMessage();
    }
} else {
    echo "ID layanan tidak ditemukan.";
}
?>
