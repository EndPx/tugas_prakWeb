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
$file = "";
if (isset($_POST["$image"])) {
    $image = basename($_FILES["image"]["name"]);
} else {
    $cari=mysqli_query($konek,"SELECT image FROM songs WHERE $id=id");
    $data = mysqli_fetch_array($cari);
    $image= $data['image'];
}

if (isset($_POST["$file"])) {
    $file = basename($_FILES["file"]["name"]);
} else {
    $cari=mysqli_query($konek,"SELECT file FROM songs WHERE $id=id");
    $data = mysqli_fetch_array($cari);
    $file= $data['image'];
}

$name = $_POST['name'];
$bio = $_POST['bio'];


$query = mysqli_query($konek,"UPDATE `artists` SET `name`='$name',`bio`='$bio',`image`='$image' WHERE id=$id")
or die(mysqli_error($konek));
if ($query) {
    header("location:../page/admin/songs.php");
} else {
    echo "Proses Input gagal";
}

?>