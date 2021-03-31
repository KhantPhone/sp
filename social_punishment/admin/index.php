<?php 

	require_once '../database/db_connect.php';

	if ($_POST) {

		$search = $_POST['search'];
		$sql = "SELECT * FROM ministry WHERE traitor_name LIKE '%$search%'";
		$result = mysqli_query($mysqli,$sql);
		$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);

	}
	else{
		$sql = "SELECT * FROM ministry ORDER BY traitor_id DESC";
		$result = mysqli_query($mysqli,$sql);
		$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
	}

	

	
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Social Punishment</title>
	<link rel="stylesheet" href="library/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="library/fontawesome/fontawesome-all.min.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Barlow:wght@300&family=Sarabun:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	
	<a href="index.php">
		<h1 class="font-sar text-fav text-center mt-3 text-fav font-weight-bold text-uppercase">Social Punishment</h1>
	</a>
	<div class="container">
		<div class="d-flex justify-content-between  mt-2">
			<a href="add.php">
			<button class="btn btn-success px-5 font-sar">Add</button>
			</a>
			<form action="" method="post">
				<input type="text" name="search" placeholder="Search by name" class="py-2 px-2">
				<input type="submit" class="btn btn-success" value="search">
			</form>
		</div>

		<table class="table font-bar font-16 mt-4 table-striped">
			<thead>
				<tr>
					<th>id</th>
					<th>name</th>
					<th>position</th>
					<th>office</th>
					<th>location</th>
					<th>violation</th>
					<th>image</th>
					<th>action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if ($rows) {
						$i = 1 ;
						foreach ($rows as $value) {
							
							?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo htmlspecialchars($value['traitor_name']) ?></td>
					<td><?php echo htmlspecialchars($value['traitor_position']) ?></td>
					<td><?php echo htmlspecialchars($value['traitor_office']) ?></td>
					<td><?php echo htmlspecialchars($value['traitor_location']) ?></td>
					<td><?php echo htmlspecialchars($value['traitor_violation']) ?></td>
					<td><?php echo htmlspecialchars($value['traitor_img']) ?></td>
					<td>
						<div class="d-flex">
							<a href="edit.php?id=<?php echo $value['traitor_id'] ?>" class="btn btn-outline-warning mr-3">					
							edit
							</a>
							<a href="delete.php?id=<?php echo $value['traitor_id'] ?>" onClick = "return confirm('Are u sure to delete this item ?')" class="btn btn-outline-danger">	
							delete
							</a>
						</div>
					</td>
				</tr>
				<?php
					$i++;
						}
						
					}
				 ?>
				
			</tbody>
		</div>
	</div>
	
	<script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="library/bootstrap/popper.min.js"></script>
	<script src="library/bootstrap/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
	
</body>
</html>