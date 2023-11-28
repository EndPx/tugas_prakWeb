<?php
session_start();
if (empty($_SESSION["role"])) {
    header("location:../login.php?pesan=belumlogin");
}
?>

<?php
include "koneksi.php";

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
    } else {
        echo "File is not an image.";
    }
}

$id=$_GET['id'];
$image = "";
if (isset($_FILES["image"])) {
    $target_dir = "../uploads/";
    $target_file = basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $cari=mysqli_query($konek,"SELECT image FROM artists WHERE id=$id");
    $data = mysqli_fetch_array($cari);
    $image= $data['image'];
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        $image = $target_file;
    }
}

$name = $_POST['name'];
$bio = $_POST['bio'];

$query = mysqli_query($konek,"UPDATE `artists` SET `name`='$name',`bio`='$bio',`image`='$image' WHERE id=$id")
or die(mysqli_error($konek));
if ($query) {
    header("location:../page/admin/artists.php");
} else {
    echo "Proses Input gagal";
}

?>