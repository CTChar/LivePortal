<?php
require_once('includes/functions.php');


require_once('includes/header.php');


$userId = isset($_REQUEST["userId"]) ? $_REQUEST["userId"] : "";	

$username =  getFromTable ('Accounts','accountId',$userId,'username');
$profileId = getFromTable ('Profiles','Accounts_accountId',$userId,'profileId');

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
			Stream: <a href="stream.php?userId=<?php echo($userId); ?>">Go to Stream</a>
			<br/>
			
			
			<?php
			
			if (!favorited($_SESSION['userId'],$userId))
			{
			?>
			<form action="profile.php">
				<input type="hidden" name="userId" value="<?php echo $userId?>">
				<input type="submit" name="favoriteSubmit" value="Favorite">
			</form>
			<?php
			}
			else
				{
					?>
						<form action="profile.php">
							<input type="hidden" name="userId" value="<?php echo $userId?>">
							<input type="submit" name="unFavoriteSubmit" value="Un-favorite">
						</form>
					<?php
				}
			?>
			
			
			
			
			
			<br/>
			Language: <?php echo ($language);?>
			<br/>
			Bio: <?php echo ($bio);?>
			<br/>
			Phone: <?php echo ($phone);?>
			<br/>
			Country: <?php echo ($country);?>
	

	



<?php
require_once('includes/footer.php')

?>