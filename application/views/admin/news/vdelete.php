<?php 

	include VIEWPATH . '/admin/avheader.php';	

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
	
		<form class="form-vertical col-sm-offset-2" action="<?php echo base_url("admin/news/deletion"); ?>" method="POST">
	        <div class="has-error"><?php echo form_error('id'); ?></div>
	        <div class="form-group" >
	            <div class="col-sm-8">
	                <select name="id" class="form-control"> 
	                    <?php
	                        for ($i = 0 ; $i < count($news) ; $i++) {
	                            echo "<option value='". $news[$i]['id'] ."'>". $news[$i]['title'] ."</option>";
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

	include VIEWPATH . '/admin/avfooter.php';	

?>