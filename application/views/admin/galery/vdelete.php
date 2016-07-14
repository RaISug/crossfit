<?php 

	include VIEWPATH . '/admin/avheader.php';	

	echo "<p style='text-align: center; color: red;'>" . form_error("id") . "</p>";
	
	
	if (isset($errorMessage)) {
		echo "<p style='text-align: center; color: red;'>$errorMessage</p>";
	}
	
	if (isset($successMessage)) {
		echo "<p style='text-align: center; color: red;'>$successMessage</p>";
	}
	
	include VIEWPATH . '/admin/avfooter.php';	

?>