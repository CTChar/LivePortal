<?php

require_once('includes/header.php');

//$key = isset($_REQUEST["key"]) ? $_REQUEST["key"] : "";	
$userId = isset($_REQUEST["userId"]) ? $_REQUEST["userId"] : "";	

//$key = $userId;


	$query = "SELECT * FROM Favorites WHERE favoritorAccountId = '".clean($userId)."'";
	
	$result = mysqli_query($db, $query);
	if($result != false)
	{
		$row = mysqli_fetch_assoc($result);
		if($row)
		{
			//echo ($row['favoritorAccountId']." Likes ".$row['favoritedAccountId']);
			
			
			$iquery = "SELECT * FROM Accounts WHERE accountId = '".$row['favoritorAccountId']."'";
			$iresult = mysqli_query($db, $iquery);
			if($iresult != false)
			{
				$irow = mysqli_fetch_assoc($iresult);
				if($irow)
				{
					echo ($irow['username']);
				}
			}
			echo (' Favorited ');
			$iquery = "SELECT * FROM Accounts WHERE accountId = '".$row['favoritedAccountId']."'";
			$iresult = mysqli_query($db, $iquery);
			if($iresult != false)
			{
				$irow = mysqli_fetch_assoc($iresult);
				if($irow)
				{
					
					echo ($irow['username']);
				}
			}
			//echo (" on ".date( 'Y/m/d H:i:s', strtotime($row['favoritedTime'])));
			echo (" on ".date( 'l jS \of F Y h:i:s A', strtotime($row['favoritedTime'])));
			
			
		}
		else
		{
			$key = "";
			echo ('This user has no favorites');
		}
	}
	
	
?>


		



<?php
require_once('includes/footer.php')

?>