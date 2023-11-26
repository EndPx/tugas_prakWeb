<?php
include "../../core/koneksi.php";
$judul = $_POST['judul'];
$user = $_POST['user'];
$penyanyi = $_POST['penyanyi'];
$gambar = $_POST['gambar'];
$lagu = $_POST['lagu'];
$kategori = $_POST['kategori'];
$view = $_POST['view'];
$query = mysqli_query(
    $konek,
    "INSERT INTO songs
VALUES('','$judul','$user','$penyanyi','$gambar','$lagu','$kategori','','$view','','')"
) or die(mysqli_error($konek));
if ($query) {
    header("location:songs.php");
} else {
    echo "Proses Input gagal";
}
?>