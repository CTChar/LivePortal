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
				<input class="btn btn-primary  btn-xs" type="submit" name="favoriteSubmit" value="Favorite">
			</form>

		<?php
		}
		elseif ($_SESSION['userId'] != $favorited)
		{
		?>
			<form action="<?php echo $action; ?>">
				<input type="hidden" name="unfollowUserId" value="<?php echo $favorited?>">
				<input class="btn btn-primary  btn-xs" type="submit" name="unFavoriteSubmit" value="Un-favorite">
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
				<input type="hidden" name="type" value="<?php echo $type?>">
				<input class="btn btn-primary  btn-xs" type="submit" name="unFavoriteSubmit" value="Un-favorite">
			</form>
		<?php
		}
	}
}
//echo ('<br/>');
?>