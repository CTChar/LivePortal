<?php


	$action = basename($_SERVER['PHP_SELF']);

if (!favorited($_SESSION['userId'],$favorited))
{
?>
	<form action="<?php echo $action; ?>">
		<input type="hidden" name="userId" value="<?php echo $favorited?>">
		<input type="submit" name="favoriteSubmit" value="Favorite">
	</form>

<?php
}
elseif ($_SESSION['userId'] != $favorited)
{
?>
	<form action="<?php echo $action; ?>">
		<input type="hidden" name="userId" value="<?php echo $favorited?>">
		<input type="submit" name="unFavoriteSubmit" value="Un-favorite">
	</form>
<?php
}

echo ('<br/>');
?>