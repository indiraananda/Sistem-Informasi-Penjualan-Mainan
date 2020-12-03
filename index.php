<?php
error_reporting(0);
// Create database connection using config file
include_once("config.php");

// Fetch all users data from database
$result = mysqli_query($mysqli, "SELECT * FROM produk");

?>

<html>
<head>    
    <title>Halaman Awal</title>
</head>

<body>
<a href="add.php">Tambah Produk</a><br/><br/>

    <h1><center>Sistem Informasi Penjualan Mainan</center></h1>
    <center>
    <form action="" method="post">
    <input type="text" name="Kata" placeholder="Cari data....">
    <button type="submit" name="Cari">Cari</button>
    </form>
     <table width='80%' border=1>

    <tr>
        <th>ID</th> <th>STOK</th> <th>HARGA</th> <th>UBAH DATA</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id']."</td>";
        echo "<td>".$user_data['stok']."</td>";   
        echo "<td>".$user_data['harga']."</td>";
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a> | <a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>

    </table>
    </center>
</body>
</html>

