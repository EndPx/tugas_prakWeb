<?php
include "../../core/koneksi.php";
$id =$_GET['id'];
$query=mysqli_query($konek,"DELETE FROM categories where
id=$id");
if($query)
{
    header("location:categories.php");
}
else
{
echo "Proses hapus gagal";
}
?>