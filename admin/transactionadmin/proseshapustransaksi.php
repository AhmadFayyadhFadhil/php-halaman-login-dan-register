<?php
include '../koneksi1.php';

if(isset($_GET['id'])){
    $id_transaksi = $_GET['id'];  // Ubah nama variabel ke $id_transaksi

    $hapus = mysqli_query($mysqli, "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'") or die(mysqli_error($mysqli));

    if($hapus) {
        header("Location: transaksiadmin.php");  // Redirect ke halaman transaksiadmin.php
        exit();
    } else {
        echo "Gagal menghapus data transaksi.";
    }
} else {
    echo "ID transaksi tidak ditemukan.";
}
?>
