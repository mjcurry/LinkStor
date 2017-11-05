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
if (isset($_GET['pl'])){
	$spl = filter($_GET['pl']);
$page_limit = $spl;	
} else {
$page_limit = 10;
}



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
						<li><a href="mylinks.php" class="current">View My Links</a></li>
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
					
				  <h3>Your Links</h3>
					
					<ul class="content-box-tabs"><!-- href must be unique and match the id of target div -->
						<li></li>
					</ul>
					
					<div class="clear"></div>
					
</div> <!-- End .content-box-header -->
				
				<div class="content-box-content"><!-- End #tab1 --><!-- End #tab2 -->
                <? 
				if (isset($_GET['del'])){
	$sdel = filter($_GET['del']);
	$check = mysql_query("SELECT `user` from links WHERE `id`='$sdel'");
	$chk = mysql_fetch_array($check);
	if ($chk['user'] == $_SESSION['user_id']){
	
	$delok = "2";
	
	} 
	if ($chk['user'] != $_SESSION['user_id']) { 
	$delok = "1";
	
	}
}
				
				 
				if ($delok == "1") {
				echo "<div class=\"notification attention png_bg\"><a href=\"#\" class=\"close\"><img src=\"resources/images/icons/cross_grey_small.png\" title=\"Close this notification\" alt=\"close\" /></a><div>Error - Link can not be removed.</div></div>";	
				}
				if ($delok == "2"){
					mysql_query("DELETE FROM links WHERE `id`='$sdel'") or die(mysql_error());
					 echo "<div class=\"notification information png_bg\">
				<a href=\"#\" class=\"close\"><img src=\"resources/images/icons/cross_grey_small.png\" title=\"Close this notification\" alt=\"close\" /></a><div>Link Removed Successfully!</div></div>"; }
				
				if (isset($_GET['fav'])){
	
	$sfav = filter($_GET['fav']);
	$check2 = mysql_query("SELECT `user` from links WHERE `id`='$sfav'");
	$chk2 = mysql_fetch_array($check2);
	if ($chk2['user'] == $_SESSION['user_id']){
		mysql_query("UPDATE links SET `fav`='1' WHERE `id`='$sfav'") or die(mysql_error());
		echo "<div class=\"notification success png_bg\">
				<a href=\"#\" class=\"close\"><img src=\"resources/images/icons/cross_grey_small.png\" title=\"Close this notification\" alt=\"close\" /></a><div>Link has been added to your favorites.</div></div>"; 
	} else {
		echo "<div class=\"notification attention png_bg\">
				<a href=\"#\" class=\"close\"><img src=\"resources/images/icons/cross_grey_small.png\" title=\"Close this notification\" alt=\"close\" /></a><div>Link can not be added to your favorites.</div></div>"; 
		
		 }
}
if (isset($_GET['nfav'])){
	
	$unfav = filter($_GET['nfav']);
	$check3 = mysql_query("SELECT `user` from links WHERE `id`='$unfav'");
	$chk3 = mysql_fetch_array($check3);
	if ($chk3['user'] == $_SESSION['user_id']){
		mysql_query("UPDATE links SET `fav`='0' WHERE `id`='$unfav'") or die(mysql_error());
		echo "<div class=\"notification success png_bg\">
				<a href=\"#\" class=\"close\"><img src=\"resources/images/icons/cross_grey_small.png\" title=\"Close this notification\" alt=\"close\" /></a><div>Link has been removed from your favorites.</div></div>"; 
	} else {
		echo "<div class=\"notification attention png_bg\">
				<a href=\"#\" class=\"close\"><img src=\"resources/images/icons/cross_grey_small.png\" title=\"Close this notification\" alt=\"close\" /></a><div>Link can not be removed from your favorites.</div></div>"; 
		
		 }
}
if (!empty($_POST['u'])){
if ($_POST['dropdown'] == "favorite"){
	foreach ($_POST['u'] as $uid) {
		$id = filter($uid);
		$check4 = mysql_query("SELECT `user` from links WHERE `id`='$id'");
	$chk4 = mysql_fetch_array($check4);
	if ($chk4['user'] == $_SESSION['user_id']){
		mysql_query("UPDATE links SET `fav`='1' WHERE `id`='$id'") or die(mysql_error());
		$bmsg = "Selected links have added to your favorites.";
	} else { $emsg = "Error - Could not add all or some of the selected links to your favorites."; }
	}
}
if ($_POST['dropdown'] == "unfavorite") {
	foreach ($_POST['u'] as $uid2) {
		$id2 = filter($uid2);
		$check5 = mysql_query("SELECT `user` from links WHERE `id`='$id2'");
	$chk5 = mysql_fetch_array($check5);
	if ($chk5['user'] == $_SESSION['user_id']){
		mysql_query("UPDATE links SET `fav`='0' WHERE `id`='$id2'") or die(mysql_error());
		$bmsg = "Selected links have been removed from your favorites.";
	} else { $emsg = "Error - Could not remove all or some of the selected links from your favorites."; }
}}
if ($_POST['dropdown'] == "Delete") {
	foreach ($_POST['u'] as $uid3) {
		$id3 = filter($uid3);
		$check6 = mysql_query("SELECT `user` from links WHERE `id`='$id3'");
	$chk6 = mysql_fetch_array($check6);
	if ($chk6['user'] == $_SESSION['user_id']){
		mysql_query("DELETE FROM links WHERE `id`='$id3'") or die(mysql_error());
		$bmsg = "Selected links have been deleted from your account.";
	} else { $emsg = "Error - Could not delete all or some of the selected links from your account."; }
	}
}




if (isset($bmsg)){
echo "<div class=\"notification success png_bg\">
				<a href=\"#\" class=\"close\"><img src=\"resources/images/icons/cross_grey_small.png\" title=\"Close this notification\" alt=\"close\" /></a><div>".$bmsg."</div></div>";	
}
if (isset($emsg)){
echo "<div class=\"notification attention png_bg\">
				<a href=\"#\" class=\"close\"><img src=\"resources/images/icons/cross_grey_small.png\" title=\"Close this notification\" alt=\"close\" /></a><div>".$emsg."</div></div>";	
}
}
				
				
				?>
                
                <form action="mylinks.php" method="post">
				  <table width="100%" border="0" cellpadding="2" cellspacing="0">
				    <tr style="background-color:#459300; opacity:0.85;">
				      <td><input class="check-all" type="checkbox" /></td>
				      <td><strong>Title</strong></td>
				      <td><div align="center"><strong>Link</strong></div></td>
				      <td><strong>Description</strong></td>
				      <td><strong>Date</strong></td>
				      <td><strong>Favorite</strong></td>
				      <td><strong>Actions</strong></td>
			        </tr>
				    <tr>
				      <td></td>
				      <td>&nbsp;</td>
				      <td><div align="center"></div></td>
				      <td>&nbsp;</td>
				      <td>&nbsp;</td>
				      <td>&nbsp;</td>
				      <td>&nbsp;</td>
			        </tr>
				    <?php
					
					$sql = "SELECT * FROM links WHERE `user` = $_SESSION[user_id] ORDER BY date DESC";
					$rs_total = mysql_query($sql) or die(mysql_error());
	  $total = mysql_num_rows($rs_total);
	  
	  if (!isset($_GET['page']) )
		{ $start=0; } else
		{ $start = ($_GET['page'] - 1) * $page_limit; }
	  
	  $rs_results = mysql_query($sql . " limit $start,$page_limit") or die(mysql_error());
	  $total_pages = ceil($total/$page_limit);
	  
	  
					
					
					if(!empty($_GET['s'])){
						$ss = filter($_GET['s']);
					$results = mysql_query("SELECT * FROM `links` WHERE (`title` LIKE'%$ss%' OR `desc` LIKE'%$ss%') AND `user`='$_SESSION[user_id]'");
					if(!empty($results)){
						$rs_results = $results;
					}
					}
					 while ($rrows = mysql_fetch_array($rs_results)) {?>
				    <tr>
				      <td><input name="u[]" type="checkbox" value="<?php echo $rrows['id']; ?>" id="u[]" /></td>
				      <td><?php echo $rrows['title']; ?></td>
				      <td><div align="center"><a target="_blank" href="<? echo $rrows['url']; ?>"><?php if(strlen($rrows['url']) > 30 ){ 
					  $short = substr($rrows['url'],0,30)."..."; 
					  echo $short;
					  } else { echo $rrows['url']; }
					  
					   ?></a></div></td>
				      <td><?php echo $rrows['desc']; ?></td>
				      <td>
				          <?php echo $rrows['date']; ?>
				        </td>
				      <td><span id="ban<?php echo $rrows['id']; ?>">
				        <?php if($rrows['fav'] == "0") { echo "No"; } else { echo "Yes"; } ?>
				        </span></td>
				      <td><? if($rrows['fav'] == "0") {?><a href="mylinks.php?fav=<? echo $rrows['id']; ?>"><img title="Favorite" src="resources/images/icons/nfav.png"></a><? } else { ?><a href="mylinks.php?nfav=<? echo $rrows['id'] ?>"><img src="resources/images/icons/fav.png" title="Unfavorite" /></a><? } ?>  <a href="mylinks.php?del=<? echo $rrows['id']; ?>"><img src="resources/images/icons/cross.png" title="Delete"></a> </td>
			        </tr>
				    <tr>
				      
			        </tr>
				    <?php } ?>
			      </table>
                  <?
				  if ($total == "0"){
					echo "<br /><strong><center>You have no links saved in your account, click Add Link above to save one</center></strong><br />";
				  }
				  
				   ?>
                  <div class="bulk-actions align-left">
                 <br />
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="favorite">Favorite</option>
                                                <option value="unfavorite">Unfavorite</option>
												<option value="Delete">Delete</option>
											</select>
											<input name="bulkdo" type="submit" id="bulkdo" value="Apply to Selected" class="button"></form>
										</div>
				  <div class="pagination">
											<a href="mylinks.php?page=1" title="First Page">&laquo; First</a><a href="mylinks.php?page=<? if($_GET['page'] > 1) { echo $_GET['page'] - 1; } else { echo "1"; } ?>" title="Previous Page">&laquo; Previous</a>
											
                                            <?php 
	  
	  // outputting the pages
		if ($total > $page_limit)
		{
		
		$i = 0;
		while ($i < $total_pages)
		{
		
		
		$page_no = $i+1;
		$qstr = ereg_replace("&page=[0-9]+","",$_SERVER['QUERY_STRING']);
		echo "<a href=\"mylinks.php?$qstr&page=$page_no\" class=\"number"; if($page_no == $_GET['page'] || $page_no + $_GET['page'] == 1) { echo " current"; } echo "\">$page_no</a> ";
		$i++;
		}
		
		}  ?>
											<a href="mylinks.php?page=<? if ($_GET['page'] == $total_pages) { echo "2"; } else { echo $_GET['page'] + 1; }?>" title="Next Page">Next &raquo;</a><a href="mylinks.php?page=<? if ($total_pages > 0) { echo $total_pages; } else { echo "1";}?>" title="Last Page">Last &raquo;</a>
										</div>
                                        <br /><form action="mylinks.php" method="get">
              <strong>Display per page:</strong> &nbsp;&nbsp; <input class="text-input" size="4" type="text" id="pl" value="<? if (isset($spl)) { echo $spl; } else { echo "10"; }   ?>" name="pl" /> &nbsp;&nbsp;<input type="submit" value="Update" class="button">
                <div align="right"><input type="text" name="s" id="s" class="text-input" size="25" />&nbsp;<input type="submit" value="Search" class="button" /></div></form>
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

	</body>
</html>
