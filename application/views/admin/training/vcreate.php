<?php 

	include VIEWPATH . '/admin/avheader.php';	

?>
	<div class="container">
	    <form class="form-horizontal" method="POST" action=<?php echo base_url("admin/training/creation"); ?>>
	    	<div class="has-error"><?php echo form_error('trainingType'); ?></div>
	        <div class="form-group" >
	            <label for="object_name" class="col-sm-4 control-label">Тип тренировка :</label>  
	            <div class="col-sm-4">
	                <select name="trainingType" class="form-control"> 
	                    <?php
	                        for ($i = 0 ; $i < count($trainingTypes) ; $i++) {
	                            echo "<option value='". $trainingTypes[$i]['id'] ."'>". $trainingTypes[$i]['name'] ."</option>";
	                        }
	                    ?>
	                </select>
	            </div>
	        </div>
	        <div class="has-error"><?php echo form_error('description'); ?></div>
	        <div class="form-group">
	            <label for="description" class="col-sm-4 control-label">Описание:</label>
	            <div class="col-sm-4">
	                <textarea name="description" class="form-control"></textarea>
	            </div>
	        </div>
	        <div class="has-error"><?php echo form_error('duration'); ?></div>
	        <div class="form-group">
	            <label for="duration" class="col-sm-4 control-label">Продължителност:</label>
	            <div class="col-sm-4">
                <select name="duration" class="form-control"> 
	                    <option value="00:45:00">00:45:00</option>
	                    <option value="01:00:00">01:00:00</option>
	                    <option value="01:30:00">01:30:00</option>
	                    <option value="02:00:00">02:00:00</option>
	                    <option value="02:30:00">02:30:00</option>
	                    <option value="03:00:00">03:00:00</option>
	                    <option value="03:30:00">03:30:00</option>
	                    <option value="04:00:00">04:00:00</option>
	                </select>

	            </div>
	        </div>
	        <div class="has-error"><?php echo form_error('seats'); ?></div>
	        <div class="form-group">
	            <label for="seats" class="col-sm-4 control-label">Места:</label>
	            <div class="col-sm-4">
	                <input name="seats" type="number" min="0" class="form-control"/>
	            </div>
	        </div>
	        <div class="form-group">
	            <div class="col-sm-offset-4 col-sm-3">
	                <button type="submit" class="btn btn-default">Създай</button>
	            </div>
	        </div>
	    </form>
	</div>

<?php 

	include VIEWPATH . '/admin/avfooter.php';	

?>