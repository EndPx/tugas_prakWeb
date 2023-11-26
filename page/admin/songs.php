<!DOCTYPE html>
<html lang="en">
<head>
	<title>Music Website</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
                            <a class="nav-link" href="home.php">Main</a>
                        </li>
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
		<div class="container mt-5">
			<div class="card text-white bg-secondary mb-3">
				<div class="card-header">
					<h2>Menu List</h2>
				</div>
				<div class="card-body">
					<table class="table table-dark table-striped table-hover">
						<thead>
							<tr>
								<th scope="col">Id</th>
								<th scope="col">title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Artist</th>
								<th scope="col">image</th>
								<th scope="col">File</th>
								<th scope="col">View</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody>
                        <?php
                        include '../../core/koneksi.php';
                        $query = mysqli_query($konek, "SELECT songs.*, artists.*, categories.* 
                        FROM songs 
                        INNER JOIN artists ON songs.artist_id = artists.id 
                        INNER JOIN categories ON songs.category_id = categories.id");
                        while ($data = mysqli_fetch_array($query)) { ?>
                            <tr>    
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['title']; ?></td>
                                <td><?php echo $data['category']; ?></td>
                                <td><?php echo $data['name']; ?></td>
                                <td><img src="../../poster/<?=$data['image']?>" style="width:100px;height: 100px;object-fit: cover;"></td>
                                <td><audio controls>
                                    <source src="../../musik/<?=$data['file']?>" type="audio/mpeg">
                                    </audio></td>
                                <td><?php echo $data['views']; ?></td>
                                <td>
                                    <a class="btn btn-success" href="../../core/edit.php?id=<?php echo $data['id'] ?>">Edit</a>
                                    <a class="btn btn-danger" href="../../core/hapus.php?id=<?php echo $data['id'] ?>">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
					</table>
				</div>
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