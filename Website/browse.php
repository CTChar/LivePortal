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
				echo ("<a href='profile.php?userId=".$row['accountId']."'>".$row['username']."</a> ");
				
				echo ("<a href='stream.php?userId=".$row['username']."'>Go to Stream</a>");
				
				
				$favorited = $row['accountId'];
				require('includes/favoriteButtons.php');
				
				
				
				
				
			}
		}

	?>
	

	



<?php
require_once('includes/footer.php')

?>