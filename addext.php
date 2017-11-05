<?php
include 'dbc.php';
page_protect();
foreach($_POST as $key => $value) {
	$data[$key] = filter($value);
}
$url = $data['url'];
$title = $data['title'];
$desc = $data['desc'];
if ($data['fav'] == "favorite"){
	$favorite = "1";
} else { $favorite = "0"; }
$sql_insert = "INSERT into `links`
  			(`url`,`title`,`desc`,`fav`,`user`,`date`
			)
		    VALUES
		    ('$url','$title','$desc','$favorite','$_SESSION[user_id]',now()
			)
			";
mysql_query($sql_insert);

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Extension API Page</title>
</head>

<body>
</body>
</html>