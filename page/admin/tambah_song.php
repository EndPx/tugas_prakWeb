<?php
session_start();
if (empty($_SESSION["role"])) {
    header("location:../../login.php?pesan=belumlogin");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Song</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
                            <a class="nav-link" href="users.php">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="songs.php">Songs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="categories.php">Categories</a></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="artists.php">Artists</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Hi, admin
                            </a>
                            <ul class="dropdown-menu">
								<li><a class="dropdown-item" href="../user/home.php">User</a></li>
                                <li><a class="dropdown-item" href="../../core/logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <main>
        <div class="container mt-5">
            <div class="card text-white bg-secondary mb-3">
                <div class="card-header">
                    <center>
                        <h2>Tambah Lagu</h2> 
                    </center>
                </div>
                <div class="card-body">
                    <form action="../../core/inputSong.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="category">Category:</label>
                            <select class="form-select form-select-sm" name="category" id="category" required>
                            <option selected><-Category-></option>
                            <?php
                              include '../../core/koneksi.php';
                              $query = mysqli_query($konek, "SELECT * FROM categories where disabled='0'");
                              if ($query->num_rows > 0) {
                                while($row = $query->fetch_assoc()) {
                                  echo '
                                      <option value="'.$row['id'].'">'.$row['category'].'</option>
                                  ';
                                }
                              }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="artist">Artist:</label>
                            <select class="form-select form-select-sm" name="artist" id="artist" required>
                            <option selected><-Artist-></option>
                            <?php
                              include '../../core/koneksi.php';
                              $query = mysqli_query($konek, "SELECT * FROM artists");
                              if ($query->num_rows > 0) {
                                while($row = $query->fetch_assoc()) {
                                  echo '
                                      <option value="'.$row['id'].'">'.$row['name'].'</option>
                                  ';
                                }
                              }
                            ?>
                            </select>
                        </div>
                        <div class="form-group pb-3">
                            <label for="image">Image:</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>
                        <div class="form-group pb-3">
                            <label for="music">Music:</label>
                            <input type="file" class="form-control" id="music" name="music" required>
                        </div>
                        <button type="submit" class="btn btn-primary mx-auto d-block">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>