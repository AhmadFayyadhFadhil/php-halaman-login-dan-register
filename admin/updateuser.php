<?php
include '../koneksi.php';

if(isset($_POST['update'])) {
    $userid = $_POST['userid'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $query = "UPDATE user SET username='$username', password='$password' WHERE userid=$userid";
    $result = mysqli_query($mysqli, $query);

    if($result) {
        echo "Data berhasil diperbarui.";
        header("Location: user.php");
        exit();
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($mysqli);
    }
}


if(isset($_GET['id'])) {
    $userid = $_GET['id'];
    $query = "SELECT * FROM user WHERE userid=$userid";
    $result = mysqli_query($mysqli, $query);
    $data = mysqli_fetch_assoc($result);
} else {
    echo "ID user tidak ditemukan.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="icon" type="image/png" href="img/logotitle.png">
    <link rel="stylesheet" href="styleupdate.css">
</head>
<body>
<div class="container">
    <header>
        <h1 class="title">Update User</h1>
    </header>
    <section class="form">
        <form method="POST" action="">
            <input type="hidden" name="userid" value="<?php echo $data['userid']; ?>">
            
            
            <label for="nama">Nama:</label><br>
            <input type="text" id="nama" name="nama" value="<?php echo $data['nama']; ?>" readonly><br>

            
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" value="<?php echo $data['username']; ?>"><br>

            
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" value="<?php echo $data['password']; ?>"><br>
            
            <input type="submit" name="update" value="Update" class="button">
        </form>
    </section>
</div>
</body>
</html>
