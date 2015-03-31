<?php
require_once('includes/functions.php');

$keyValue = getFromTable ('Accounts', 'accountId', $_SESSION['userId'], 'streamKey');


require_once('includes/header.php');

if (!isLoggedIn())
{
	header('Location: index.php');
}

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
				<p>Account Settings</p>
				<p>
					<?php
					if (isLoggedIn() && $_SESSION['userId'] == $userId)	
					{
						echo ("Your Stream Key: ".$keyValue);
					}
					?>
				</p>
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