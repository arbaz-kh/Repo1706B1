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
    <div class="row">
    <div class="col-md-6 offset-2">
    <form  enctype="multipart/form-data" method="post">
<?php
$con = new mysqli('localhost','root','','phpCRUD');
if(isset($_GET['edit']))
{
    $id = $_GET['edit'];

    $select = mysqli_query($con,"select * from register where RegNo = '$id' ") or die(mysqli_error($con));
    if($row = mysqli_fetch_array($select))
    {   
    //echo "<script>alert('Reg No: ".$id." has been deleted')</script>";
?>
    
            <div class="form-group">
                <label>Name  </label>
                <input type="text" value="<?php echo $row['Name']?>" class="form-control" name="txtName"/>
            </div>
            
            <div class="form-group">
                <label>Email  </label>
                <input type="email" value="<?php echo $row['Email']?>" class="form-control" name="txtMail"/>
            </div>
            
            <div class="form-group">
                <label>Password  </label>
                <input type="text" value="<?php echo $row['Password']?>" class="form-control" name="txtPsw"/>
            </div>
            
            <div class="form-group">
                <label>Contact  </label>
                <input type="text" value="<?php echo $row['Contact']?>" class="form-control" name="txtCont"/>
            </div>
            
            <input type="submit" name="btnEdt" value="Update" class="btn btn-danger"/>
            <a href="files.php" class="btn btn-danger">Back</a>
        </form>

        <?php 
    }
}

if(isset($_POST['btnEdt']))
{
    $id = $_GET['edit'];
    $mail = $_POST['txtMail'];
    $name = $_POST['txtName'];    
    $cont = $_POST['txtCont'];
    $psw = $_POST['txtPsw'];


    $con->query("update register set name='$name',Email='$mail',password='$psw',contact='$cont' where RegNo = '$id' ") or die(mysqli_error($con));        
    header("Location: files.php");
}
        ?>
    </div>
        
    	
    </div>

