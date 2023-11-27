<?php

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
    } else {
        echo "File is not an image.";
    }
}

include "koneksi.php";
$id=$_GET['id'];

$image = "";
if (isset($_POST["$image"])) {
    $image = basename($_FILES["image"]["name"]);
} else {
    $cari=mysqli_query($konek,"SELECT image FROM songs WHERE id=$id");
    $data = mysqli_fetch_array($cari);
    $image= $data['image'];
}

$name = $_POST['name'];
$bio = $_POST['bio'];
$id=$_GET['id'];

$query = mysqli_query($konek,"UPDATE `artists` SET `name`='$name',`bio`='$bio',`image`='$image' WHERE id=$id")
or die(mysqli_error($konek));
if ($query) {
    header("location:../page/admin/artists.php");
} else {
    echo "Proses Input gagal";
}

?>