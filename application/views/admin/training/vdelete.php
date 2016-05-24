<?php 

	include '/../avheader.php';	

	echo "<p style='text-align: center; color: red;'>" . form_error("training") . "</p>";
	
	
	if (isset($errorMessage)) {
		echo "<p style='text-align: center; color: red;'>$errorMessage</p>";
	}
	
	if (isset($successMessage)) {
		echo "<p style='text-align: center; color: green;'>$successMessage</p>";
	}
	
	include '/../avfooter.php';	

?>