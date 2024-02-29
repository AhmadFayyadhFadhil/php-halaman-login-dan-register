<?php
include '../koneksi.php';

$userid = $_GET['id'];


$hapus = mysqli_query($mysqli, "DELETE FROM user WHERE userid = '$userid'") or die(mysqli_error($mysqli));

if($hapus) {
 
    header("Location: user.php");
    exit();
} else {
    echo "Gagal menghapus user.";
}
?>