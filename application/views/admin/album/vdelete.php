<?php 

	include '/../avheader.php';	

?>
	<div class="container">
	
<?php 
		if (isset($errorMessage)) {
			echo "<p style='text-align: center; color: red;'>$errorMessage</p>";
		}
		
		if (isset($successMessage)) {
			echo "<p style='text-align: center; color: green;'>$successMessage</p>";
		}
?>
	
		<form class="form-vertical col-sm-offset-4" action="<?php echo base_url("admin/album/deletion"); ?>" method="POST">
	        <div class="has-error"><?php echo form_error('id'); ?></div>
	        <div class="form-group" >
	            <div class="col-sm-4">
	                <select name="id" class="form-control"> 
	                    <?php
	                        for ($i = 0 ; $i < count($albums) ; $i++) {
	                            echo "<option value='". $albums[$i]['id'] ."'>". $albums[$i]['name'] ."</option>";
	                        }
	                    ?>
	                </select>
	            </div>
	        </div>
	        <div class="form-group">
	            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span></button>
	        </div>
	    </form>
	</div>

<?php 

	include '/../avfooter.php';	

?>