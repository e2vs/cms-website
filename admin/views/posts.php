<?php
// new database object
$db = new DB();

// Show errors and messages
include 'DB-alerts.php';
?>

<?php if (isset($_POST['delete'])): ?>

	<?php $db->deletePost($_GET['id']); ?>

<?php else: ?>

<h2 class="page-header">Valitse artikkeli</h2>

<table class="table table-responsive table-condensed table-hover">
	<thead>
		<tr><th>Otsikko</th><th>Kirjoittaja</th><th>Päiväys</th><th>Toiminnot</th></tr>
	</thead>
	<tbody>
	<?php 
	$posts = $db->getAllPosts();
	foreach ($posts as $post) {
		echo 	'<tr>
					<td>' . $post['post_title'] . '</td>
					<td>' . $post['post_author'] . '</td>
					<td>' . $post['post_date'] . '</td>
					<td><form method="post" action="?s=posts&id=' . $post['post_id'] . '" class="form-inline"><a class="btn btn-xs btn-info" href="?s=editpost&id=' . $post['post_id'] .'">Muokkaa</a> <input type="submit" name="delete" class="btn btn-xs btn-danger" value="Poista"></form></td>
				</tr>';
	}
	
	?>
	</tbody>
</table>

<?php endif ?>