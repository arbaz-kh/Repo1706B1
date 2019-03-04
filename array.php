<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php

$names = array('ali','bilal','wasiq','zain');


?>
<body>
<table border="1px">
<tr>
<th>Names</th>

</tr>
<?php

foreach($names as $items)
{
	echo'<tr><td>'.$items.'</td></tr>';
}

?>

</table>
</body>
</html>


