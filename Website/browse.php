<?php
require_once('includes/functions.php');


require_once('includes/header.php');

?>
		<div class="jumbotron">
			<h1>Browse All Users</h1> 
		</div>
	
	<?php
		$query = "SELECT * FROM Accounts ORDER BY username";

		$result = mysqli_query($db, $query);
		if ($db->errno)
		{
			echo "Error: (" . $db->errno . ") " . $db->error;
		}
		else
		{
			echo ('<ul class="list-inline">');
			 while($row = mysqli_fetch_array($result)) 
			 {
				if ($row['accountId'] != $_SESSION['userId'])
				{
					echo ('<li>');
					echo ("<a href='profile.php?userId=".$row['accountId']."'>"."<img width='100px' class='img-thumbnail' height='100px' src='".getAvatar($row['username'],100)."'><br/>".$row['username']."</a> ");
					echo ('<br/>');
					
					echo ("<a href='stream.php?userId=".$row['accountId']."'>Go to Stream</a>");
				
					$favorited = $row['accountId'];
					require('includes/favoriteButtons.php');
					
					echo ('</li>');
				
				}
			}
			echo ('</ul>');
		}

	?>
	

	



<?php
require_once('includes/footer.php')

?>