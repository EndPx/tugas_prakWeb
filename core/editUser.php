
<?php
include "koneksi.php";
$id =$_GET['id'];
$username =$_POST['username'];
$email =$_POST['email'];
$password =$_POST['password'];
$role =$_POST['role'];
$query=mysqli_query($konek,"UPDATE `users` SET `username`='$username',`email`='$email',`password`='$password',`role`='$role' WHERE $id=id");
if($query)
{
    header("location:../page/admin/users.php");
}
else
{
echo "Proses hapus gagal";
}
?>