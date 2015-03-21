<?php

require_once('includes/header.php');

//$key = isset($_REQUEST["key"]) ? $_REQUEST["key"] : "";	
$userId = isset($_REQUEST["userId"]) ? $_REQUEST["userId"] : "";	

//$key = $userId;
?>
	<div class="jumbotron">
		<h1>
			<?php
					echo (getUsername($userId)."'s Favorites");
			?>
		</h1> 
	</div>
<?php
	$query = "SELECT * FROM Favorites WHERE favoritorAccountId = '".clean($userId)."'";
	
	$result = mysqli_query($db, $query);
	if($result != false)
	{
		$count = 0;
		echo ('<ul class="list-inline">');
		while($row = mysqli_fetch_array($result)) 
		{
			//echo ($row['favoritorAccountId']." Likes ".$row['favoritedAccountId']);
			
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
						require('includes/favoriteButtons.php');
				
						echo ('</li>');
				
					
					
				}
			}
			
			$count++;
		}
		
		if ($count == 0)
		{
			echo ('<li>This user has no favorites</li>');
		}
		
		echo ('</ul>');
	}
	
	
?>


		



<?php
require_once('includes/footer.php')

?>