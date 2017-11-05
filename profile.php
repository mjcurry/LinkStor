<?php
include 'dbc.php';
page_protect();
include 'config.php';
include 'pm.php';
?>
 <?php $rs_settings = mysql_query("select * from users where id='$_SESSION[user_id]'"); 			while ($row_settings = mysql_fetch_array($rs_settings)) {
			$name = $row_settings['full_name'];
			$uname = $row_settings['user_name'];
			$uid = $row_settings['id'];
			$country = $row_settings['country'];
			$email = $row_settings['user_email'];
			
$err = array();
$msg = array();

if($_POST['doUpdate'] == 'Update')  
{


$rs_pwd = mysql_query("select pwd from users where id='$_SESSION[user_id]'");
list($old) = mysql_fetch_row($rs_pwd);
$old_salt = substr($old,0,9);

//check for old password in md5 format
	if($old === PwdHash($_POST['pwd_old'],$old_salt) && $_POST['pwd_new'] == $_POST['pwd_new2'])
	{
		$newsha1 = PwdHash($_POST['pwd_new']);
	mysql_query("update users set pwd='$newsha1' where id='$_SESSION[user_id]'");
	$msg[] = "Your new password is updated"; }
		
		if($_POST['pwd_new'] != $_POST['pwd_new2']){
			$err[] = "Your new passwords do not match";
		} 
		if($old != PwdHash($_POST['pwd_old'],$old_salt)) {
		$err[] = "Your old password is invalid";
		}
	

}

if($_POST['doSave'] == 'Save')  
{
// Filter POST data for harmful code (sanitize)
foreach($_POST as $key => $value) {
	$data[$key] = filter($value);
}


mysql_query("UPDATE users SET
			`full_name` = '$data[name]',
			`country` = '$data[country]'
			 WHERE id='$_SESSION[user_id]'
			") or die(mysql_error());

//header("Location: mysettings.php?msg=Profile Sucessfully saved");
$msg[] = "Profile Sucessfully saved";
 }
  
			}
$msgcount = new cpm($uid);
$msgcount->getmessages();
			?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>LinkStor : Your Links Anywhere</title>
<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="resources/scripts/facebox.js"></script>
<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
<script type="text/javascript" src="resources/scripts/jquery.datePicker.js"></script>
<script type="text/javascript" src="resources/scripts/jquery.date.js"></script>
</head>
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="#">Simpla Admin</a></h1>
		  
			<!-- Logo (221px wide) -->
			<a href="index.php"><img id="logo" src="resources/images/logo.png" alt="Simpla Admin logo" /></a>
		  
			<!-- Sidebar Profile links -->
			<div id="profile-links">
			  Hello <b><?php echo $uname;?></b>,  <a href="messages.php" title="Messages"><?php echo count($msgcount->messages); ?> Messages</a><br />
				<br />
				<a href="support.php" title="Support">Contact Support</a> | <a href="logout.php" title="Sign Out">Sign Out</a>
			</div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				
				<li></li>
				
				<li> 
		    <a href="#" class="nav-top-item "> <!-- Add the class "current" to current menu item -->
					Home
					</a>
					<ul>
						
						<li><a href="index.php">Overview</a></li> <!-- Add class "current" to sub menu items also -->
						<li><a href="news.php">News</a></li>
						<li><a href="about.php">About LinkStor</a></li>
					</ul>
		    </li>
				
				<li>
					<a href="#" class="nav-top-item">
						My Links
		      </a>
					<ul>
						<li><a href="mylinks.php">View My Links</a></li>
						<li><a href="addlink.php">Add a New Link</a></li>
                        
                        <li><a href="favorites.php">Favorite Links</a></li>
					</ul>
				</li>
				
				
				
  <li>
<a href="#" class="nav-top-item current">
						Your Account
</a>
					<ul>
						<li><a class="current" href="profile.php">Edit Account</a></li>
						<li><a href="messages.php">My Messages</a></li>
						<li><a href="support.php">Account Support</a></li>
					</ul>
			  </li>
				
				<li>
					<a href="#" class="nav-top-item">
						Settings
					</a>
					<ul>
						<li><a href="feedback.php">Give Feedback</a></li>
						<li><a href="tos.php">Users and Permissions</a></li>
                        <li><a href="plugins.php">Plugins & Extensions</a></li>
                        <li><a href="donate.php">Donate</a></li>
					</ul>
				</li>      
				
			</ul> <!-- End #main-nav -->
            <center><br /><br /><script type="text/javascript"><!--
google_ad_client = "ca-pub-1615933759487620";
/* LinkStor Sidebar */
google_ad_slot = "4904012606";
google_ad_width = 120;
google_ad_height = 240;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></center>
			
			
				
				
				
				
			</div> <!-- End #messages -->
			
		</div></div> <!-- End #sidebar -->
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error2 png_bg">
					<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
					</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
           
			<h2>Welcome <?php echo $name; ?></h2>
			<p id="page-intro">What would you like to do?</p>
			
			<ul class="shortcut-buttons-set">
            	
                <li><a class="shortcut-button" href="addlink.php"><span>
				<img src="resources/images/icons/add.png" alt="icon" /><br />
					Add Link</span></a></li>
				
				<li><a class="shortcut-button" href="mylinks.php"><span>
				<img src="resources/images/icons/link.png" alt="icon" /><br />
					My Links</span></a></li>
				
				
				
				
				
				<li><a class="shortcut-button" href="favorites.php"><span>
					<img src="resources/images/icons/favorite.png" alt="icon" /><br />
					Favorite Links</span></a></li>
				<li><a class="shortcut-button" href="profile.php"><span>
<img src="resources/images/icons/account.png" alt="icon" /><br />
					Manage Account
				</span></a></li>
				
				<li><a class="shortcut-button" href="messages.php" ><span>
				<img src="resources/images/icons/comment_48.png" alt="icon" /><br />
					Messages</span></a></li>
				
			</ul><!-- End .shortcut-buttons-set -->
			
			<div class="clear"></div> <!-- End .clear -->
			
		  <div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
				  <h3>Edit Your Account</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Settings</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Password</a></li>
					</ul>
					</ul>
					
				  <div class="clear"></div>
					
</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
                <div class="tab-content default-tab" id="tab1"> 
				  <p>
				    <!-- End #tab1 -->
				  </p>
				  <center>
                  <h3 class="titlehdr">My Account - Settings<hr /></h3>
                  <p>
                    <?php	
	if(!empty($err))  {
	   echo "<div class=\"notification error2 png_bg\"><a href=\"#\" class=\"close\"><img src=\"resources/images/icons/cross_grey_small.png\" title=\"Close this notification\" alt=\"close\" /></a><div>";
	  foreach ($err as $e) {
	    echo "* Error - $e <br>";
	    }
	  echo "</div></div>";	
	   }
	   if(!empty($msg))  {
	    echo "<div class=\"notification success png_bg\"><a href=\"#\" class=\"close\"><img src=\"resources/images/icons/cross_grey_small.png\" title=\"Close this notification\" alt=\"close\" /></a><div>" . $msg[0] . "</div></div>";

	   }
	  ?>
                  </p>
                  <p>Here you can make changes to your profile. Please note that you will 
                  not be able to change your email which has been already registered, if you need to change the account email please contact support.</p></center>
          <form action="profile.php" method="post" name="myform" id="myform">
				  <table align="center" width="90%" border="0" cellpadding="3" cellspacing="3" >
				    <tr>
                    
				      <td colspan="2"> <p><strong>Your Name / Company Name</strong><br />
				        <input class="text-input medium-input datepicker" name="name" type="text" id="name" value="<? echo $name; ?>" size="50" />
				        <br />
				        <small>Full name associated with your account.</small></p>
			          </td>
			        </tr>
			      </table>
				  <table width="90%" border="0" cellpadding="3" cellspacing="3" >
				    <tr class="forms">
				      <td width="22%"><strong>Country</strong></td>
				      <td width="78%"><input name="country" class="text-input medium-input" type="text" id="country" value="<? echo $country; ?>" /><small>   Your current country of residence.</small></td>
			        </tr>
                    
			      </table>
				  <table width="90%" border="0" cellpadding="3" cellspacing="3" >
				    <tr>
				      <td width="22%"><strong>User Name</strong></td>
				      <td width="78%"><input class="text-input medium-input datepicker" name="user_name" type="text" id="web2" value="<? echo $uname; ?>" disabled="disabled" /></td>
			        </tr>
			      </table>
				  <table width="90%" border="0" cellpadding="3" cellspacing="3" class="forms">
				    <tr>
				      <td width="22%"><strong>Email</strong></td>
				      <td width="78%"><input class="text-input medium-input datepicker" name="user_email" type="text" id="web3"  value="<? echo $email; ?>" disabled="disabled" /></td>
			        </tr>
                    
			      </table>
				  <center>
                    <p>
                      <input class="button" name="doSave" type="submit" id="doSave" value="Save" />
                    </p>
                    <p>&nbsp;</p>
                    </center></form></div>
                    <div class="tab-content" id="tab2"> 
                    <h3 class="titlehdr"><center>
                      <p>&nbsp;</p>
                      <p>Change Password</p>
                    </center><hr /></h3>
                    <p>If you want to change your password, please input your current and new password 
                      to make changes.</p></center>
                    <form id="pform" method="post" action="">
                      <table width="80%" border="0" cellpadding="3" cellspacing="3" class="forms">
                        <tr>
                          <td width="27%"><strong>Current Password</strong></td>
                          <td width="73%"><input class="text-input medium-input" name="pwd_old" type="password" id="pwd_old" /></td>
                        </tr>
                        <tr>
                          <td><strong>New Password</strong></td>
                          <td><input class="text-input medium-input datepicker" name="pwd_new" type="password" id="pwd_new"  /></td>
                        </tr>
                        <tr>
                          <td><strong>Confirm New Password</strong></td>
                          <td><input class="text-input medium-input datepicker" name="pwd_new2" type="password" id="pwd_new2"  /></td>
                        </tr>
                      </table>
                      <p align="center">
                        <input class="button" name="doUpdate" type="submit" id="doUpdate" value="Update" />
                      </p>
                    </form>
                    <p>&nbsp; </p></div>
                    
                  
      </div> 
			  <!-- End .content-box-content -->
				
			</div> 
			<!-- End .content-box --><!-- End .content-box --><!-- End .content-box -->
	    <div class="clear"></div>
			
			
			<!-- Start Notifications -->
			<!-- End Notifications -->
			
			<div id="footer">
				<p><small> 
				  &#169; Copyright 2013 LinkStor | Created by Michael Curry | <a href="#">Top</a>
			    </small>
			  </p>
				<br />
				<p><script type="text/javascript"><!--
google_ad_client = "ca-pub-1615933759487620";
/* LinkStor Footer */
google_ad_slot = "9460096071";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></p>
			</div><!-- End #footer -->
			
		</div> <!-- End #main-content -->

	</div></body>
</html>
