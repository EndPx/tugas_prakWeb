<?php
session_start();
if (empty($_SESSION["role"])) {
    header("location:../../login.php?pesan=belumlogin");
}
?>

<?php
include "../../core/koneksi.php";
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
$query = mysqli_query($konek,"INSERT INTO users VALUES('','$username','$email','$password','$role','')"
) or die(mysqli_error($konek));
if ($query) {
    header("location:users.php");
} else {
    echo "Proses Input gagal";
}
?>