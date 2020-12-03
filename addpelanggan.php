<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
?>
<html>
<head>
    <title>Tambah Data Pelanggan</title>
</head>

<body>
    <a href="pelanggan.php">Kembali ke Pelanggan</a>
    <br/><br/>

    <h2>Sistem Informasi Distro</h2>

    <form action="addpelanggan.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr> 
                <td>ID</td>
                <td><input type="int" name="id"></td>
            </tr>
            <tr> 
                <td>ALAMAT</td>
                <td><input type="text" name="alamat"></td>
            </tr>
            <tr> 
                <td>NAMA</td>
                <td><input type="text" name="nama"></td>
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
        $id2 = $_POST['id'];
        $alamat = $_POST['alamat'];
        $name = $_POST['nama'];
        // include database connection file
        include_once("config.php");

        // Insert user data into table
        $result = mysqli_query($mysqli, "INSERT INTO pelanggan VALUES($id2,$alamat,$name)");

        // Show message when user added
        echo "Suksess!!! Data pelanggan berhasil ditambahkan. <a href='pelanggan.php'>Lihat Data</a>";
    }
    ?>
</body>
</html>