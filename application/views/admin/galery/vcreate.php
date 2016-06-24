<?php 

	include '/../avheader.php';	

?>
	<div class="container">
		<p class="has-error"><?php if (isset($errorMessage)) { echo $errorMessage; } ?></p>
	    <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo base_url("admin/galery/creation"); ?>">
	        <div class="has-error"><?php echo form_error('file_type'); ?></div>
	        <div class="form-group">
	            <label for="file_type" class="col-sm-4 control-label">Вид на файла:</label>
	            <div class="col-sm-5">
	                <select name="file_type" class="form-control">
	                	<option value="1">Снимка</option>
	                	<option value="2">Видео</option>
	                </select>
	            </div>
	        </div>
	        <div class="has-error"><?php echo form_error('album_id'); ?></div>
	        <div class="form-group">
	            <label for="album_id" class="col-sm-4 control-label">Албум:</label>
	            <div class="col-sm-5">
	                <select name="album_id" class="form-control">
					<?php
						foreach ($albums as $album) {
							echo "<option value='" . $album['id'] . "'>" . $album['name'] . "</option>";
						}
					?>
	                </select>
	            </div>
	        </div>
	        <div class="has-error"><?php echo form_error('description'); ?></div>
	        <div class="form-group">
	            <label for="seats" class="col-sm-4 control-label">Описание:</label>
	            <div class="col-sm-5">
	                <textarea name="description" class="form-control"></textarea>
	            </div>
	        </div>
	        <div class="has-error"><?php echo form_error('file'); ?></div>
	        <div class="form-group">
	            <div class="col-sm-offset-4 col-sm-5">
	                <input name="file" type="file" />
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