<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:../login.php?pesan=belumlogin");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Music Website</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<style>
        .card-img-top {
            transition: transform 0.3s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.1);
        }

        .card {
            position: relative;
            overflow: hidden;
        }
    </style>
</head>
<body>
<header class="bg-dark">
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Music Website</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="songs.php">Songs</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </a>
                            
                            <ul class="dropdown-menu">
                                <?php
                                    include '../../core/koneksi.php';
                                    $query = mysqli_query($konek, "SELECT * FROM categories where disabled='0'");
                                    if ($query->num_rows > 0) {
                                        while($row = $query->fetch_assoc()) {
                                            echo '
                                                <li>
                                                    <a class="dropdown-item" href="categories.php?id='.$row['id'].'">'.$row['category'].'</a>
                                                </li>
                                            ';
                                        }
                                    }
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="artists.php">Artists</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hi, <?php echo $_SESSION['username'];?>
                            </a>
                            <ul class="dropdown-menu">
                                <?php
                                if (isset($_SESSION["role"])) {
                                    echo '<li><a class="dropdown-item" href="../admin/songs.php">Admin</a></li>';
                                }
                                ?>
                                <li><a class="dropdown-item" href="../../core/logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

<main>
    <div class="container">
	<h1 class="text-center">Artists</h1>
        <div class="row gx-5">
            <?php
            include '../../core/koneksi.php';
            $query = mysqli_query($konek, "SELECT * 
            FROM artists");
			

            if ($query->num_rows > 0) {
                while($row = $query->fetch_assoc()) {
                    echo '
                        <div class="col-md-3 mb-3">
                            <div class="card" style="width: 18rem;">
                                <a href="artist.php?id='.$row['id'].'"><img class="card-img-top" src="../../poster/'.$row['image'].'" alt="Card image cap" style="height: 200px;object-fit: cover;"></a>
                                <div class="card-body">
                                    <h5 class="card-title">'.$row['name'].'</h5>
                                </div>
                            </div>
                        </div>
                    ';
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
    
</main>

    <footer class="bg-dark">
        <div class="container text-center text-white">
            <p>Copyright &copy; <?=date("Y")?></p>
        </div>
    </footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>