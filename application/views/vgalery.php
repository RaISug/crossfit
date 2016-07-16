<?php
	
	include "vheader.php";

?>
	<style>
		
		#images {
			
		}
	
		#videos {
			display: none;		
		}
		
	</style>
	
	<link href="<?php echo base_url("assets/css/bootstrap/bootstrap.min.css"); ?>" rel="stylesheet">
	
	<div class="container">
		<div class="page_content">
			<div class="content_body">
<?php
				if (isset($albums)) {
					echo "<h3 style='text-align: center; margin-bottom: 25px;'>Разгледай нашите албуми: </h3>";
					for ($i = 0 ; $i < count($albums) ; $i++) {
						echo "
							<div class='col-sm-6 col-md-4'>
						    	<div class='thumbnail' style='box-shadow: 5px 0px 15px #888888; min-height: 350px; max-height: 350px;'>
							      	<div class='caption' style='text-align: center'>
							        	<h3 style='margin-bottom: 30px;'>" . $albums[$i]['name'] . "</h3>
										<a href='" . base_url("galery?id=" . $albums[$i]['id']) . "'>
						    				<img src='" . base_url("assets/files/" . $albums[$i]['file_name']) . "' style='min-height: 250px; max-height: 250px; min-width: 100%; max-width: 100%'></img>
						    			</a>
							      	</div>
							    </div>
						  	</div>
						";
					}
				} else if (isset($images) && isset($videos)) {
?>
					<ul class='nav nav-tabs' style='margin-bottom: 25px;'>
					  <li role='presentation' id='images-tab' class='active'><a href='#' onclick="onChangeTabClicked('images')">Снимки</a></li>
					  <li role='presentation' id='videos-tab'><a href='#' onclick="onChangeTabClicked('videos')">Видео</a></li>
					</ul>
					
					<div id='images'>
<?php
						for ($i = 0 ; $i < count($images) ; $i++) {
							echo "
								<div class='col-sm-6 col-md-6'>
							    	<div class='thumbnail' style='box-shadow: 5px 0px 15px #888888; min-height: 350px; max-height: 350px;'>
								      	<div class='caption' style='text-align: center'>
											<img src='" . base_url("/assets/files/" . $images[$i]['file_name']) . "' style='min-height: 280px; max-height: 280px; max-width: 100%; min-width: 100%'></img>
								        	<p style='margin-top: 5px;'>" . $images[$i]['description'] . "</p>
								      	</div>
								    </div>
							  	</div>
							";
						}
?>
					</div>

					<div id='videos'>
<?php
						for ($i = 0 ; $i < count($videos) ; $i++) {
							echo "
								<div class='col-sm-6 col-md-6'>
							    	<div class='thumbnail' style='box-shadow: 5px 0px 15px #888888; min-height: 350px; max-height: 350px;'>
								      	<div class='caption' style='text-align: center'>
											<video class='embed-responsive-item' class='col-sm-6 col-md-3' controls style='min-height: 280px; max-height: 280px; max-width: 100%; min-width: 100%'>
											  	<source src='" . base_url("assets/files/" . $videos[$i]['file_name'])."' type='video/mp4'>
											</video>
								        	<p style='margin-top: 5px;'>" . $videos[$i]['description'] . "</p>
								      	</div>
								    </div>
							  	</div>
							";
						}
?>
					</div>
<?php
				} else {
					
				}
?>		
			</div>
		</div>
	</div>
	
	<script>
		
	</script>
<?php

	include "vfooter.php";
	
?>