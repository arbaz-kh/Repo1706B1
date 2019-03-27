<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

		
	<div class="container">
		<div class="row">
			<?php          
		  $con = new mysqli('localhost','root','','php1706b1') or die(mysqli_error($con));

          $select = mysqli_query($con,"select * from Course");

          while($row = mysqli_fetch_array($select))
          {
          ?>

			<div class="col-md-4">
				<div class="card" style="width: 18rem;">
				  <img src="Courses/<?php echo $row['Image']?>" class="card-img-top" alt="Image not found">
				  <div class="card-body">
				    <h5 class="card-title"><?php echo $row['Name']?></h5>
				    <p class="card-text"><?php echo $row['Price']?></p>
				    <a href="#" class="btn btn-primary">Register Course</a>
				  </div>
				</div>
			</div>
			<?php
			}
			?>

			<!-- <div class="col-md-4">
			<div class="card" style="width: 18rem;">
				  <img src="Courses/java.jpg" class="card-img-top" alt="Image not found">
				  <div class="card-body">
				    <h5 class="card-title">Java</h5>
				    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				    <a href="#" class="btn btn-primary">Go somewhere</a>
				  </div>
			</div>
			</div>
			<div class="col-md-4">
			<div class="card" style="width: 18rem;">
				  <img src="Courses/js.png" class="card-img-top" alt="Image not found">
				  <div class="card-body">
				    <h5 class="card-title">Java</h5>
				    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
				    <a href="#" class="btn btn-primary">Go somewhere</a>
				  </div>
			</div>
			</div> -->
		</div>
	</div>
	

</body>
</html>