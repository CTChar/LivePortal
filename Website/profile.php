<?php
require_once('includes/functions.php');


require_once('includes/header.php');


$userId = isset($_REQUEST["userId"]) ? $_REQUEST["userId"] : "";	

$username =  getFromTable ('Accounts','accountId',$userId,'username');
$profileId = getFromTable ('Profiles','Accounts_accountId',$userId,'profileId');
$keyValue = getFromTable ('Accounts', 'accountId', $userId, 'streamKey');
$language = getFromTable ('Profiles','Accounts_accountId',$userId,'language');
$bio = getFromTable ('Profiles','Accounts_accountId',$userId,'bio');
$phone = getFromTable ('Profiles','Accounts_accountId',$userId,'phone');
$country = getFromTable ('Profiles','Accounts_accountId',$userId,'country');
?>
		<div class="jumbotron">
			<h1>
				<?php
					
						echo ($username."'s Profile");
					
				?>
			</h1> 
		</div>
		
			<div class="row">
				<div class="col-xs-6">
					<img src='<?php echo (getAvatar($username,400)); ?>'>
				</div>
				<div class="col-xs-6">
		
					Stream: <a href="stream.php?userId=<?php echo($userId); ?>">Go to Stream</a>
					<br/>
					Favorites: <a href="favorites.php?userId=<?php echo($userId); ?>">View Favorites</a>
					<br/>
					
					
					<?php
					
						$favorited = $userId;
						require('includes/favoriteButtons.php');
					?>
					
					
					
					
					
					<br/>
					Language: <?php echo ($language);?>
					<br/>
					Bio: <?php echo ($bio);?>
					<br/>
					Phone: <?php echo ($phone);?>
					<br/>
					Country: <?php echo ($country);?>
					<br/>
					<?php
					if (isLoggedIn() && $_SESSION['userId'] == $userId)	
					{
					echo ("Your Key: ".$keyValue);
			
					}
			
					?>
			
				</div>
			</div>
			<?php



require_once('includes/footer.php')

?>