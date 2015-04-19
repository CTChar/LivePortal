<?php
require('../includes/functions.php');

$messageId = isset($_REQUEST["messageId"]) ? $_REQUEST["messageId"] : "";	
$toId = isset($_REQUEST["toId"]) ? $_REQUEST["toId"] : "";	
$fromId = isset($_REQUEST["fromId"]) ? $_REQUEST["fromId"] : "";	
$messageType = isset($_REQUEST["messageType"]) ? $_REQUEST["messageType"] : "";	
$messageAction = isset($_REQUEST["messageAction"]) ? $_REQUEST["messageAction"] : "";	


if ($messageAction == "delete")
{
	if ($messageType == "received")
	{
		$query = "UPDATE  `liveportal`.`Messages` SET  `toDeleted` =  '1' WHERE  `Messages`.`messageId` ='".$messageId."'";
		echo ("Received Message Deleted");
	}
	elseif($messageType == "sent")
	{
		$query = "UPDATE  `liveportal`.`Messages` SET  `fromDeleted` =  '1' WHERE  `Messages`.`messageId` ='".$messageId."'";
		echo ("Sent Message Deleted");
	}
	
	$result = mysqli_query($db, $query);
	if($result == false)
	{
		printf("Errorcode message read update: %s\n", mysqli_error($db));
	}
	
	//delete all messages that both parties have deleted
	$query = "DELETE FROM `liveportal`.`Messages` WHERE `Messages`.`toDeleted` = 1 AND `Messages`.`fromDeleted` = 1";
	$result = mysqli_query($db, $query);
}
elseif ($messageAction == "markRead")
{
	$query = "UPDATE  `liveportal`.`Messages` SET  `messageRead` =  '1' WHERE  `Messages`.`messageId` ='".$messageId."'";
	
	$result = mysqli_query($db, $query);
	if($result == false)
	{
		printf("Errorcode message read update: %s\n", mysqli_error($db));
	}
}

?>