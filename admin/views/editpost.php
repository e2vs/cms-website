<?php
// new database object
$db = new DB();

// Show errors and messages
include 'DB-alerts.php';

if (isset($_POST['editpost'])) {
	$db->updatePost($_POST['id']);
}

?>

<h2 class="page-header">Muokkaa artikkelia</h2>

<form method="post">

	<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">

	<div class="form-group">
		<input type="text" name="post_title" class="form-control" value="<?php echo $db->getPost($_GET['id'], 'title'); ?>">
	</div>

	<div class="form-group">
		<textarea id="wysiwyg" name="post_content" class="form-control" rows="20"><?php echo $db->getPost($_GET['id'], 'content'); ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="editpost" class="btn btn-primary" value="Muokkaa"> <a href="?s=posts" class="btn btn-default">Takaisin</a>
	</div>

</form>

