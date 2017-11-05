<?php 
include 'dbc.php';

$err = array();

foreach($_GET as $key => $value) {
	$get[$key] = filter($value); //get variables are filtered.
}

if ($_POST['doLogin']=='Sign In')
{

foreach($_POST as $key => $value) {
	$data[$key] = filter($value); // post variables are filtered
}


$user_email = $data['usr_email'];
$pass = $data['pwd'];


if (strpos($user_email,'@') === false) {
    $user_cond = "user_name='$user_email'";
} else {
      $user_cond = "user_email='$user_email'";
    
}

	
$result = mysql_query("SELECT `id`,`pwd`,`full_name`,`approved`,`user_level` FROM users WHERE 
           $user_cond
			AND `banned` = '0'
			") or die (mysql_error()); 
$num = mysql_num_rows($result);

  // Match row found with more than 1 results  - the user is authenticated. 
    if ( $num > 0 ) { 
	
	list($id,$pwd,$full_name,$approved,$user_level) = mysql_fetch_row($result);
	
	if(!$approved) {
	//$msg = urlencode("Account not activated. Please check your email for activation code");
	$err[] = "Account not activated. Please check your email for activation code";
	
	//header("Location: login.php?msg=$msg");
	 //exit();
	 }
	 
		//check against salt
	if ($pwd === PwdHash($pass,substr($pwd,0,9))) { 
	if(empty($err)){			

     // this sets session and logs user in
       session_start();
	   session_regenerate_id (true); //prevent against session fixation attacks.

	   // this sets variables in the session 
		$_SESSION['user_id']= $id;  
		$_SESSION['user_name'] = $full_name;
		$_SESSION['user_level'] = $user_level;
		$_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);
		
		//update the timestamp and key for cookie
		$stamp = time();
		$ckey = GenKey();
		mysql_query("update users set `ctime`='$stamp', `ckey` = '$ckey' where id='$id'") or die(mysql_error());
		
		//set a cookie 
		
	   if(isset($_POST['remember'])){
		   
				  setcookie("user_id", $_SESSION['user_id'], time()+60*60*24*COOKIE_TIME_OUT, "/");
				  setcookie("user_key", sha1($ckey), time()+60*60*24*COOKIE_TIME_OUT, "/");
				  setcookie("user_name",$_SESSION['user_name'], time()+60*60*24*COOKIE_TIME_OUT, "/");
				   } 
		  header("Location: index.php");
		 }
		}
		else
		{
		//$msg = urlencode("Invalid Login. Please try again with correct user email and password. ");
		$err[] = "Invalid Login. Please try again with correct username and password.";
		//header("Location: login.php?msg=$msg");
		}
	} else {
		$err[] = "Error - Invalid login. No such user exists";
	  }		
}
					 
					 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>LinkStor | Sign In</title>
<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="resources/scripts/facebox.js"></script>
<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
</head>
  
	<body id="login">
    
		
		<div id="login-wrapper" class="png_bg">
	  <div id="login-top">
			
				<h1>LinkStor</h1>
                
				<!-- Logo (221px width) -->
				<img id="logo" src="resources/images/logo.png" alt="LinKStor logo" />
                
			</div> <!-- End #logn-top -->
			
			
			<div id="login-content">
				
			  <form action="login.php" method="post" name="logform" id="logform">
				
<div class="notification information png_bg">
						<div>
							Don&rsquo;t have an account? Get one <a href="register.php">here.</a></div>
				</div>
                    
	  
					
<p>
						<label>Username</label>
						<input class="text-input" name="usr_email" type="text" />
				</p>
					<div class="clear"></div>
					<p>
						<label>Password</label>
						<input class="text-input" name="pwd" type="password" />
					</p>
                    
			<div class="clear"></div>
					<p id="remember-password">
                    
						<input name="remember" id="remember" type="checkbox" />Remember me
					</p>
					<div class="clear">
					  <p><i><a href="forgot.php">Forgot Password</a></i></p>
                      
            <div class="clear"><?php
	  /******************** ERROR MESSAGES*************************************************
	  This code is to show error messages 
	  **************************************************************************/
	  if(!empty($err))  {
	   echo "<p>&nbsp;</p> <div class=\"notification error2 png_bg\"> <div> ";
	  foreach ($err as $e) {
	    echo "$e <br>";
	    }
	  echo "</div>";	
	   }
	  /******************************* END ********************************/	  
	  ?></div>
					<p>
						<input name="doLogin" class="button" type="submit" value="Sign In" />
					</p>
					
			  </form>
			</div> <!-- End #login-content -->
			
		</div> 
		<p><!-- End #login-wrapper -->  </p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
		<p>&nbsp;</p>
        <p><center><a href="linkstor.php"><b>What is LinkStor?</b></a>
        </center></p>
		<p><center></center></p>
  </body>
</html>
