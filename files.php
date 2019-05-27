<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>File Uploading</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
<?php
session_start();
$con = new mysqli('localhost','root','','phpCRUD') or die(mysqli_error($con));
// if(isset($_POST['btnUpld']))
// {
//     $name = $_FILES['img']['name'];
//     setcookie("image",$name);
//     $file = $_FILES['img']['tmp_name'];
//     move_uploaded_file($file,'Images/'.$name);
// }

if(isset($_POST['btnSbmt']))
{
    $name = $_FILES['img']['name'];
    setcookie("image",$name);
    $file = $_FILES['img']['tmp_name'];
    move_uploaded_file($file,'Images/'.$name);
    $_SESSION["UsrID"] = $_POST['txtMail'];
    
    setcookie("Contact",$_POST['txtCont']);
    setcookie("Name",$_POST['txtName']);
    header("Location: fileUpload.php");
}
if(isset($_POST['btnSave']))
{
    $mail = $_POST['txtMail'];
    $name = $_POST['txtName'];    
    $cont = $_POST['txtCont'];
    $psw = $_POST['txtPsw'];

    $con->query("insert into Register(name,email,password,contact) values('$name','$mail','$psw','$cont') ") or die(mysqli_error($con));    
}
if(isset($_GET['delete']))
{
    $id = $_GET['delete'];

    $con->query("delete from register where RegNo = '$id' ") or die(mysqli_error($con));    
    echo "<script>alert('Reg No: ".$id." has been deleted')</script>";
}
// if(isset($_POST['btnShow']))
// {
    
?>      
	<!-- <div class="row">
    	<div class="col-md-12">
            <div class="jumbotron">
                <h4 class="display-4">File Uploading</h4>
        	</div>
        </div>
    </div> -->
    
    <div class="row">
    <div class="col-md-6 offset-2">
    	<form method="post">
            <div class="form-group">
                <label>Name  </label>
                <input type="text" class="form-control" name="txtName"/>
            </div>
            
            <div class="form-group">
                <label>Email  </label>
                <input type="email" class="form-control" name="txtMail"/>
            </div>
            
            <div class="form-group">
                <label>Password  </label>
                <input type="password" class="form-control" name="txtPsw"/>
            </div>
            
            <div class="form-group">
                <label>Contact  </label>
                <input type="text" class="form-control" name="txtCont"/>
            </div>
            
            <!-- <div class="form-group">
                <label>File: </label>
                <input type="file" name="img"/>
            </div> -->
            <input type="submit" name="btnSave" value="Save" class="btn btn-danger"/>
            <input type="submit" name="btnSbmt" value="Send" class="btn btn-danger"/>
        
    </div>
        
    	
    </div>
<br>
<br>
    <div class="row">        
        <div class="col-md-3">
            <input type="submit" name="btnShow" value="View All Record" class="btn btn-danger"/>            
        </div>
        <div class="col-md-3">
            <input type="text" name="txtSearch" class="form-control">                        
        </div>
        <div class="col-md-3">    
            <input type="submit" name="btnSearch" value="Search" class="btn btn-danger"/>
            <br>
            <br>
        </div>
    </div>
    </form>
    <div class="row">
        <div class="col-md-12">
        <table class="table table-condensed">          
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Contact</th>
            <th colspan="2">Operations</th>            
          </tr>

<?php
//if(isset($_POST['btnShow']))
//{
    $con = mysqli_connect('localhost','root','','phpCRUD');
    $select = mysqli_query($con,"select * from Register") ;
    while($row = mysqli_fetch_assoc($select))        
        { ?> 
            <tr>
                <td><?php echo $row['Name']?></td>   
                <td><?php echo $row['Email']?></td>
                <td><?php echo $row['Password']?></td>  
                <td><?php echo $row['Contact']?></td> 
                <td>
                    <a href="edit.php?edit=<?php echo $row['RegNo']?>" class="btn btn-danger">Edit</a>
                    <a href="files.php?delete=<?php echo $row['RegNo']?>" class="btn btn-danger">Delete</a>
                </td>                
              </tr>  
              <?php
        }
   
if(isset($_POST['btnSearch']))
{
    $id = $_POST['txtSearch'];
    $search = mysqli_query($con,"select * from Register where RegNo='$id' ");
    if($row = mysqli_fetch_array($search))        
        { ?> 
            <tr>
                <td><?php echo $row['Name']?></td>   
                <td><?php echo $row['Email']?></td>
                <td><?php echo $row['Password']?></td>  
                <td><?php echo $row['Contact']?></td>   
                <td>
                    <a href="files.php?edit=<?php echo $row['RegNo']?>" class="btn btn-danger">Edit</a>
                    <a href="files.php?delete=<?php echo $row['RegNo']?>" class="btn btn-danger">Delete</a>
                </td>    
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