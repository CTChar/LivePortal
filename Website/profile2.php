<?php


$tab = isset($_REQUEST["tab"]) ? $_REQUEST["tab"] : "";	
require_once('includes/functions.php');


$userId = isset($_REQUEST["userId"]) ? $_REQUEST["userId"] : "";	

if (isset($_REQUEST['sendMessage']))
{
	$subject = isset($_REQUEST["subject"]) ? $_REQUEST["subject"] : "";	
	$message = isset($_REQUEST["message"]) ? $_REQUEST["message"] : "";	
	sendMessage($userId,$subject,$message);
}
if (isset($_REQUEST['editProfile']))
{
	$language = isset($_REQUEST["language"]) ? $_REQUEST["language"] : "";	
	$bio = isset($_REQUEST["bio"]) ? $_REQUEST["bio"] : "";	
	$country = isset($_REQUEST["country"]) ? $_REQUEST["country"] : "";	
	$url = isset($_REQUEST["url"]) ? $_REQUEST["url"] : "";	
	editProfile($language,$bio,$country,$url);
	header('Location: profile.php?userId='.$userId);
}
	$userName =  getFromTable ('Accounts','accountId',$userId,'username');	
if ($userName == "")
{
	//header('Location: index.php');
}	
require_once('includes/header.php');

$username =  $userName;
$profileId = getFromTable ('Profiles','Accounts_accountId',$userId,'profileId');
$language = getFromTable ('Profiles','Accounts_accountId',$userId,'language');
$bio = getFromTable ('Profiles','Accounts_accountId',$userId,'bio');
$country = getFromTable ('Profiles','Accounts_accountId',$userId,'country');
$url = getFromTable ('Profiles','Accounts_accountId',$userId,'url');

$key = getFromTable ('Accounts', 'accountId', clean($userId), 'streamKey');

//$addViewUserId = isset($_SESSION['userId']) ? $_SESSION['userId'] : "";	
//addView($profileId,$addViewUserId);
	
	
if (isLoggedIn())
{
	//add a view for this profile
	addView($profileId,$_SESSION['userId']);
	
	if ($_SESSION['userId'] == $userId)
	{
		?>
			<!-- Profile Modal -->
			<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="profileLabel">Edit Your Profile</h4>
						</div>
						<div class="modal-body">

							<?php
							if (isset($_REQUEST['sendMessage']) && count($errors) > 0)
							{
								printErrors($errors);
							}
							?>

							<form action="profile.php" method="get">
								<div class="form-group">
									<label for="language">Language</label>
									<input type="text" class="form-control" id="language" name="language" placeholder="Subject" value="<?php echo $language; ?>" >
								</div>
								<div class="form-group">
									<label for="bio">Bio</label>
									<input type="text" class="form-control" id="bio" name="bio" placeholder="Subject" value="<?php echo $bio; ?>" >
								</div>
								<div class="form-group">
									<label for="country">Country</label>
									<input type="text" class="form-control" id="country" name="country" placeholder="Subject" value="<?php echo $country; ?>" >
								</div>
								<div class="form-group">
									<label for="url">URL</label>
									<input type="text" class="form-control" id="url" name="url" placeholder="Subject" value="<?php echo $url; ?>" >
								</div>
								
							<input type="hidden" id="userId" name="userId" value="<?php echo $_SESSION['userId']; ?>">
						</div>
						<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
								<button type="submit" class="btn btn-primary" name="editProfile" id="editProfile">Confirm</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Profile Modal -->
		<?php
	}
?>

	<!-- Message Modal -->
	<div class="modal fade" id="sendMessage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Send <?php echo ($username); ?> a message</h4>
				</div>
				<div class="modal-body">

					<?php

					if (isset($_REQUEST['sendMessage']) && count($errors) > 0)
					{
						printErrors($errors);
					}

					?>

					<form action="profile.php" method="post">
						<div class="form-group">
							<label for="subject">Subject</label>
							<input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" value="<?php if (isset($_REQUEST['sendMessage'])){ echo $subject;} ?>" >
						</div>
						<div class="form-group">
							<label for="message">Message</label>
							<textarea class="form-control" name="message" id="message"><?php if (isset($_REQUEST['sendMessage'])){ echo $message;} ?></textarea>
						</div>
						<input type="hidden" id="userId" name="userId" value="<?php echo $userId; ?>">
				</div>
				<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
						<button type="submit" class="btn btn-primary" name="sendMessage" id="sendMessage">Send</button>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php
}
?>
	<div class="jumbotron">
		<h1>
			<?php echo ($username); ?>
		</h1> 
	</div>
<script>
	$(function() {
		$( "#tabs" ).tabs({
		  <?php 
			if ($tab == 'profile')
			{
				echo "active: 0";
			}
			elseif ($tab == 'stream')
			{
				echo "active: 1";
			}
			elseif ($tab == 'followers')
			{
				echo "active: 2";
			}
			elseif ($tab == 'favorites')
			{
				echo "active: 3";
			}
		  ?>
		});
	});
</script>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">Profile</a></li>
		<li><a href="#tabs-2">Stream</a></li>
		<li><a href="#tabs-3">Followers
		<?php
		$query = "SELECT * FROM Favorites WHERE favoritedAccountId = '".clean($userId)."'";
	
		$result = mysqli_query($db, $query);
		$rowCount = mysqli_num_rows($result);
		echo '<span class="badge badge-dark">'.$rowCount.'</span>';
		?>
		</a></li>
		<li><a href="#tabs-4">Favorites
		<?php
		$query = "SELECT * FROM Favorites WHERE favoritorAccountId = '".clean($userId)."'";
	
		$result = mysqli_query($db, $query);
		$rowCount = mysqli_num_rows($result);
		echo '<span class="badge badge-dark">'.$rowCount.'</span>';
		?>
		</a></li>
	</ul>
	<!-- Profile Tab -->
	<div id="tabs-1">

		<div class="row">
			<div class="col-xs-6">
				<img src='<?php echo (getAvatar($username,400)); ?>'>
			</div>
			<div class="col-xs-6">
				
				<?php
				
				$favorited = $userId; //required for favorite buttons
				require('includes/favoriteButtons.php');
					
				if (isLoggedIn())
				{
					if ($_SESSION['userId'] == $userId)
					{
						?>
						<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#profileModal">
						  Edit Profile
						</button>
						<?php
					}
				?>
				
					<!-- Button trigger messages modal -->
					
					<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#sendMessage">
					  Message
					</button>
					<br/>
				
				<?php 
				} 
				?>
				
				Website: <a href="<?php echo ($url);?>"><?php echo ($url);?></a>
				<br/>
				Bio: <?php echo ($bio);?>
				<br/>
				Language: <?php echo ($language);?>
				<br/>
				Country: <?php echo ($country);?>
				<br/>
				<br/>
				Profile Views: <?php echo getViews($profileId); ?>
			</div>
		</div>
	</div>
	
	<!-- Stream Tab -->
	<div id="tabs-2">
		<div class="row">

			<div class="col-md-6">
				<script src="http://jwpsrv.com/library/Djeg0sQVEeSFjg4AfQhyIQ.js"></script>
				<div id="player">Loading the player...</div>
				<script type="text/javascript">
				  jwplayer("player").setup({
				  file: "rtmp://server.liveportal.gq/liveportal/<?php echo("$key");?>",
				  image: "<?php echo getAvatar($username,500) ?>",
				  //width: 450,
				  height: 500
				  });
				</script>
			</div>
			
			<div class="col-md-6">
				<div class="irc">
					<iframe src="https://kiwiirc.com/client/server.liveportal.gq/?nick=Test|?&theme=cli#<?php echo $username; ?>" style="border:none; width:470px; height:500px; margin: 0px"></iframe>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Followers Tab -->
	<div id="tabs-3">
	
		<?php
		$query = "SELECT * FROM Favorites WHERE favoritedAccountId = '".clean($userId)."'";
	
		$result = mysqli_query($db, $query);
		if($result != false)
		{
			$count = 0;
			echo ('<ul class="list-inline">');
			while($row = mysqli_fetch_array($result)) 
			{
				$iquery = "SELECT * FROM Accounts WHERE accountId = '".$row['favoritorAccountId']."'";
				$iresult = mysqli_query($db, $iquery);
				if($iresult != false)
				{
					$irow = mysqli_fetch_assoc($iresult);
					if($irow)
					{
						
						echo ('<li>');
						
						echo ("<a href='profile.php?userId=".$irow['accountId']."'>"."<img width='100px' height='100px' src='".getAvatar($irow['username'],100)."'><br/>".$irow['username']."</a> ");
						echo ('<br/>');
						
						echo ("<a href='stream.php?userId=".$irow['accountId']."'>Go to Stream</a>");
					
						$favorited = $row['favoritorAccountId'];
						$tab="followers";
						require('includes/favoriteButtons.php');
				
						echo ('</li>');
					}
				}
				$count++;
			}
			if ($count == 0)
			{
				echo ("<li>".$username." has no followers</li>");
			}
			echo ('</ul>');
		}
		?>
	
	</div>
	
	<!-- Favorites Tab -->
	<div id="tabs-4">
		
		<?php
		$query = "SELECT * FROM Favorites WHERE favoritorAccountId = '".clean($userId)."'";
		$result = mysqli_query($db, $query);
		if($result != false)
		{
			$count = 0;
			echo ('<ul class="list-inline">');
			while($row = mysqli_fetch_array($result)) 
			{
				$iquery = "SELECT * FROM Accounts WHERE accountId = '".$row['favoritedAccountId']."'";
				$iresult = mysqli_query($db, $iquery);
				if($iresult != false)
				{
					$irow = mysqli_fetch_assoc($iresult);
					if($irow)
					{
						
						echo ('<li>');
						
						echo ("<a href='profile.php?userId=".$irow['accountId']."'>"."<img width='100px' height='100px' src='".getAvatar($irow['username'],100)."'><br/>".$irow['username']."</a> ");
						echo ('<br/>');
						
						echo ("<a href='stream.php?userId=".$irow['accountId']."'>Go to Stream</a>");
					
						$favorited = $row['favoritedAccountId'];
						$tab="favorites";
						require('includes/favoriteButtons.php');
				
						echo ('</li>');
					}
				}
				$count++;
			}
			if ($count == 0)
			{
				echo ('<li>'.$username.' has no favorites</li>');
			}
			echo ('</ul>');
		}
		?>
		
	</div>
	

<?php
require_once('includes/footer.php')
?>