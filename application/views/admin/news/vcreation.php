<?php 

	include '/../avheader.php';	

?>
	<div class="container">
	    <form class="form-horizontal" method="POST" action=<?php echo base_url("admin/album/creation"); ?>>
	        <div class="has-error"><?php echo form_error('name'); ?></div>
	        <div class="form-group">
	            <label for="title" class="col-sm-4 control-label">Заглавие:</label>
	            <div class="col-sm-4">
	                <input name="title" type="text" class="form-control"/>
	            </div>
	            <label for="content" class="col-sm-4 control-label">Съдържание:</label>
	            <div class="col-sm-4">
	                <textarea name="content" class="form-control">
	                </textarea>
	            </div>
	            <label for="name" class="col-sm-4 control-label">Дата:</label>
	            <div class="col-sm-4">
	                <input name="news_date" type="date" class="form-control"/>
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

	include '/../avfooter.php';	

?>