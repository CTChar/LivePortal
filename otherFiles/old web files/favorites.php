<?php

require_once('includes/header.php');

$userId = isset($_REQUEST["userId"]) ? $_REQUEST["userId"] : "";	
$type = isset($_REQUEST["type"]) ? $_REQUEST["type"] : "";	
$username = getUsername($userId);

?>
	<div class="jumbotron">
		<h1>
			<?php
				if ($type=="followers")
					echo ($username."'s Followers");
				else
					echo ($username."'s Favorites");
			?>
		</h1> 
	</div>
<?php
	if ($type=="followers")
	{
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
	}
	else
	{
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
	}
	
require_once('includes/footer.php')

?>