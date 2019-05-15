<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "dba";

$con = mysqli_connect($host,$username,$password,$dbname);
if(!$con)
{
	echo "not connected";
	}
	

session_start();
if(isset($_POST['submit']))
{
	$user = $_POST['username'];
	$pass = $_POST['password'];
	
	
$sql = "select * from t1 where `username` = '$user' and `password` = '$pass' ";
$result = mysqli_query($con,$sql);
while($result  = mysqli_fetch_array($result))
	{
		if($user=="admin"&&$pass=="admin")	
		{

			$_SESSION["User"]= $userID;
			header("Location: DashBoard.php");
			
			
		
		}
		else
		{
			$_SESSION["User"]= $userID;
			header("Location: welcome.php");
		}
	}

?>

<body>
<form action="" method="post">

<input name="username" type="text" />
<input name="password" type="text" />
<input name="submit" type="submit" />

</form>
</body>
</html>