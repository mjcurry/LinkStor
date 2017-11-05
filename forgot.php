<?php 
include 'dbc.php';




/******************* ACTIVATION BY FORM**************************/
if ($_POST['doReset']=='Reset')
{
$err = array();
$msg = array();

require_once('recaptchalib.php');
     
      $resp = recaptcha_check_answer ($privatekey,
                                      $_SERVER["REMOTE_ADDR"],
                                      $_POST["recaptcha_challenge_field"],
                                      $_POST["recaptcha_response_field"]);

      if (!$resp->is_valid) {
        die ("<h3>Image Verification failed! Go back and try again.</h3>" .
             "(reCAPTCHA said: " . $resp->error . ")");			
      }

foreach($_POST as $key => $value) {
	$data[$key] = filter($value);
}
if(!isEmail($data['user_email'])) {
$err[] = "ERROR - Please enter a valid email"; 
}

$user_email = $data['user_email'];

//check if activ code and user is valid as precaution
$rs_check = mysql_query("select id from users where user_email='$user_email'") or die (mysql_error()); 
$num = mysql_num_rows($rs_check);
  // Match row found with more than 1 results  - the user is authenticated. 
    if ( $num <= 0 ) { 
	$err[] = "Error - Sorry no such account exists or registered.";
	//header("Location: forgot.php?msg=$msg");
	//exit();
	}


if(empty($err)) {

$new_pwd = GenPwd();
$pwd_reset = PwdHash($new_pwd);
//$sha1_new = sha1($new);	
//set update sha1 of new password + salt
$rs_activ = mysql_query("update users set pwd='$pwd_reset' WHERE 
						 user_email='$user_email'") or die(mysql_error());
						 
$host  = $_SERVER['HTTP_HOST'];
$host_upper = strtoupper($host);						 
						 
//send email

$message = 
"Here are your new password details ...\n
User Email: $user_email \n
Passwd: $new_pwd \n

Thank You

Administrator
$host_upper
______________________________________________________
THIS IS AN AUTOMATED RESPONSE. 
***DO NOT RESPOND TO THIS EMAIL****
";

	mail($user_email, "Reset Password", $message,
    "From: \"Member Registration\" <auto-reply@$host>\r\n" .
     "X-Mailer: PHP/" . phpversion());						 
						 
$msg[] = "Your account password has been reset and a new password has been sent to your email address.";						 
						 
//$msg = urlencode();
//header("Location: forgot.php?msg=$msg");						 
//exit();
 }
}
?>
<html>
<head>
<title>Forgot Password</title>

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
<h3 class="titlehdr">Forgot Password</h3>


      
      <h1>Reset Password</h1>
      <p>If you have forgot your account's password, you can reset it 
        and a new password will be sent to your email address.</p>
	 
      <form action="forgot.php" method="post" name="actForm" id="actForm" >
        <table width="65%" border="0" cellpadding="10" cellspacing="10" class="loginform">
          <tr> 
            <td colspan="2">&nbsp;</td>
          </tr>
          <tr> 
            <td width="10%"><label>Your Email:</label></td>
            <td width="64%"><input name="user_email" class="text-input medium-input" type="text" id="txtboxn" size="25"></td>
          </tr>
          <tr><td><label><br>
            Image Verification:</label></td><td><?php 
			require_once('recaptchalib.php');
			
				echo recaptcha_get_html($publickey);
			?></td><tr>
          <tr> 
          
            <td colspan="2"> <div align="center"> 
                <p> 
                  <input name="doReset" class="button" type="submit" id="doLogin3" value="Reset">
                </p>
              </div></td>
          </tr>
        </table>
        <div align="center"></div>
        <p align="center"><p> 
        <?php
	  /******************** ERROR MESSAGES*************************************************
	  This code is to show error messages 
	  **************************************************************************/
	if(!empty($err))  {
	   echo "<p>&nbsp;</p> <div class=\"notification error2 png_bg\"> <div> ";
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
      </p></p>
      </form>
	  
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
