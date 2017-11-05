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
						<li><a href="feedback.php">Give Feedback</a></li>
						<li><a href="tos.php" class="current">Users and Permissions</a></li>
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
					
				  <h3>User Terms of Service &amp; Use Policies</h3>
					
					<ul class="content-box-tabs"><!-- href must be unique and match the id of target div -->
						<li></li>
					</ul>
					
					<div class="clear"></div>
					
</div> <!-- End .content-box-header -->
				
				<div class="content-box-content"><!-- End #tab1 --><!-- End #tab2 -->
				  <p>Your use of LinkStor requires you must follow <strong>all</strong> of the following policies:</p>
                  <p><strong>Website Security:</strong></p>
                  <ul>
                    <li>Do not attempt to hack LinkStor by any means including, but not limited to, SQL injection, XSS (Cross-Site-Scripting) attacks, manipulation of GET or POST data and account hijacking</li>
                    <li>The connection to LinkStor.net does not currently use SSL, do not attempt to intercept or &quot;sniff&quot; user credidentials or any other data over a network</li>
                    <li>Do not spam messages, accounts or links into the site in order to fill up storage space. All accounts believed to be intentionally taking up excessive site resources will be deleted</li>
                    <li>Do not attempt to flood the site from any form of connection. This would include Denial-of-Service attacks and excessive connections to the MySQL database.</li>
                  </ul>
                  <p><strong>Messaging System:</strong></p>
                  <ul>
                    <li>Do not send unwanted mail to other users. This would include spam or marketing/advertizing messages. Abuse of the messaging system will result in a website ban.</li>
                    <li>Do not include any HTML objects into messages that are not provided by the standard text editor.</li>
                  </ul>
                  <p><strong>Your data on LinkStor:</strong></p>
                  <ul>
                    <li>All account passwords are encrypted and stored in a secure database, LinkStor will never give away <strong>any</strong> infomation about your account unless required by law</li>
                    <li>Links saved on LinkStor are not monitored but can be checked at any given time to ensure that no malicious attempts at exploiting the site are made. </li>
                    <li>Links saved on LinkStor should not be of anything that violates your local law. If a third party requests links to be removed from the site then LinkStor is obligated to do so.</li>
                  </ul>
                  <strong></strong></p>
</div> 
			  <!-- End .content-box-content -->
				
			</div> 
			<!-- End .content-box -->
			
<div class="content-box column-left">
				
				<div class="content-box-header">
					
					<h3>LinkStor Plugin</h3>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab">
					
						<h4>New version available for Chrome</h4>
						<p>
						The new plugin for Google Chrome users is now completed and can be found <a href="extension.crx">here.</a> With just the click of a button you can instantly send your current page into your LinkStor account so you can get it anywhere,</p>
						
					</div> <!-- End #tab3 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			<div class="content-box column-right">
				
				<div class="content-box-header"> <!-- Add the class "closed" to the Content box header to have it closed by default -->
					
					<h3>Site Updates</h3>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
					<div class="tab-content default-tab">
					
						<h4>Now Connect with Social Networks!</h4>
						<p>
						We are launching brand new features that will allow you to publish you links directly to Social Networking sites such as Facebook, Twitter, and more. Our goal is to quickly enable you to share your favorite LinkStor links instantly with friends.</p>
						
					</div> <!-- End #tab3 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			<div class="clear"></div>
			
			
			<!-- Start Notifications -->
			<!-- End Notifications -->
			
			<div id="footer">
				<p><small> <!-- Remove this notice or replace it with whatever you want -->
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
