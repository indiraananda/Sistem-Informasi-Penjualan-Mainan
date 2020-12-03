<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
?>
<html>
<head>
    <title>Tambah data penjualan</title>
</head>

<body>
    <a href="penjualan.php">Kembali ke penjualan</a>
    <br/><br/>

    <h2>Sistem Informasi Penjualan Mainan</h2>

    <form action="addpenjualan.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>ID_PENJUALAN</td>
                <td><input type="int" name="id_penjualan"></td>
            </tr>
            <tr> 
                <td>ID_BARANG</td>
                <td><input type="text" name="id_produk"></td>
            </tr>
            <tr> 
                <td>ID_PELANGGAN</td>
                <td><input type="int" name="id_pelanggan"></td>
            </tr>
            <tr> 
                <td>ID_ADMIN</td>
                <td><input type="int" name="id_admin"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="submit" name="Submit" value="Tambah"></td>
            </tr>
        </table>
    </form>

    <?php

    // Check If form submitted, insert form data into users table.
    if(isset($_POST['Submit'])) {
        $id = $_POST['id_penjualan'];
        $bar = $_POST['id_produk'];
        $peng = $_POST['id_pelanggan'];
        $cus = $_POST['id_admin'];

        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO penjualan VALUES($id,$bar,$peng,$cus)");

        // Show message when user added
        echo "Suksess!!! Data penjualan berhasil ditambahkan. <a href='penjualan.php'>Lihat Data</a>";
    }
    ?>
</body>
</html>