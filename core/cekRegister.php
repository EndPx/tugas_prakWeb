<?php
    include 'koneksi.php';

    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $date = date('Y-m-d H:i:s');

        $query = mysqli_query($konek, "INSERT INTO `users`(`username`, `email`, `password`, `role`, `date`) VALUES ('$username','$email','$password','user','$date')")
        or die(mysqli_error($connect));

        if($query)
        {
          session_start();
          $_SESSION["username"] = $username;
          header("location:../page/user/songs.php");
        }
        else
        {
            echo "proses input data gagal";
        }
    ?>