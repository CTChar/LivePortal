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
	$uid = isset($_SESSION['userId']) ? $_SESSION['userId'] : "";	//fixes error of no session id when not logged in
	echo ('<ul class="list-inline">');
	 while($row = mysqli_fetch_array($result)) 
	 {
		//echo ('uid '.$uid.' accountId '.$row['accountId'].'<br/>');
		if ($row['accountId'] != $uid)
		{
			echo ('<li>');
			echo ("<a href='profile.php?userId=".$row['accountId']."'>"."<img width='100px' class='img-thumbnail' height='100px' src='".getAvatar($row['username'],100)."'><br/>".shorten($row['username'],12)."</a> ");
			echo ('<br/>');
			
			echo ("<a href='stream.php?userId=".$row['accountId']."'>Go to Stream</a>");
			echo ('<br/>');
		
			$favorited = $row['accountId']; //required for favorite buttons
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