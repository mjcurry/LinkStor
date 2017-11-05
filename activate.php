<?php 
include 'dbc.php';

foreach($_GET as $key => $value) {
	$get[$key] = filter($value);
}

/******** EMAIL ACTIVATION LINK**********************/
if(isset($get['user']) && !empty($get['activ_code']) && !empty($get['user']) && is_numeric($get['activ_code']) ) {

$err = array();
$msg = array();

$user = mysql_real_escape_string($get['user']);
$activ = mysql_real_escape_string($get['activ_code']);

//check if activ code and user is valid
$rs_check = mysql_query("select id from users where md5_id='$user' and activation_code='$activ'") or die (mysql_error()); 
$num = mysql_num_rows($rs_check);
  // Match row found with more than 1 results  - the user is authenticated. 
    if ( $num <= 0 ) { 
	$err[] = "Sorry no such account exists or activation code invalid.";
	//header("Location: activate.php?msg=$msg");
	//exit();
	}

if(empty($err)) {
// set the approved field to 1 to activate the account
$rs_activ = mysql_query("update users set approved='1' WHERE 
						 md5_id='$user' AND activation_code = '$activ' ") or die(mysql_error());
$msg[] = "Thank you. Your account has been activated.";
//header("Location: activate.php?done=1&msg=$msg");						 
//exit();
 }
}

/******************* ACTIVATION BY FORM**************************/
if ($_POST['doActivate']=='Activate')
{
$err = array();
$msg = array();

$user_email = mysql_real_escape_string($_POST['user_email']);
$activ = mysql_real_escape_string($_POST['activ_code']);
//check if activ code and user is valid as precaution
$rs_check = mysql_query("select id from users where user_email='$user_email' and activation_code='$activ'") or die (mysql_error()); 
$num = mysql_num_rows($rs_check);
  // Match row found with more than 1 results  - the user is authenticated. 
    if ( $num <= 0 ) { 
	$err[] = "Sorry no such account exists or activation code invalid.";
	//header("Location: activate.php?msg=$msg");
	//exit();
	}
//set approved field to 1 to activate the user
if(empty($err)) {
	$rs_activ = mysql_query("update users set approved='1' WHERE 
						 user_email='$user_email' AND activation_code = '$activ' ") or die(mysql_error());
	$msg[] = "Thank you. Your account has been activated.";
 }
//header("Location: activate.php?msg=$msg");						 
//exit();
}

	

?>
<html>
<head>
<title>User Account Activation</title>
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
				<img id="logo" src="resources/images/logo.png" alt="Simpla Admin logo" />
                
			</div> <!-- End #logn-top --></td>
  </tr>
  <tr> 
    <td width="160" valign="top"><p>&nbsp;</p>
      <p>&nbsp; </p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="732" valign="top">
Account Activation:

     <div class="content-box-content"> <p> 
        <?php
	  /******************** ERROR MESSAGES*************************************************
	  This code is to show error messages 
	  **************************************************************************/
	if(!empty($err))  {
	   echo "<p>&nbsp;</p> <div class=\"notification error2 png_bg\"> <div>";
	  foreach ($err as $e) {
	    echo "* $e <br>";
	    }
	  echo "</div>";	
	   }
	   if(!empty($msg))  {
	    echo "<p>&nbsp;</p> <div class=\"notification success png_bg\"> <div> ";
	  foreach ($msg as $m) {
	    echo "* $m <br>";
	    }
	  echo "</div>";	


	   }	
	  /******************************* END ********************************/	  
	  ?>
      </p>
      <p>You can <a href="login.php">login here</a>.</p></div>
	 
      <form action="activate.php" method="post" name="actForm" id="actForm" >
      </form></td>
    <td width="196" valign="top">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
</table>

</body>
</html>
