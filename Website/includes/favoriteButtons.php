<?php


	$action = basename($_SERVER['PHP_SELF']);
if (isLoggedIn())
{
	if ($action != "favorites.php")
	{
		if (!favorited($_SESSION['userId'],$favorited))
		{
		?>
			<form action="<?php echo $action; ?>">
				<input type="hidden" name="userId" value="<?php echo $favorited?>">
				<input type="submit" name="favoriteSubmit" class="btn btn-default" value="Favorite">
			</form>

		<?php
		}
		elseif ($_SESSION['userId'] != $favorited)
		{
		?>
			<form action="<?php echo $action; ?>">
				<input type="hidden" name="unfollowUserId" value="<?php echo $favorited?>">
				<input type="submit" name="unFavoriteSubmit" class="btn btn-default" value="Un-favorite">
			</form>
		<?php
		}
	}
	else
	{
		if ($_SESSION['userId'] != $favorited && $userId == $_SESSION['userId'])
		{
		?>
			<form action="<?php echo $action; ?>">
				<input type="hidden" name="unfollowUserId" value="<?php echo $favorited?>">
				<input type="hidden" name="userId" value="<?php echo $_SESSION['userId']?>">
				<input type="submit" name="unFavoriteSubmit" class="btn btn-default" value="Un-favorite">
			</form>
		<?php
		}
	}
}
echo ('<br/>');
?>