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

	    <form class="form-horizontal" method="POST" action=<?php echo base_url("admin/news/creation"); ?>>
	        <div class="has-error"><?php echo form_error('title'); ?></div>
	        <div class="form-group">
	            <label for="title" class="control-label">Заглавие:</label>
                <input name="title" type="text" class="form-control"/>
			</div>
			<div class="has-error"><?php echo form_error('content'); ?></div>
			<div class="form-group">
	            <label for="content" class="control-label">Съдържание:</label>
	            <textarea name="content" class="col-sm-4 form-control" id="news"></textarea>
            </div>
            <div class="has-error"><?php echo form_error('news_date'); ?></div>
            <div class="form-group" style="margin-top: -15px">
	            <label for="name" class="control-label">Дата:</label>
                <input name="news_date" type="date" class="form-control"/>
	        </div>
	        <div class="form-group">
	            <div class="col-sm-offset-5">
	                <button type="submit" class="col-sm-4 btn btn-primary">Създай</button>
	            </div>
	        </div>
	    </form>
	</div>

<?php 

	include __DIR__.'/../avfooter.php';	

?>