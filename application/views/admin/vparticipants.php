<?php 

	include 'avheader.php';	

?>

	<div class="container">
		<form class="form-vertical col-sm-offset-2" action="<?php echo base_url("admin/participants"); ?>" method="POST">
	        <div class="form-group">
	            <div class="col-sm-4">
	                <input type="date" class="form-control" name="schedule_date">
	            </div>
	        </div>
			<div class="form-group">
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
	            <button type="submit" class="btn btn-defualt"><span class="glyphicon glyphicon-search"></span></button>
	        </div>
			<div class="has-error"><?php echo form_error('schedule_date'); ?></div>
	        <div class="has-error"><?php echo form_error('schedule_time	'); ?></div>
	    </form>
	</div>
	
<?php 

	if (isset($participants)) { ?>
		<div class='container'>
			<br><br><br>
			<table class='table table-hover'>
				<tr>
					<th>№</th>
					<th>Име</th>
				</tr>
				<?php 
				for ($i = 0 ; $i < count($participants) ; $i++) { ?>
					<tr>
						<td><?php echo ($i + 1); ?></td>
						<td><?php echo $participants[$i]->first_name . " " . $participants[$i]->last_name; ?></td>
					</tr>
				<?php 
				}?>
			</table>
		</div>
<?php
	}

	if (isset($errorMessage)) {
		echo "<p style='text-align: center; color: red;'>$errorMessage</p>";
	}
	
	include 'avfooter.php';
	
?>