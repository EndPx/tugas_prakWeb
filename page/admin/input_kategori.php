<?php
include "../../core/koneksi.php";
$kategori = $_POST['kategori'];
$active = $_POST['active'];


$query = mysqli_query(
    $konek,
    "INSERT INTO categories
VALUES('','$kategori','$active')"
) or die(mysqli_error($konek));
if ($query) {
    header("location:categories.php");
} else {
    echo "Proses Input gagal";
}
?>