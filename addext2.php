<?php
include 'dbc.php';
page_protect();



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Extension API Page</title>
</head>

<body>
<form action="addlink.php" method="post" name="newlink" id="newlink">
				  <table align="center" width="90%" border="0" cellpadding="3" cellspacing="3" >
                  <tr>
                    <td><strong>URL <font color="#CC0000">*</font></strong></td><td><input class="text-input medium-input datepicker" name="URL" id="URL" /> <small>Put the link here.</small></td>
                  </tr>
                  <tr>
                    <td><strong>Title <font color="#CC0000">*</font></strong></td>
                  <td><input class="text-input medium-input datepicker" name="title" id="title" />  
                  <small>Give the link a title.</small></td>
                  </tr>
                  <tr>
                  <td><strong>Description</strong></td>
                  <td><p>
                    <textarea name="desc" id="desc" rows="3"></textarea>
                  </p>
                    <p><small>Give the link a descripton</small>.</p></td>
                  </tr>
                  <tr>
                  <td><strong>Favorite</strong></td>
                  <td><input type="checkbox" name="fav" id="fav" /> <small>Check this to add to your favorites.</small></td>
                  </tr>
                  
                  </table>
                  <p>&nbsp;                    </p>
                  <p>
                    <center><input type="submit" class="button" value="Add Link" name="add" id="add" /></center>
                  </p>
                  </form>
                  </p>
</body>
</html>