<?php
	// this file resets all messages to unread and undeleted
	
	
	require_once('../includes/functions.php');

	$query = "UPDATE  `liveportal`.`Accounts` SET  `password` =  '$2y$10$6MiVocUMFdq4u.DGJDQnB.pd3c4J/hiItqYh8BDaLzUCVD9fIx/Wq' ";
	$result = mysqli_query($db, $query);
	if($result == false)
	{
		printf("Errorcode password reset fromDeleted: %s\n", mysqli_error($db));
	}
	else
	{
		echo ('all passwords set to test');
	}

?>