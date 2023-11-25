<?php
session_start();
include"koneksi.php";

$username = $_POST["username"];
$password = $_POST["password"];
$data = mysqli_query($konek,"SELECT * from users WHERE username = '$username' and password = '$password'") or die (mysqli_error($connect));

$cek = mysqli_num_rows($data);

if($cek >0){
    $row = mysqli_fetch_assoc($data);
    $_SESSION["username"] = $username;
    $_SESSION["status"] = "login";
    if($row["role"]="admin"){
        $_SESSION["role"]="admin";
        header("location:../page/admin/home.php");
    }else{
        $_SESSION["role"]="user";
        header("location:../page/user/home.php");
    }
    
}
else{
    header("location:../login.php?pesan=gagal");
}
?>