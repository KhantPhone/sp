<?php 

	require_once '../database/db_connect.php';

	$errors = array('t_name' => '' , 't_position' => '' , 't_office' => '' , 't_location' => '' , 
		't_violation' => '' ,'t_img' => '');

	if ($_POST) {

		$t_name = $_POST['t_name'];
		$t_position = $_POST['t_position'];
		$t_office = $_POST['t_office'];
		$t_location = $_POST['t_location'];
		$t_violation = $_POST['t_violation'];
		$t_img =$_FILES['image']['name'];

		if (empty($t_name)) {
			$errors['t_name'] =  "name cannot be empty";
		}
		if (empty($t_position)) {
			$errors['t_position'] = "position cannot be empty";
		}
		if (empty($t_office)) {
			$errors['t_office'] = "office cannot be empty";
		}
		if (empty($t_location)) {
			$errors['t_location'] = "location cannot be empty";
		}
		if (empty($t_violation)) {
			$errors['t_violation'] = "violation cannot be empty";
		}
		if (empty($t_img)) {
			$errors['t_img'] = "image cannot be empty";
		}
		if(array_filter($errors)) {
			//echo "errors in form";
		}
		else{
			$file = '../assets/'.($_FILES['image']['name']);
			$imageType = pathinfo($file,PATHINFO_EXTENSION);
			move_uploaded_file($_FILES['image']['tmp_name'], $file);

			if ($imageType != 'png' && $imageType != 'jpg' && $imageType!= 'jpeg' && $imageType != 'svg') {
				echo "<script>alert('invalid image format!')</script>";
			}
			else{
				$sql = "INSERT INTO ministry(traitor_name,traitor_position,traitor_office,traitor_location,traitor_violation,traitor_img) VALUES ('$t_name','$t_position','$t_office',
				'$t_location','$t_violation','$t_img')";
				if (mysqli_query($mysqli,$sql)) {
					echo "<script>alert('successfully added!');</script>";
				}
				else{
					echo "<script>alert(failed!);</script>".mysqli_error($mysqli);
				}
			}
		}
		
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
	<link rel="stylesheet" href="css/add.css">
</head>
<body>

	<h1 class="text-fav font-sar text-center mt-4 text-uppercsase font-weight-bold">
		Add Tratitors
	</h1>
	<div class="container">
	<form action="" method ="post" enctype="multipart/form-data" class="font-bar font-16 mt-5">		
			<input type="text" name="t_name" class="form-control mb-4" placeholder="name" >
			<p class="text-danger ">
				<?php echo $errors['t_name']; ?>
			</p>
			<input type="text" name="t_position" class="form-control mb-4" placeholder="position" >
			<p class="text-danger ">
				<?php echo $errors['t_position']; ?>
			</p>
			<input type="text" name ="t_office" class="form-control mb-4" placeholder="office" >
			<p class="text-danger ">
				<?php echo $errors['t_office']; ?>
			</p>
			<input type="text" name="t_location" class="form-control mb-4" placeholder="location" >
			<p class="text-danger ">
				<?php echo $errors['t_location']; ?>
			</p>
			<input type="text" name="t_violation"class="form-control mb-4" placeholder="violation" >
			<p class="text-danger ">
				<?php echo $errors['t_violation']; ?>
			</p>
			<input type="file" name="image" class=" mb-4">
			<p class="text-danger ">
				<?php echo $errors['t_img']; ?>
			</p>
			<input type="submit" name="submit" value="Add" class="btn btn-success d-block btn-block mx-auto d-block">
	</form>
		<a href="index.php" style="text-decoration: none;">
			<button class="btn btn-danger btn-block mt-3">Back To Home Page</button>
		</a>

	</div>
	<script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="library/bootstrap/popper.min.js"></script>
	<script src="library/bootstrap/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
	
</body>
</html>