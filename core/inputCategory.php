<?php
session_start();
if (empty($_SESSION["role"])) {
    header("location:../login.php?pesan=belumlogin");
}
?>

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