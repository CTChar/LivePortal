<?php
require_once('includes/functions.php');


require_once('includes/header.php');

if (!isLoggedIn())
{
	header('Location: index.php');
}

$userId = $_SESSION['userId'];
$username = $_SESSION['username'];

?>
	<div class="jumbotron">
		<h1>Your Messages</h1> 
	</div>
	
	<script>
	  $(function() {
		$( "#accordion" ).accordion({
		  collapsible: true
		});
	  });
	</script>
	
	<div id="accordion">
	<?php
		$query = "SELECT * FROM Messages WHERE toId=".$_SESSION['userId']." ORDER BY  `Messages`.`sentTime` DESC ";

		$result = mysqli_query($db, $query);
		if ($db->errno)
		{
			echo "Error: (" . $db->errno . ") " . $db->error;
		}
		else
		{
			while($row = mysqli_fetch_array($result)) 
			{
				if ($_SESSION['userId'] == $row['toId'])
				{
					//echo ("From: ".$row['fromId']."<br/>To: ".$row['toId']."<br/>Subject: ".$row['subject']."<br/>Message: ".$row['message']."<br/><br/>");
					echo ("<h3>From: ".getUsername($row['fromId'])." ".date('F j, Y, g:i a',strtotime($row['sentTime']))."<br/>Subject: ".$row['subject']."</h3>");
					echo ("<div><p>Message: ".$row['message']."</p></div>");
				}
			}
		}

	?>
	</div>

	



<?php
require_once('includes/footer.php')

?>