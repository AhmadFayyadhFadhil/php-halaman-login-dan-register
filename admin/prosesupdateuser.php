<?php
include("koneksi1.php");

// Memeriksa apakah data yang diperlukan sudah disubmit
if(isset($_POST['simpan'])) {
    // Mendapatkan data dari form
    $userid = $_POST['userid'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    // Menjalankan query update
    $result = mysqli_query($mysqli, "UPDATE user SET nama='$nama', username='$username', password='$password', level='$level' WHERE userid=$userid");

    // Memeriksa apakah query berhasil dijalankan
    if($result) {
        // Redirect kembali ke halaman user.php setelah update berhasil
        header("Location: user.php");
        exit; // Menghentikan eksekusi script
    } else {
        // Menampilkan pesan error jika query gagal dijalankan
        echo "Error: " . mysqli_error($mysqli);
    }
} else {
    // Menampilkan pesan error jika data tidak disubmit
    echo "Data tidak ditemukan.";
}
?>
