<?php
require_once('includes/functions.php');

if (!isLoggedIn())
{
	header('Location: index.php');
}

$keyValue = getFromTable ('Accounts', 'accountId', $_SESSION['userId'], 'streamKey');

if (isset($_POST['deleteAccount']))
{
	deleteAccount();
}

require_once('includes/header.php');



$userId = $_SESSION['userId'];
$username = $_SESSION['username'];

?>
	<script>
		$(function() {
			$( "#tabs" ).tabs();
		});
	</script>
	<div class="jumbotron">
		<h1>Settings</h1> 
	</div>
	
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">Account</a></li>
			<li><a href="#tabs-2">Profile</a></li>
			<li><a href="#tabs-3">Privacy</a></li>
		</ul>
		<div id="tabs-1">
			<div>
				<p>
					<?php
					
						echo ("Your Stream Key: ".$keyValue);
					
					?>
				</p>
				
				<p>
					Delete Account
				</p>
				<form action="settings.php" method="post">
					<input class="btn btn-primary  btn-xs" type="submit" name="deleteAccount" value="Delete Your Account">
				</form>
				<!--
				<p>Change Security Questions</p>
				<?php
				$q1 = getFromTable ('Accounts','accountId',$userId ,'q1');
				$q2 = getFromTable ('Accounts','accountId',$userId ,'q2');
				$q3 = getFromTable ('Accounts','accountId',$userId ,'q3');
				
				
				$query = "SELECT * FROM Security_questions";
				$result = mysqli_query($db, $query);
				if ($db->errno)
				{
					echo "Error: (" . $db->errno . ") " . $db->error;
				}
				else
				{
					
					//echo ('<select>');
					//while($row = mysqli_fetch_array($result)) 
					{
						//echo ('<option value="'.$row['qid'].'">'.$row['question'].'</option>');
					}
					//echo ('</select>');
				}
				
				
				?>
				
				
				
				<p>Reset Password</p>
				-->
			</div>
		</div>
		<div id="tabs-2">
			<div>
				<p>profile settings</p>
			</div>
		</div>
		<div id="tabs-3">
			<div>
				<p>privacy settings</p>
			</div>
		</div>
	</div>


<?php
require_once('includes/footer.php')

?>