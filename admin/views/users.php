<?php 
// new database object
$db = new DB();

// Show errors and messages
include 'DB-alerts.php';
?>

<h2 class="page-header">Käyttäjälista</h2>
<h4>Käyttäjätasot:</h4>
<ul class="list-inline">
  <li> 1 - Admin </li>
  <li> 0 - Tavallinen käyttäjä </li>
</ul>

<table class="table table-condensed">
	<thead>
	  <tr>
	    <th>Käyttäjänimi</th>
	    <th>Sähköposti</th>
	    <th>Käyttäjätaso</th>
	  </tr>
	</thead>
	<tbody>
	  <tr>
	    <?php	    
	    foreach ($db->getAllUsers() as $row) {
	    	echo 	'<tr>
						<td>' . $row['user_name'] . '</td>
						<td>' . $row['user_email'] . '</td>
						<td>' . $row['admin'] . '</td>
					</tr>';
	    }
	    ?>
	  </tr>
	</tbody>
</table>