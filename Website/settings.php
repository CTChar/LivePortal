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
		<h1>Settings</h1> 
	</div>


<?php
require_once('includes/footer.php')

?>