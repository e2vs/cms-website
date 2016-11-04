<?php
// new database object
$db = new DB();

if (isset($_POST['new_post'])) {
    $db->newPost();
}

// Show errors and messages
include 'DB-alerts.php';
?>

<h2 class="page-header">Uusi artikkeli</h2>
	
<form method="post" action="?page=new_post">

	<div class="form-group">
		<input type="text" name="post_title" class="form-control" placeholder="Artikkelin otsikko">
	</div>

	<div class="form-group">
		<textarea id="wysiwyg" name="post_content" class="form-control" rows="20"></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="new_post" class="btn btn-primary" value="Lähetä">
	</div>
		
</form>