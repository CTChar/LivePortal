<?php
require_once('includes/functions.php');


require_once('includes/header.php');

?>
		<div class="jumbotron">
			<h1>Browse All Users</h1> 
		</div>
	
	<?php
		$query = "SELECT * FROM Accounts";

		$result = mysqli_query($db, $query);
		if ($db->errno)
		{
			echo "Error: (" . $db->errno . ") " . $db->error;
		}
		else
		{
			 while($row = mysqli_fetch_array($result)) 
			 {
				echo ("<a href='profile.php?userId=".$row['accountId']."'>".$row['username']."</a>");
				
				
			
				if (!favorited($_SESSION['userId'],$row['accountId']))
				{
				?>
				<form action="browse.php">
					<input type="hidden" name="userId" value="<?php echo $row['accountId']?>">
					<input type="submit" name="favoriteSubmit" value="Favorite">
				</form>
				
				<?php
				}
				else
				{
					?>
						<form action="browse.php">
							<input type="hidden" name="userId" value="<?php echo $row['accountId']?>">
							<input type="submit" name="unFavoriteSubmit" value="Un-favorite">
						</form>
					<?php
				}
			
				echo ('<br/>');
				
				
				
				
				
			}
		}

	?>
	

	



<?php
require_once('includes/footer.php')

?>