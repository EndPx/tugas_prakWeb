<?php
$target_file=basename($_FILES["image"]["name"]);
$uploadOk=1;
$imageFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
    } else {
        echo "File is not an image.";
    }
}

include "koneksi.php";
$image = basename($_FILES["image"]["name"]);
$name = $_POST['name'];
$bio = $_POST['bio'];

$query = mysqli_query($konek,"INSERT INTO `artists`(`name`, `bio`, `user_id`, `image`) VALUES ('$name','$bio','".$_SESSION["id"]."','$image')" ) or die(mysqli_error($konek));
if ($query) {
    header("location:../page/admin/artists.php");
} else {
    echo "Proses Input gagal";
}