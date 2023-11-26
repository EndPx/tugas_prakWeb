<?php
include "import.php";
$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($konek, "UPDATE users SET username='$username',
password='$password' where id='$id'")
    or die(mysqli_error($konek));
if ($query) {
    header("location:login.php");
} else {
    echo "Proses Input gagal";
}
?>