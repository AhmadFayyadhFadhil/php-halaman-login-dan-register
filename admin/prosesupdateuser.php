<?php  

include("koneksi1.php");

//cek apakah tombol simpah sudah diclik atau belum
if(isset($_POST['simpan'])){

    $userid = $_POST['id'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $passsword = $_POST['password'];
    $level = $_POST['level'];

    // buat query update
    $result = mysqli_query($mysqli, "UPDATE user SET nama= '$nama', username= '$username', password= '$password', level= 'level' WHERE userid=$userid");
    header('Location: user.php')


}

?>