<?php
include 'dbc.php';
page_protect();
// Load the config file!
    include('config.php');
    // Load the class
    require('pm.php');
?>
<?php $rs_settings = mysql_query("select * from users where id='$_SESSION[user_id]'"); 			while ($row_settings = mysql_fetch_array($rs_settings)) {
			$name = $row_settings['full_name'];
			$uname = $row_settings['user_name'];
			$uid = $row_settings['id'];
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
					<a href="#" class="nav-top-item"> <!-- Add the class "current" to current menu item -->
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
					<a href="#" class="nav-top-item">
						Your Account
</a>
					<ul>
						<li><a href="profile.php">Edit Account</a></li>
						<li><a href="messages.php">My Messages</a></li>
						<li><a href="support.php">Account Support</a></li>
					</ul>
				</li>
				
				<li>
					<a href="#" class="nav-top-item current">
						Settings
					</a>
					<ul>
						<li><a href="feedback.php" class="current">Give Feedback</a></li>
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
			
			<div id="messages" style="display: none"> <!-- Messages are shown when a link with these attributes are clicked: href="#messages" rel="modal"  -->
				
				<h3>3 Messages</h3>
			 
				<p>
					<strong>17th May 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>2nd May 2009</strong> by Jane Doe<br />
					Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
			 
				<p>
					<strong>25th April 2009</strong> by Admin<br />
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue.
					<small><a href="#" class="remove-link" title="Remove message">Remove</a></small>
				</p>
				
				<form action="#" method="post">
					
					<h4>New Message</h4>
					
					<fieldset>
						<textarea class="textarea" name="textfield" cols="79" rows="5"></textarea>
					</fieldset>
					
					<fieldset>
					
						<select name="dropdown" class="small-input">
							<option value="option1">Send to...</option>
							<option value="option2">Everyone</option>
							<option value="option3">Admin</option>
							<option value="option4">Jane Doe</option>
						</select>
						
						<input class="button" type="submit" value="Send" />
						
					</fieldset>
					
				</form>
				
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
					
				  <h3>Give Feedback</h3>
				  <p>&nbsp;</p>
				  <p>&nbsp;</p>
				  <ul class="content-box-tabs">
				  <!-- href must be unique and match the id of target div -->
				    <li></li>
				  </ul>
					
<div class="context-box-content">
					  <p>
                      <?php

    /*************************************************************************
    *
    * Simple Private Messaging Tutorial for Pixel2Life Community
    * 
    * Features:
    * 
    * - Messaging using Usernames 
    * - No HTML allowed (bbcode can simply be included) 
    * - You can see if somebody has deleted or read the pm 
    * - On reply, the old mail will be quoted
    *
    * by Christian Weber
    * 
    * 
    *************************************************************************/
    
    
    // Set the userid to 2 for testing purposes... you should have your own usersystem, so this should contain the userid
    $userid=$uid;
	$sndto = "admin";
    // initiate a new pm class
    $pm = new cpm($userid);
    
    // check if a new message had been send
    if(isset($_POST['newmessage'])) {
		require_once('recaptchalib.php');
     
      $resp = recaptcha_check_answer ($privatekey,
                                      $_SERVER["REMOTE_ADDR"],
                                      $_POST["recaptcha_challenge_field"],
                                      $_POST["recaptcha_response_field"]);

      if (!$resp->is_valid) {
        die ("<h3>Image Verification failed! Please go back and try again.</h3>&nbsp;" .
             "(&nbsp;reCAPTCHA said: " . $resp->error . ")");			
      }
        // check if there is an error while sending the message (beware, the input hasn't been checked, you should never trust users input!)
        if($pm->sendmessage($sndto,$_POST['subject'],$_POST['message'])) {
            // Tell the user it was successful
            echo "<div class=\"notification success png_bg\"><div>Message successfully sent, your feedback is greatly appreciated.</div></div>";
        } else {
            // Tell user something went wrong it the return was false
            echo "Error, couldn't send PM. Maybe wrong user.";
        }
    } ?>

    </p>
    <p>&nbsp;
    
    <center>
      If you would like to give feedback about LinkStor you can use the below form to send it to the site owner. <strong>Please note</strong> that abuse of this form or spamming support will result in instant account termination.</center>
    <p>&nbsp;</p> 
    </p>
    <form name="new" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <p><strong>
      </strong>      
      <strong>
      <h4>Subject: </h4>
      </strong>
  <input class="text-input small-input" type='text' name='subject' value='Feedback' readonly />
  </p>
  <p><strong><h4>Message:</h4></strong></p>
  <p>&nbsp;</p>
  <p>
    <textarea name='message' class="text-input textarea wysiwyg" rows="10"><?php if(isset($_POST['reply'])) { echo $_POST['rmessage']; } ?>
</textarea>
  </p>
  <p><strong>
  <h4>Image Verification:</h4>
  <small>To Prevent Spam</small>
  <p><?php 
			require_once('recaptchalib.php');
			
				echo recaptcha_get_html($publickey);
			?></p>
  </strong>
  </p>
  <p>
  
    <input type='submit' class='button' name='newmessage' value='Send' />
</p>
</form>

                      
                      
                      
                      </p>
					</div>
			</div>

			  <!-- End .content-box-content -->
				
		  </div> 
			<!-- End .content-box --><!-- End .content-box --><!-- End .content-box -->
	   
			
			
			<!-- Start Notifications -->
			<!-- End Notifications -->
			
			<div id="footer"><p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
			  <p>&nbsp;</p>
</div>
			<!-- End #footer -->
			
		</div> <!-- End #main-content -->
	</div></body>
</html>
