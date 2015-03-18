<?php

require_once('includes/header.php');

$key = isset($_REQUEST["key"]) ? $_REQUEST["key"] : "";	
?>

	<div class="jumbotron">
		<h1>IRC</h1> 
	</div>
	<iframe src="https://kiwiirc.com/client/server.liveportal.gq/?nick=Test|?&theme=cli#partyline" style="border:0; width:100%; height:450px;"></iframe>


<?php
require_once('includes/footer.php')

?>