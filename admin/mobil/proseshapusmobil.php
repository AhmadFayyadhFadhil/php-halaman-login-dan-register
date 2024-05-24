<?php
include '../koneksi1.php';

if(isset($_GET['id'])){
    $id_mobil = $_GET['id'];

    
    $hapus = mysqli_query($mysqli, "DELETE FROM mobil WHERE id_mobil = '$id_mobil'") or die(mysqli_error($mysqli));

    if($hapus) {
        
        exit();
    } else {
        echo "Gagal menghapus data mobil.";
    }
} else {
    echo "ID mobil tidak ditemukan.";
}
?>
