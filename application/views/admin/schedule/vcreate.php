<?php 

	include VIEWPATH . '/admin/avheader.php';	

?>
	<div class="container">
	    <form class="form-horizontal" method="POST" action=<?php echo base_url("admin/schedule/creation"); ?>>
	    	<div class="has-error"><?php echo form_error('training'); ?></div>
	        <div class="form-group" >
	            <label for="object_name" class="col-sm-4 control-label">Тип тренировка :</label>  
	            <div class="col-sm-4">
	                <select name="training" class="form-control"> 
	                    <?php
	                        for ($i = 0 ; $i < count($trainings) ; $i++) {
	                            echo "<option value='". $trainings[$i]['id'] ."'>". $trainings[$i]['description'] ."</option>";
	                        }
	                    ?>
	                </select>
	            </div>
	        </div>
	        <div class="has-error"><?php echo form_error('schedule_date'); ?></div>
	        <div class="form-group">
	            <label for="menu_date" class="col-sm-4 control-label">Дата:</label>
	            <div class="col-sm-4">
	                <input name="schedule_date" type="date" class="form-control datepicker"/>
	            </div>
	        </div>
	        <div class="has-error"><?php echo form_error('schedule_time'); ?></div>
	        <div class="form-group">
	            <label for="schedule_time" class="col-sm-4 control-label">Час:</label>
	            <div class="col-sm-4">
	                <select name="schedule_time" class="form-control"> 
	                    <option value="09:00">09:00</option>
	                    <option value="10:00">10:00</option>
	                    <option value="11:00">11:00</option>
	                    <option value="12:00">12:00</option>
	                    <option value="13:00">13:00</option>
	                    <option value="14:00">14:00</option>
	                    <option value="15:00">15:00</option>
	                    <option value="16:00">16:00</option>
	                    <option value="17:00">17:00</option>
	                    <option value="18:00">18:00</option>
	                    <option value="19:00">19:00</option>
	                </select>
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