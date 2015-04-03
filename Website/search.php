<?php
require_once('includes/functions.php');


require_once('includes/header.php');



?>
<div class="jumbotron">
	<h1>Results</h1> 
</div>

<?php
$query = "SELECT * FROM Accounts WHERE username LIKE '%".$searchQuery."%' ORDER BY username";

$result = mysqli_query($db, $query);
if ($db->errno)
{
	echo "Error: (" . $db->errno . ") " . $db->error;
}
else
{
	$count = 0;
	echo ('<ul class="list-inline">');
	 while($row = mysqli_fetch_array($result)) 
	 {
		echo ('<li>');
		echo ("<a href='profile.php?userId=".$row['accountId']."'>"."<img width='100px' class='img-thumbnail' height='100px' src='".getAvatar($row['username'],100)."'><br/>".$row['username']."</a> ");
		echo ('<br/>');
		
		echo ("<a href='stream.php?userId=".$row['accountId']."'>Go to Stream</a>");
		echo ('<br/>');
	
		$favorited = $row['accountId']; //required for favorite buttons
		require('includes/favoriteButtons.php');
		
		echo ('</li>');
		$count++;
	}
	if ($count == 0)
	{
		echo ("There are 0 results for ".$searchQuery);
	}
	echo ('</ul>');
}

?>
	
<?php
require_once('includes/footer.php')

?>