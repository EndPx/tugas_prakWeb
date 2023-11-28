<?php
session_start();
if (empty($_SESSION["role"])) {
    header("location:../login.php?pesan=belumlogin");
}
?>

<?php
include "koneksi.php";

if (!isset($_SESSION["id"])) {
    echo "Please log in first.";
    exit();
}

$title = $_POST['title'];
$category = $_POST['category'];
$artist = $_POST['artist'];
$image = $_FILES['image']['name'];
$music = $_FILES['music']['name'];
$date = date('Y-m-d H:i:s');

$query = mysqli_query($konek, "INSERT INTO `songs`(`title`, `user_id`, `artist_id`, `image`, `file`, `category_id`, `date`) VALUES ('$title','".$_SESSION["id"]."','$artist','$image','$music','$category','$date')"
) or die(mysqli_error($konek));

if ($query) {
    header("location:../page/admin/songs.php");
} else {
    echo "Proses Input gagal";
}
?>