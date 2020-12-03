<?php
// include database connection file
include_once("config.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{   
    $id = $_POST['id'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];

    // update user data
    $result = mysqli_query($mysqli, "UPDATE produk 
    SET stok=$stok,harga=$harga WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM produk WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $id = $user_data['id'];
    $stok = $user_data['stok'];
    $harga = $user_data['harga'];
}
?>
<html>
<head>  
    <title>Ubah Data Produk</title>
</head>

<body>
    <a href="index.php">Ke Halaman Awal</a>
    <br/><br/>

    <h2>Sistem Informasi Penjualan Mainan</h2>

    <form name="update_user" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>stok</td>
                <td><input type="int" name="stok" value=<?php echo $stok;?>></td>
            </tr>
            <tr> 
                <td>harga</td>
                <td><input type="int" name="harga" value=<?php echo $harga;?>></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Ubah"></td>
            </tr>
        </table>
    </form>
</body>
</html>
