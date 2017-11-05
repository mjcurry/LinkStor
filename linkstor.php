<?php 
include 'dbc.php';


?>
<html>
<head>
<title>About LinkStor</title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script language="JavaScript" type="text/javascript" src="js/jquery.validate.js"></script>
<script>
  $(document).ready(function(){
    $("#actForm").validate();
  });
  </script>
<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
</head>

<body id="login">

<table width="100%" border="0" cellspacing="0" cellpadding="5" class="main">
  <tr> 
    <td colspan="3"><div id="login-wrapper" class="png_bg">
	  <div id="login-top">
			
				<h1>LinkStor</h1>
                
				<!-- Logo (221px width) -->
				<a href="login.php"><img id="logo" src="resources/images/logo.png" alt="Home" /></a>
                
			</div> <!-- End #logn-top --></td>
  </tr>
  <tr> 
    <td width="160" valign="top"><p>&nbsp;</p>
      <p>&nbsp; </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="732" valign="top">
<h3 class="titlehdr">About LinkStor</h3>


      
      
        <p>There are billions of pages on the internet, with many more added every day. A problem most people face is saving and organizing the pages you care about the most. Bookmarks or favorites in your web browser can easily pile up and become a disorganized mess. And when you have many bookmarks trying to search for the one you want can be a pain. Also when you leave that computer those bookmarks can't be accessed anywhere else.<br /><br />LinkStor is the solution to all these problems. You can easily save all your important links into your own account, which you can access from any computer. An easy to use interface allows you to quickly search for the page you need. LinkStor was designed to enable users to save & retrieve pages as fast as possible. Bookmarks on the cloud means you never need to worry about forgetting URLs to the sites you need. And the best part... it's totally FREE!</p>
        <br />
        <p>The LinkStor project was started in July 2010 by Michael Curry, who still remains the sole developer of this project. The first public release of LinkStor was in December of 2011. Currently LinkStor is available to everyone worldwide, so come try it for yourself and see if you like it. To get started, make a new account below:</p>
        <p><center>
          <p><input type="button" class="button" value="Create a new account" onClick="window.location='http://linkstor.net/register.php' "></p>
          <p>&nbsp;</p>
        </center></p>
    <p><center><a href="login.php">Back to Login</a></center></p>
	   
      <p align="left">&nbsp; </p></td>
    <td width="196" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
</table>

</body>
</html>
