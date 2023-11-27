<?php
include "koneksi.php";
$id =$_GET['song_id'];
$query=mysqli_query($konek,"DELETE FROM songs where
id=$id");
if($query)
{
    header("location:songs.php");
}
else
{
echo "Proses hapus gagal";
}
?>