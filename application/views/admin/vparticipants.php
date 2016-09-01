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
	                    <option value="10:30">10:30</option>
	                    <option value="12:00">12:00</option>
	                    <option value="16:30">16:30</option>
	                    <option value="18:00">18:00</option>
	                    <option value="19:30">19:30</option>
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