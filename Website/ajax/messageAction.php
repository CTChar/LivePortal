<?php
require('../includes/functions.php');

$messageId = isset($_REQUEST["messageId"]) ? $_REQUEST["messageId"] : "";	
$toId = isset($_REQUEST["toId"]) ? $_REQUEST["toId"] : "";	
$fromId = isset($_REQUEST["fromId"]) ? $_REQUEST["fromId"] : "";	
$messageType = isset($_REQUEST["messageType"]) ? $_REQUEST["messageType"] : "";	
$messageAction = isset($_REQUEST["messageAction"]) ? $_REQUEST["messageAction"] : "";	


if ($messageAction == "delete")
{
	
	//echo ("DELETE messageId: ".$messageId." toId: ".$toId." fromId: ".$fromId." messageType: ".$messageType);
	echo ("Message Deleted");
}
elseif ($messageAction == "markRead")
{
	
	echo ("MARKREAD messageId: ".$messageId." toId: ".$toId." fromId: ".$fromId." messageType: ".$messageType);
	//echo ("Message Read");
	
	$query = "UPDATE  `liveportal`.`Messages` SET  `messageRead` =  '1' WHERE  `Messages`.`messageId` ='".$messageId."'";
	
	$result = mysqli_query($db, $query);
	if($result == false)
	{
		printf("Errorcode message read update: %s\n", mysqli_error($db));
	}
}
elseif ($messageAction == "markUnread")
{
	$query = "UPDATE  `liveportal`.`Messages` SET  `messageRead` =  '0' WHERE  `Messages`.`messageId` ='".$messageId."'";
	
	$result = mysqli_query($db, $query);
	if($result == false)
	{
		printf("Errorcode message read update: %s\n", mysqli_error($db));
	}
}



?>