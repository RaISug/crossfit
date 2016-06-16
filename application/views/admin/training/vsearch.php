<?php 

	include '/../avheader.php';	

?>

	<div class="container">
		<form class="form-vertical col-sm-offset-4" action="<?php echo base_url("admin/training/searching"); ?>" method="POST">
	        <div class="has-error"><?php echo form_error('trainingType'); ?></div>
	        <div class="form-group" >
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
	        <div class="form-group">
	            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
	        </div>
	    </form>
	</div>
	
<?php 

	if (isset($noResultsFound)) {
		echo "<p style='text-align: center; color: red;'>$noResultsFound</p>";
	}
	
	if (isset($trainings)) {
		for ($i = 0 ; $i < count($trainings) ; $i++) { 
			?>
			<div class="col-sm-6 col-md-3">
				<div class="thumbnail">
					<div class="caption" align="center">
						<p class="ellipsis">Описание: <?php echo $trainings[$i]->description; ?></p>
	                    <p class="ellipsis">Продължителност: <?php echo $trainings[$i]->duration; ?></p>
						<p class="ellipsis">Места: <?php echo $trainings[$i]->seats_count; ?></p>
	                    <form method="POST" action="<?php echo base_url("admin/training/deletion"); ?>">
	                    	<input type="hidden" name="training" value="<?php echo $trainings[$i]->id; ?>"/>
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