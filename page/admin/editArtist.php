<?php
session_start();
if (empty($_SESSION["role"])) {
    header("location:../../login.php?pesan=belumlogin");
}
?>

<?php
	include '../../core/koneksi.php';
    $id=$_GET['id'];
	$query = mysqli_query($konek, "select * from artists WHERE id=$id");
	$data = mysqli_fetch_array($query);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah User</title>
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
								<li><a class="dropdown-item" href="../songs/home.php">User</a></li>
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
                        <h2>Edit Artist</h2> 
                    </center>
                </div>
                <div class="card-body">
                    <form action="../../core/editArtist.php?id=<?php echo $data['id'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $data['name']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Bio:</label>
                            <input type="text" class="form-control" id="bio" name="bio" value="<?php echo $data['bio']; ?>">
                        </div>
                        <div class="form-group pb-3">
                            <label for="image">Old Image:</label>
                            <input type="text" class="form-control" value="<?php echo htmlspecialchars($data['image']); ?>" readonly>
                        </div>
                        <div class="form-group pb-3">
                            <label for="image">New Image:</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        

                        <button type="submit" class="btn btn-primary mx-auto d-block">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-dark">
        <div class="container text-center text-white">
            <p>Copyright &copy; <?=date("Y")?></p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>