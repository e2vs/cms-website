<?php
// new database object
$db = new DB();

if (isset($_GET['id'])) {
	$post_id = $_GET['id'];
}

if (isset($_POST['update_post'])) {
	$db->updatePost($post_id);
}

// Show errors and messages
include 'DB-alerts.php';
?>

<h2 class="page-header">Muokkaa artikkelia</h2>

<form method="post" action="?page=edit_post">

	<div class="form-group">
		<input type="text" name="post_title" class="form-control" value="<?php echo $db->getPost($post_id, 'title'); ?>">
	</div>

	<div class="form-group">
		<textarea id="wysiwyg" name="post_content" class="form-control" rows="20"><?php echo $db->getPost($post_id, 'content'); ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="edit_post" class="btn btn-primary" value="Muokkaa">
	</div>
	

</form>
