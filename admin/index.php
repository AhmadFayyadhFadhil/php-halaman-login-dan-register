<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
  <table border="1" class="table_admin">
    <tr>
      <th>no</th>
      <th>nama</th>
      <th>username</th>
      <th>password</th>
      <th>aksi</th>
    </tr>
  </table>

  <?php
    //select tabel user database
    $nomor = 1;
    echo $nomor;
    include '../koneksi.php';
    $query_mysql = mysqli_query($mysqli, "SELECT * FROM user") or die(mysqli_error());


     while($data = mysqli_fetch_array($query_mysql)){
     ?>

      <tr>
        <td><?php echo $nomor++;  ?></td>
        <td><?php echo $data['nama'];  ?></td>
        <td><?php echo $data['username'];  ?></td>
        <td><?php echo $data['password']  ?></td>
        <td>
    
    
        </td>
        <?php } ?>
      </tr>

</body>
</html>