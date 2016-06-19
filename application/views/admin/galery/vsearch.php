<?php 

	include '/../avheader.php';	

	if (isset($noResultsFound)) {
		echo "<p style='text-align: center; color: red;'>$noResultsFound</p>";
	}
?>

	<div class="container">
		<form class="form-vertical" action="<?php echo base_url("admin/galery/searching"); ?>" method="POST">
	        <div class="form-group">
	            <div class="col-sm-5">
	        		<label for="fileTypeId" class="col-sm-5 control-label">Вид на файла:</label>
	                <select name="fileTypeId" class="form-control"> 
	                    <option value="1">Снимка</option>
	                    <option value="2">Видео</option>
	                </select>
	            </div>
	        </div>
	        <div class="form-group" >
	            <div class="col-sm-5">
        		<label for="albumId" class="col-sm-5 control-label">Име на албума:</label>
	                <select name="albumId" class="form-control"> 
	                    <?php
	                        for ($i = 0 ; $i < count($albums) ; $i++) {
	                            echo "<option value='". $albums[$i]['id'] ."'>". $albums[$i]['name'] ."</option>";
	                        }
	                    ?>
	                </select>
	            </div>
	        </div>
	        <div class="form-group">
	        	<label for="fileTypeId" class="control-label" style="visibility: hidden">Търси: </label>
	            <button type="submit" class="btn btn-primary col-sm-2"><span class="glyphicon glyphicon-search"></span></button>
	        </div>
	    </form>
	</div>
	
<?php 
	
	if (isset($galeryFiles)) {
		for ($i = 0 ; $i < count($galeryFiles) ; $i++) { 
			?>
			<div class="col-sm-6 col-md-3">
				<div class="thumbnail">
					<img src="<?php echo base_url("assets/files/" . $galeryFiles[$i]->file_name);  ?>" alt="<?php echo $galeryFiles[$i]->file_type; ?>">
					<div class="caption" align="center">
						<p class="ellipsis">Вид на файла: <?php echo $galeryFiles[$i]->training_type; ?></p>
						<p class="ellipsis">Албум: <?php echo $galeryFiles[$i]->training_date; ?></p>
	                    <form method="POST" action="<?php echo base_url("admin/galery/deletion"); ?>">
	                    	<input type="hidden" name="id" value="<?php echo $galeryFiles[$i]->id; ?>"/>
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