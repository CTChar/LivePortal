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
		
		$( ".accordion" ).accordion({
		  collapsible: true,
		  heightStyle: "content",
		  active: false
		});
	  
	  
		$( "#tabs" ).tabs();
	
		$( ".markUnread" ).click(function() {
			var messageId = $(this).attr('messageId');
			var toId = $(this).attr('toId');
			var fromId = $(this).attr('fromId');
			var messageType = $(this).attr('messageType');
			var getTest = $.get( "ajax/messageAction.php", { messageId: messageId , toId : toId , fromId : fromId, messageType : messageType, messageAction: "markUnread" } )
			.done(function( data ) {
			//alert( data );
			//$( "body" ).append( data );
			});
			
			$(this).parent().removeClass('read');
			$(this).parent().addCalss('unread');
			event.stopImmediatePropagation();
		});
	
		$( ".messageDelete" ).click(function() {
			var messageId = $(this).attr('messageId');
			var toId = $(this).attr('toId');
			var fromId = $(this).attr('fromId');
			var messageType = $(this).attr('messageType');
			var getTest = $.get( "ajax/messageAction.php", { messageId: messageId , toId : toId , fromId : fromId, messageType : messageType, messageAction: "delete" } )
			.done(function( data ) {
			//alert( data );
			//$( "body" ).append( data );
			
		  });
			event.stopImmediatePropagation();
		});
	
		$( ".unread" ).click(function() {
			var messageId = $(this).attr('messageId');
			var toId = $(this).attr('toId');
			var fromId = $(this).attr('fromId');
			var messageType = $(this).attr('messageType');
			$.get( "ajax/messageAction.php", { messageId: messageId , toId : toId , fromId : fromId, messageType : messageType, messageAction: "markRead" } )
			.done(function( data ) {
			//alert( data );
			//$( "body" ).append( data );
			});
			
			$(this).removeClass('ui-state-active unread');
			$(this).addCalss('read');
		});
	});
	</script>
	
		
<div id="tabs">
  <ul>
    <li><a href="#tabs-1">New</a></li>
    <li><a href="#tabs-2">Sent</a></li>
  </ul>
<div id="tabs-1">
	<div>
		
		<div class="accordion">
		<?php
			$query = "SELECT * FROM Messages WHERE toId=".$_SESSION['userId']." AND toDeleted = 0 ORDER BY  `Messages`.`sentTime` DESC ";

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
						//echo ("<h3>From: ".getUsername($row['fromId'])." ".date('F j, Y, g:i a',strtotime($row['sentTime']))."<br/>Subject: ".$row['subject']."</h3>");
						
						
						?>
						
						<h3 class=" <?php if($row['messageRead'] == 1){echo ("read");} else {echo ("unread");} ?>"  messageType="received" fromId="<?php echo $row['fromId'] ?>" toId="<?php echo $row['toId'] ?>"  messageId="<?php echo $row['messageId'] ?>">
							<div>
								From: <?php echo getUsername($row['fromId']); ?>
								<br/>
								Sent: <?php echo date('F j, Y, g:i a',strtotime($row['sentTime'])); ?>
								<br/>
								Subject: <?php echo $row['subject']; ?>
							</div>
							<div class="messageControls">
								<span class="markUnread" messageType="received" fromId="<?php echo $row['fromId'] ?>" toId="<?php echo $row['toId'] ?>"  messageId="<?php echo $row['messageId'] ?>">Unread</span>
								<span class="messageDelete" messageType="received" fromId="<?php echo $row['fromId'] ?>" toId="<?php echo $row['toId'] ?>"  messageId="<?php echo $row['messageId'] ?>">Delete</span>
							</div>
						</h3>
						
						<?php
						
						echo ("<div><p>Message: ".$row['message']."</p></div>");
					}
				}
			}

		?>
		</div>
		
	</div>
</div>
  <div id="tabs-2">
	<div>
	
		<div class="accordion">
		<?php
			$query = "SELECT * FROM Messages WHERE fromId=".$_SESSION['userId']." ORDER BY  `Messages`.`sentTime` DESC ";

			$result = mysqli_query($db, $query);
			if ($db->errno)
			{
				echo "Error: (" . $db->errno . ") " . $db->error;
			}
			else
			{
				while($row = mysqli_fetch_array($result)) 
				{
					if ($_SESSION['userId'] == $row['fromId'])
					{
						//echo ("From: ".$row['fromId']."<br/>To: ".$row['toId']."<br/>Subject: ".$row['subject']."<br/>Message: ".$row['message']."<br/><br/>");
						//echo ("<h3>From: ".getUsername($row['fromId'])." ".date('F j, Y, g:i a',strtotime($row['sentTime']))."<br/>Subject: ".$row['subject']."</h3>");
						
						
						?>
						
						<h3>
							<div>
								To: <?php echo getUsername($row['toId']); ?>
								<br/>
								Sent: <?php echo date('F j, Y, g:i a',strtotime($row['sentTime'])); ?>
								<br/>
								Subject: <?php echo $row['subject']; ?>
							</div>
							<div class="messageControls">
								Delete
							</div>
						</h3>
						
						<?php
						
						echo ("<div><p>Message: ".$row['message']."</p></div>");
					}
				}
			}

		?>
		</div>
	
	
	
	</div>
  </div>
</div>

		




<?php
require_once('includes/footer.php')

?>