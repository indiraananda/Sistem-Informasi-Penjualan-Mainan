<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT a.harga, a.stok, b.id_pelanggan, b.id_penjualan 
FROM produk a LEFT JOIN penjualan b 
ON a.id = b.id_produk");
?>
<html>
<head>    
    <title>HALAMAN JOIN</title>
</head>

<body>
    <h1><center>Sistem Informasi Penjualan Mainan</center></h1>
    <center>
    
     <table width='80%' border=1>

    <tr>
        <th>HARGA</th> <th>STOK</th> <th>ID_PELANGGAN</th> <th>ID_PENJUALAN</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['harga']."</td>";
        echo "<td>".$user_data['stok']."</td>"; 
        echo "<td>".$user_data['id_pelanggan']."</td>";   
        echo "<td>".$user_data['id_penjualan']."</td>";
    }
    ?>
    </table>
    </center>
    <?php
        echo "<center><a href=index.php>Halaman Awal</a></center>";
    ?>
</body>
</html>