<?php 

	include VIEWPATH . '/admin/avheader.php';	

?>
	<div class="container">
	
<?php 
		if (isset($errorMessage)) {
			echo "<p style='text-align: center; color: red;'>$errorMessage</p>";
		}
		
		if (isset($successMessage)) {
			echo "<p style='text-align: center; color: green;'>$successMessage</p>";
		}
?>

	    <form class="form-horizontal" method="POST" action=<?php echo base_url("admin/news/creation"); ?>>
	        <div class="has-error"><?php echo form_error('title'); ?></div>
	        <div class="form-group">
	            <label for="title" class="control-label">Заглавие:</label>
                <input name="title" type="text" class="form-control"/>
			</div>
			<div class="has-error"><?php echo form_error('content'); ?></div>
			<div class="form-group">
	            <label for="content" class="control-label">Съдържание:</label>
	            <textarea name="content" class="col-sm-4 form-control" id="news"></textarea>
            </div>
            <div class="has-error"><?php echo form_error('news_date'); ?></div>
            <div class="form-group" style="margin-top: -15px">
	            <label for="name" class="control-label">Дата:</label>
                <input name="news_date" type="date" class="form-control"/>
	        </div>
	        <div class="form-group">
	            <button type="button" class="col-sm-12 btn btn-primary" data-toggle="modal" data-target="#photosModal">Избери снимка от галерията</button>
	        </div>
			<div class="form-group">
				<textarea class="form-control" id="copy-textarea" placeholder="От тук копирай линка след като снимката бъде избрана"></textarea>
			</div>
	        <div class="form-group">
	            <div class="col-sm-offset-5">
	                <button type="submit" class="col-sm-4 btn btn-primary">Създай</button>
	            </div>
	        </div>
	    </form>
	</div>
	
	<div class="modal fade" id="photosModal" tabindex="-1" role="dialog">
	  	<div class="modal-dialog modal-lg" role="document">
	    	<div class="modal-content">
		      	<div class="modal-body" style="padding: unset">
			      	<?php 
				        if (isset($galeryFiles)) {
							for ($i = 0 ; $i < count($galeryFiles) ; $i++) { 
								?>
								<div class="col-sm-4">
									<div class="thumbnail" style="min-width: 260px; max-width: 260px; min-height: 330px; max-height: 330px;">
							  			<img style="max-width: 250px; max-height: 200px; min-width: 250px; min-height: 200px;" src="<?php echo base_url("assets/files/" . $galeryFiles[$i]['file_name']);  ?>" alt="<?php echo $galeryFiles[$i]['file_type']; ?>">		
										<div class="caption" align="center">
											<p class="ellipsis">Вид на файла: <?php echo $galeryFiles[$i]['file_type']; ?></p>
											<p class="ellipsis">ID на албума: <?php echo $galeryFiles[$i]['album_id']; ?></p>
					                    	<button class="btn btn-primary copy-button" data-photourl="<?php echo base_url("assets/files/" . $galeryFiles[$i]['file_name']);  ?>" type="button">Избери</button>
						                </div>
						            </div>
						        </div>
								<?php 
							}
						}
			      	?>
		      	</div>
    		</div>
	  	</div>
	</div>
	
	<script>
		var buttons = document.getElementsByClassName('copy-button');

		for (var i = 0 ; i < buttons.length ; i++) {
			buttons[i].addEventListener('click', function(event) {
				var copyTextarea = document.getElementById('copy-textarea');

				copyTextarea.innerText = '<img style="max-width: 300px; max-height: 300px; min-width: 300px; min-height: 300px;" src="' + this.dataset.photourl + '">';
			  	copyTextarea.select();

			    var result = document.execCommand('copy');
			    if (result) {
				    $('#photosModal').modal('toggle');
			    }
			});
		}
	</script>
<?php 

	include __DIR__.'/../avfooter.php';	

?>