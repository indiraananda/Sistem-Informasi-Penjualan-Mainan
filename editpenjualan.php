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
        $id = $_POST['id_penjualan'];
        $bar = $_POST['id_produk'];
        $peng = $_POST['id_pelanggan'];
        $cus = $_POST['id_admin'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE penjualan 
    SET id_produk='$bar',
    id_pelanggan=$peng,id_admin=$cus WHERE id_penjualan=$id");

    // Redirect to homepage to display updated user in list
    header("Location: penjualan.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM penjualan WHERE id_penjualan=$id");

while($user_data = mysqli_fetch_array($result))
{
    $bar = $user_data['id_produk'];
    $peng = $user_data['id_pelanggan'];
    $cus = $user_data['id_admin'];
}
?>
<html>
<head>  
    <title>Ubah Data Penjualan</title>
</head>

<body>
    <a href="penjualan.php">Ke Penjualan</a>
    <br/><br/>

    <h2>Sistem Informasi Penjualan Mainan</h2>

    <form name="update_penjualan" method="post" action="editpenjualan.php">
        <table border="0">
            <tr> 
                <td>ID_PRODUK</td>
                <td><input type="int" name="id_produk" value=<?php echo $bar;?>></td>
            </tr>
            <tr> 
                <td>ID_PELANGGAN</td>
                <td><input type="int" name="id_pelanggan" value=<?php echo $peng;?>></td>
            </tr>
            <tr> 
                <td>ID_ADMIN</td>
                <td><input type="int" name="id_admin" value=<?php echo $cus;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id_penjualan" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Ubah"></td>
            </tr>
        </table>
    </form>
</body>
</html>