<?php
session_start();
if (empty($_SESSION["role"])) {
    header("location:../login.php?pesan=belumlogin");
}
?>

<?php


include "koneksi.php";
$id=$_GET['id'];
$image = "";
$file = "";
if (isset($_FILES["image"])) {
    $target_dir = "../uploads/";
    $target_file =basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $cari=mysqli_query($konek,"SELECT image FROM songs WHERE $id=id");
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

$title = $_POST['title'];
$category = $_POST['category'];
$artist = $_POST['artist'];

$query = mysqli_query($konek,"UPDATE `songs` SET `title`='$title',`artist_id`='$artist',`image`='$image',`category_id`='$category' WHERE id='$id'")
or die(mysqli_error($konek));
if ($query) {
    header("location:../page/admin/songs.php");
} else {
    echo "Proses Input gagal";
}

?>