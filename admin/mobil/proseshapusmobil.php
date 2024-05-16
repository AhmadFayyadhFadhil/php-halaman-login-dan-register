<?php
include '../koneksi1.php';

$userid = $_GET['id'];


$hapus = mysqli_query($mysqli, "DELETE FROM mobil WHERE id_mobil = '$userid'") or die(mysqli_error($mysqli));

if($hapus) {
 
    header("Location: mobil.php");
    exit();
} else {
    echo "Gagal menghapus data mobil.";
}
?>