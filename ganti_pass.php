<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Site</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>


<body>
    <header>
        <nav class="navbar">
            <a class="navbar-brand">
            <img src="upload/spotipi.PNG" alt="Logo" width="150" height="32" class="d-inline-block align-text-top ps-5"></a>
            <div class="pe-5" id="navbarNav">
                <a class="btn btn-primary" href="login.php">Login</a>
            </div>
        </div>
        </nav>
    </header>
    
    <main>
        <div class="container mt-5">
            <form method="POST" action="core/update_php.php">
                <h1>Change Password</h1>
                <div>
                    <?php
                    if (isset($_GET['pesan'])) {
                        if ($_GET['pesan'] == "salah") {
                            echo "Username and email are not matching";
                        }
                    }
                    ?>
                </div>
                <div class="username">
                    <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required />
                    <img src="css/user.svg" alt="">
                </div>
                <div class="username">
                    <input type="email" class="form-control" type="email" name="email" placeholder="Masukkan email" required>
                    <img src="css/mail.svg" alt="">
                </div>
                <div class="password">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password Baru" required />
                    <a href="#"><img src="css/eye-off.svg" alt="eye off" id="eye"/></a>
                </div>
                <div class="account">
                    <p>Remember Password Now? <a href="login.php">Click here</a></p>
                </div>
                <div class="submit">
                    <button type="submit" class="but-submit">Change Password</button>
                </div>
            </form>
        </div>
    </main>
    

    <script>
        const password = document.getElementById("password");
        const eye = document.getElementById("eye");

        eye.addEventListener("click", () => {
        if (password.type === "password") {
            password.type = "text"; 
            eye.src = "css/eye.svg";
        } else {
            password.type = "password"; 
            eye.src = "css/eye-off.svg"; 
        }
        });
    </script>
</body>
</html>