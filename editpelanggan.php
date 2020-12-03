<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("location: login.php");
    exit;
}
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
        $id2 = $_POST['id'];
        $alamat = $_POST['alamat'];
        $name = $_POST['nama'];
    // update user dataat
    $result = mysqli_query($mysqli, "UPDATE pelanggan 
    SET id='$id2',alamat='$alamat',
    nama=$name");

    // Redirect to homepage to display updated user in list
    header("Location: pelanggan.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id2 = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM pelanggan WHERE id=$id2");

while($user_data = mysqli_fetch_array($result))
{
    $alamat = $user_data['alamat'];
    $name = $user_data['nama'];
}
?>
<html>
<head>  
    <title>Ubah Data Pelanggan</title>
</head>

<body>
    <a href="Pelanggan.php">Ke Pelanggan</a>
    <br/><br/>

    <h2>Sistem Informasi Penjualan Mainan</h2>

    <form name="update_pelanggan" method="post" action="editpelanggan.php">
        <table border="0">
            <tr> 
                <td>ALAMAT</td>
                <td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
            </tr>
            <tr> 
                <td>NAMA</td>
                <td><input type="text" name="nama" value=<?php echo $name;?>></td>
            </tr>
                <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Ubah"></td>
            </tr>
        </table>
    </form>
</body>
</html>