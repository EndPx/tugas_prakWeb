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
	<h1 class="text-center"><?php  
	$query = mysqli_query($konek,"SELECT category from categories where categories.id=$id");
	$category = $query->fetch_assoc();
		echo $category['category']?> List</h1>
        <div class="row">
            <?php
            include '../../core/koneksi.php';
            $query = mysqli_query($konek, "SELECT songs.id AS song_id, categories.id AS category_id,songs.image AS song_image, songs.*, artists.*, categories.* 
            FROM songs 
            INNER JOIN artists ON songs.artist_id = artists.id 
            INNER JOIN categories ON songs.category_id = categories.id
			WHERE categories.id = $id");

            if ($query->num_rows > 0) {
                while($row = $query->fetch_assoc()) {
                    echo '
                        <div class="col-md-3 mb-3">
                            <div class="card" style="width: 18rem;">
                                <a href="song.php?id='.$row['song_id'].'"><img class="card-img-top" src="../../poster/'.$row['image'].'" alt="Card image cap" style="height: 200px;object-fit: cover;"></a>
                                <div class="card-body">
                                    <h5 class="card-title">'.$row['title'].'</h5>
                                    <p class="card-text">Artist: '.$row['name'].'</p>
                                    <p class="card-text">Category: '.$row['category'].'</p>
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