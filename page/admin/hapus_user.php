<?php
include "../../core/koneksi.php";
$id =$_GET['id'];
$query=mysqli_query($konek,"DELETE FROM users where
id=$id");
if($query)
{
    header("location:users.php");
}
else
{
echo "Proses hapus gagal";
}
?>