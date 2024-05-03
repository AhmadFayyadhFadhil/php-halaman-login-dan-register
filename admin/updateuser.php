<?php 

include ("koneksi1.php");

//kalau tidak ada id di query string
if(!isset($_GET['id'])){
    header('Location: user.php');
}
$userid = $_GET['id'];

// Fetech usser data based on id
$result = mysqli_query($mysqli, "SELECT * FROM user WHERE userid=$userid");

while($user_data = mysqli_fetch_array($result))
{
    $nama =  $user_data['nama'];
    $username =  $user_data['username'];
    $password =  $user_data['password'];
    $level =  $user_data['level'];
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
    <from method="POST" action="prosesupdateuser.php">
        <table>
           <tr>
                <td>Nama</td>
                <<td><input type="text" name="nama" value="<?php echo $nama;?>"></td>
            </tr> 

            <tr>
                <td>Username</td>
                <<td><input type="text" name="username" value="<?php echo $username;?>"></td>
            </tr> 

            <tr>
                <td>Password</td>
                <<td><input type="text" name="password" value="<?php echo $password;?>"></td>
            </tr> 

            <tr>
                <td>level</td>
                <<td>
                    <select name="level" id="level" required>
                    
                    <option value="user">user</option>
                     </select>
                </td>
            </tr> 

            <tr>
                <td><input type="hidden" name="userid" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="simpan" value="simpan"></td>
            </tr>

        </table>
    </from>
</div>
</body>
</html>
  

