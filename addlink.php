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
					<a href="#" class="nav-top-item current">
						My Links
		      </a>
					<ul>
						<li><a href="mylinks.php">View My Links</a></li>
						<li><a class="current" href="addlink.php">Add a New Link</a></li>
                        
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
					
				  <h3>Add a New Link</h3>
					
					<ul class="content-box-tabs"><!-- href must be unique and match the id of target div -->
						<li></li>
					</ul>
					
					<div class="clear"></div>
					
</div> <!-- End .content-box-header -->
				
				<div class="content-box-content"><!-- End #tab1 --><!-- End #tab2 -->
				  <p>
                  <?php 
				  $err = array();
				  $msg = array();
				  $act = filter($_POST['add']);
				  if($act == 'Add Link') 
				  {
				foreach($_POST as $key => $value) {
	$data[$key] = filter($value);
}

	if(empty($data['URL']) || empty($data['title'])){
		$err[] = "Error - Please Fill in All Required Fields";
	}
	if (isURL($data['URL']) == false){
		$err[] = "Please enter a full valid URL (including http://)";
	}
	if(isset($_POST['fav'])){
	$favorite = "1";	
	} else {
	$favorite = "0";	
	}
	$url = $data['URL'];
	$title = $data['title'];
	$desc = $data['desc'];
	if(!empty($err)){
		echo "<div class=\"notification error2 png_bg\"><div>";
		 foreach ($err as $e) {
	    echo "$e <br>";
	    }
		echo "</div></div>";
	}
	if(empty($err)){
		
	$sql_insert = "INSERT into `links`
  			(`url`,`title`,`desc`,`fav`,`user`,`date`
			)
		    VALUES
		    ('$url','$title','$desc','$favorite','$_SESSION[user_id]',now()
			)
			";
			mysql_query($sql_insert,$link) or die("Insertion Failed:" . mysql_error());	
			echo "<div class=\"notification success png_bg\"><div>Link has been successfully added into your account</div></div>";
	
	}
				  }
				  
				  ?>                 
				  <p>Use this form to add a new link into your account. Note that fields marked <font color="#CC0000">*</font> are required.
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
