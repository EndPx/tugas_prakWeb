<?php
include "koneksi.php";
$id =$_GET['id'];
$query=mysqli_query($konek,"UPDATE `categories` SET `disabled`='0' WHERE id=$id");
if($query)
{
    header("location:../page/admin/categories.php");
}
else
{
echo "Proses hapus gagal";
}
?>