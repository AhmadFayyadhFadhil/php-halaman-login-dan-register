<?php
include ("../koneksi1.php");

if(isset($_POST['simpan'])){
    $id_layanan = $_POST['id_layanan'];
    $jenis_layanan = $_POST['jenis_layanan'];
    $harga_layanan = $_POST['harga_layanan'];

    // Query untuk mengupdate data layanan
    $result = mysqli_query($mysqli, "UPDATE layanan SET jenis_layanan='$jenis_layanan', harga_layanan='$harga_layanan' WHERE id_layanan=$id_layanan");

    if($result){
        header("Location: layanan.php");
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}
?>
