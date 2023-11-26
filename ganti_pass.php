<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change Password Site</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .password-toggle {
            cursor: pointer;
            font-size: 24px;
        }

        input[type=password]::-ms-reveal,
        input[type=password]::-ms-clear {
            display: none;
        }

        body {
            background: url("background-log.jpg") no-repeat;
            background-size: cover;
            background-position: center;
        }
    </style>
</head>


<body>
<?php
    include 'import.php';
    $id = $_GET['id'];
    $query = mysqli_query($konek, "SELECT * from users where
    id=$id");
    $data = mysqli_fetch_array($query);
?>

    <nav class="navbar bg-white">
    <div class="container-fluid">
        <a class="navbar-brand">
        <img src="spotipi.PNG" alt="Logo" width="150" height="32" class="d-inline-block align-text-top"></a>
        <div class="d-flex" id="navbarNav">
            <a class="btn btn-primary" href="login.php">Login</a>
            
        </div>
    </div>
    </nav>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <form class="bg-white p-5 m-5 rounded" method="POST" action="update_pass.php">
            <h1 class="text-center">Ganti Password</h1>
            <div>
                <?php
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == "gagal") {
                        echo "Username and password are incorrect!";
                    } else if ($_GET["pesan"] == "logout") {
                        echo "You have successfully logged out!";
                    } else if ($_GET["pesan"] == "belumlogin") {
                        echo "Please log in first";
                    }
                }
                ?>
            </div>
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>"></br>
            <div class="form-group">
                <label for="username">Username</label>
                <div class="input-group">
                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username Sebelumnya" required />
                </div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-group">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password Baru" required />
                    <div class="input-group-append">
                        <span class="input-group-text password-toggle" onclick="togglePassword()">
                            <i class="fa fa-eye-slash"></i>
                        </span>
                    </div>
                </div>
            </div>
<br>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-block">Ganti</button>
            </div>
        </form>
    </div>

    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");
            var eyeIcon = document.querySelector(".password-toggle i");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            }
        }
    </script>
</body>

</html>
