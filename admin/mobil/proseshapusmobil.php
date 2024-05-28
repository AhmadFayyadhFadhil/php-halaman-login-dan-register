<?php
include '../../koneksi.php';


if(isset($_GET['id'])){
    $id_mobil = $_GET['id'];

   
    $update_transaksi = mysqli_query($mysqli, "UPDATE transaksi SET id_mobil = NULL WHERE id_mobil = '$id_mobil'") or die(mysqli_error($mysqli));

    
    $hapus_mobil = mysqli_query($mysqli, "DELETE FROM mobil WHERE id_mobil = '$id_mobil'") or die(mysqli_error($mysqli));

    if($hapus_mobil) {
        
        header("Location: mobil.php");
        exit();
    } else {
        echo "Gagal menghapus data mobil.";
    }
} else {
    echo "ID mobil tidak ditemukan.";
}
?>
