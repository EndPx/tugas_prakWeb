<?php
include "../../core/koneksi.php";
$nama = $_POST['nama'];
$gambar = $_POST['gambar'];
$user = $_POST['user'];


$query = mysqli_query(
    $konek,
    "INSERT INTO artists
VALUES('','$nama','','$user','$gambar')"
) or die(mysqli_error($konek));
if ($query) {
    header("location:artists.php");
} else {
    echo "Proses Input gagal";
}
?>