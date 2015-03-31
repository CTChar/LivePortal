<?php
	
require_once('../includes/functions.php');

	$query = "UPDATE  `liveportal`.`Messages` SET  `fromDeleted` =  '0' ";
	$result = mysqli_query($db, $query);
	if($result == false)
	{
		printf("Errorcode messages reset fromDeleted: %s\n", mysqli_error($db));
	}

	$query = "UPDATE  `liveportal`.`Messages` SET  `toDeleted` =  '0' ";
	$result = mysqli_query($db, $query);
	if($result == false)
	{
		printf("Errorcode messages reset toDeleted: %s\n", mysqli_error($db));
	}

	$query = "UPDATE  `liveportal`.`Messages` SET  `messageRead` =  '0' ";
	$result = mysqli_query($db, $query);
	if($result == false)
	{
		printf("Errorcode messages reset messageRead: %s\n", mysqli_error($db));
	}
?>