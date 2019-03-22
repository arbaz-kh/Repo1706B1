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
<?php

session_start();

$con = new mysqli('localhost','root','','php1706b1') or die(mysqli_error($con));

if(isset($_POST['btnSubmit']))
{
	$username = $_POST['txtUname'];
	$email = $_POST['txtEmail'];	
	$Password = $_POST['txtPsw'];	
	$Contact = $_POST['txtCnt'];
	
	$con->query("insert into Registration(contact,email,password,username) values('$Contact','$email','$Password','$username')") or die(mysqli_error($mysqli));
	
	/*$_SESSION['uname'] = $_POST['txtUname'];
	setcookie("email",$_POST['txtEmail']);
	setcookie("password",$_POST['txtPsw']);
	setcookie("contact",$_POST['txtCnt']);
	header("Location: Output.php");*/
		
}


?>


	<div class="row">
    <div class="col-md-12">
    	<div class="jumbotron">
  			<h3 class="display-4">Registration Form</h3>
  		</div>
    
    </div>
    	
    </div>
    
    <div class="row">
    	<div class="col-md-4">
        	<form method="post" >
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="txtEmail" aria-describedby="emailHelp" placeholder="Enter email">               
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Username</label>
                <input type="text" class="form-control" name="txtUname" placeholder="Username">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="txtPsw" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Contact</label>
                <input type="text" class="form-control" name="txtCnt" placeholder="Password">
              </div>
              <button type="submit" name="btnSubmit" class="btn btn-primary">Registration</button>
              <br>
               <div class="form-group">              
                <input type="text" class="form-control" name="txtSearch" placeholder="User ID">
                <button type="submit" name="btnShow" class="btn btn-primary">View All</button>
                <button type="submit" name="btnSearch" class="btn btn-primary">Search</button>
              </div>
            </form>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <table class="table table-condensed">

          <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Contact</th>
          </tr>
          <?php
          if(isset($_POST['btnShow']))
          { 

          $select = mysqli_query($con,"select * from Registration");

          while($row = mysqli_fetch_array($select))
          {
          ?>
            <tr>
            <td><?php echo $row['Username']?></td>
            <td><?php echo $row['Email']?></td>
            <td><?php echo $row['Password']?></td>
            <td><?php echo $row['Contact']?></td>
            </tr>
          <?php

          }
          } 
          if(isset($_POST['btnSearch']))
          {            
            $id = $_POST['txtSearch'];
            $select = mysqli_query($con,"select * from Registration where Id ='$id' ");

            if($row = mysqli_fetch_array($select))
            {
            ?>
              <tr>
              <td><?php echo $row['Username']?></td>
              <td><?php echo $row['Email']?></td>
              <td><?php echo $row['Password']?></td>
              <td><?php echo $row['Contact']?></td>
              </tr>
            <?php

            }
          }
          ?>

          

        </table>
      </div>
    </div>

</div>


</body>
</html>
