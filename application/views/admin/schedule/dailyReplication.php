<?php 

	include VIEWPATH . '/admin/avheader.php';	

?>
	<div class="container">
		<form class="form-horizontal" action="<?php echo base_url("admin/schedule/replication/daily"); ?>" method="POST">
	        <div class="form-group">
	        	<label for="object_name" class="col-sm-4 control-label">Копирай от :</label>  
	            <div class="col-sm-5">
	                <input type="date" class="form-control" name="copy_from">
	            </div>
	        </div>
	        <div class="form-group">
	        	<label for="object_name" class="col-sm-4 control-label">Копирай за :</label>  
	            <div class="col-sm-5">
	                <input type="date" class="form-control" name="copy_to">
	            </div>
	        </div>
	        <div class="form-group">
	            <button type="submit" class="btn btn-primary col-sm-offset-6">Копирай</button>
	        </div>
	    </form>
	</div>

<?php 

	include VIEWPATH . '/admin/avfooter.php';	

?>