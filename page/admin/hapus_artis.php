<?php
include "../../core/koneksi.php";
$id =$_GET['id'];
$query=mysqli_query($konek,"DELETE FROM artists where
id=$id");
if($query)
{
    header("location:artists.php");
}
else
{
echo "Proses hapus gagal";
}
?>