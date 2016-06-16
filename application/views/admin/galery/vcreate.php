<?php 

	include '/../../avheader.php';	

?>
	<div class="container">
	    <form class="form-horizontal" method="POST" action=<?php echo base_url("admin/album/creation"); ?>>
	        <div class="has-error"><?php echo form_error('name'); ?></div>
	        <div class="form-group">
	            <label for="seats" class="col-sm-4 control-label">Име:</label>
	            <div class="col-sm-4">
	                <input name="name" type="text" class="form-control"/>
	            </div>
	        </div>
	        <div class="form-group">
	            <div class="col-sm-offset-5">
	                <button type="submit" class="col-sm-4 btn btn-primary">Създай</button>
	            </div>
	        </div>
	    </form>
	</div>

<?php 

	include '/../../avfooter.php';	

?>