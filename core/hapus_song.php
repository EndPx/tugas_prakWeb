<?php
session_start();
if (empty($_SESSION["role"])) {
    header("location:../login.php?pesan=belumlogin");
}
?>

<?php
include "koneksi.php";
$id =$_GET['song_id'];
$query=mysqli_query($konek,"DELETE FROM songs where
id=$id");
if($query)
{
    header("location:../page/admin/songs.php");
}
else
{
echo "Proses hapus gagal";
}
?>