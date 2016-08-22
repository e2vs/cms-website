<?php
if (isset($db)) {
	if ($db->errors) {
		foreach ($db->errors as $error) {
			echo    '<div class="alert alert-danger">
            			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' .
            			$error .
            			'</div>';
		}
	}
	if ($db->messages) {
		foreach ($db->messages as $message) {
			echo    '<div class="alert alert-success">
            			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' .
            			$message .
            			'</div>';
		}
	}
}