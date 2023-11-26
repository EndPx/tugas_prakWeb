<?php
    $id=$_GET['id'];
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
                                Hi, users
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
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
            <?php
            include '../../core/koneksi.php';
            $query = mysqli_query($konek, "SELECT songs.*, artists.*, categories.* 
            FROM songs
            INNER JOIN artists ON songs.artist_id = artists.id 
            INNER JOIN categories ON songs.category_id = categories.id
            WHERE songs.id = $id");
            $lagu = $query->fetch_assoc();
                    echo '
                    <div>
                        <h1 class="text-center">Now Playing</h1>
                        <p class="text-center">'.$lagu['title'].'</p>
                        <p class="text-center">By : '.$lagu['name'].'</p>
                        <div><img class="card-img-top mx-auto d-block" src="../../poster'.$lagu['image'].'" alt="Card image cap" style="height: 500px;width:300px;object-fit: cover;"></div>
                        <div class="text-center pt-2"><audio controls>
                                    <source src="../../musik/'.$lagu['file'].'" type="audio/mpeg">
                                    </audio></div>
                        

                    </div>
                ';
            ?>
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