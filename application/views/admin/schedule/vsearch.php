<?php 

	include '/../avheader.php';	

?>

	<div class="container">
		<form class="form-vertical col-sm-offset-4" action="<?php echo base_url("admin/schedule/searching"); ?>" method="POST">
	        <div class="form-group">
	            <div class="col-sm-5">
	                <input type="date" class="form-control" name="schedule_date">
	            </div>
	        </div>
	        <div class="form-group">
	            <button type="submit" class="btn btn-defualt"><span class="glyphicon glyphicon-search"></span></button>
	        </div>
	    </form>
	</div>
	
<?php 

	if (isset($noResultsFound)) {
		echo "<p style='text-align: center; color: red;'>$noResultsFound</p>";
	}
	
	if (isset($schedules)) {
		for ($i = 0 ; $i < count($schedules) ; $i++) { 
			?>
			<div class="col-sm-6 col-md-3">
				<div class="thumbnail">
					<div class="caption" align="center">
						<p class="ellipsis">Вид тренировка: <?php echo $schedules[$i]->training_type; ?></p>
						<p class="ellipsis">Дата и час: <?php echo $schedules[$i]->training_date; ?></p>
	                    <p class="ellipsis">Места: <?php echo $schedules[$i]->reserved_seats . "/" . $schedules[$i]->available_seats; ?></p>
	                    <p class="ellipsis">Продължителност: <?php echo $schedules[$i]->duration; ?></p>
						<p class="ellipsis">Описание: <?php echo $schedules[$i]->description; ?></p>
	                    <form method="POST" action="<?php echo base_url("admin/schedule/deletion"); ?>">
	                    	<input type="hidden" name="schedule" value="<?php echo $schedules[$i]->id; ?>"/>
	                    	<button class="btn btn-primary" type="submit">Изтрии</button>
	                    </form>
	                </div>
	            </div>
	        </div>	
			<?php 
		}
	}
	
	include '/../avfooter.php';	

?>