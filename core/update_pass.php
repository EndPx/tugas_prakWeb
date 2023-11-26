<?php
include "koneksi.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($konek, "UPDATE users SET password='$password' where username='$username' and email='$email'")
    or die(mysqli_error($konek));

if (mysqli_affected_rows($konek) > 0) {
    header("location:../login.php?pesan=ganti");
} else {
    header("location:../ganti_pass.php?pesan=salah");
}
?>