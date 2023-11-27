<?php
include "koneksi.php";
$kategori = $_POST['kategori'];


$query = mysqli_query(
    $konek,
    "INSERT INTO categories
VALUES('','$kategori','0')"
) or die(mysqli_error($konek));
if ($query) {
    header("location:../page/admin/categories.php");
} else {
    echo "Proses Input gagal";
}
?>