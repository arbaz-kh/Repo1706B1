<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<?php
function GetValues()
{

	if(isset($_POST['btnSubmit']))
    {    
		$name = $_POST['txtName'];
		$pass = $_POST['txtPsw'];
        
        return ("Welcome ".$name.$pass);
    }

}
?>

<body>

<form method="post">

	<label>Name</label>
	<input name="txtName" type="text" />
    <br />
    <label>Password</label>
	<input name="txtPsw" type="password" />
    <br />
	<input type="submit" name="btnSubmit"/>
    <br />
    <label><?php echo GetValues()?></label>
    
</form>

</body>

</html>
