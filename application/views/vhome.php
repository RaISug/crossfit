<?php

include_once "vheader.php";

?>

	<section id="home_slider">
		<div class="slider-wrapper theme-default">
			<div id="slider" class="nivoSlider" style="max-width: 100%; min-width: 100%; min-height: 600px; max-height: 600px;">
				<!-- <img src="<?php /* echo base_url("assets/css/images/slides/slide1.jpg"); */ ?>" alt="" title="#slidecaption1" /> -->
				<img src="<?php echo base_url("assets/css/images/slides/slide2.jpg"); ?>" alt="" title="#slidecaption2" />
				<img src="<?php echo base_url("assets/css/images/slides/slide3.jpg"); ?>" alt="" title="#slidecaption1" />
				<img src="<?php echo base_url("assets/css/images/slides/slide4.jpeg"); ?>" alt="" title="#slidecaption3" />
			</div>
			<div id="slidecaption1" class="nivo-html-caption">
				<div class="slide_info">
					<!-- <h2>Някакъв текст</h2>
					<p>По описателен текст</p>
					<a class="slide_more" href="#">Прочети още</a> -->
				</div>
			</div>

			<div id="slidecaption2" class="nivo-html-caption">
				<div class="slide_info">
					<!-- <h2>Някакъв текст</h2>
					<p>По описателен текст</p>
					<a class="slide_more" href="#">Прочети още</a> -->
				</div>
			</div>

			<div id="slidecaption3" class="nivo-html-caption">
				<div class="slide_info">
					<!-- <h2>Някакъв текст</h2>
					<p>По описателен текст</p>
					<a class="slide_more" href="#">Прочети още</a> -->
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</section>

	<link href="<?php echo base_url("assets/css/bootstrap/bootstrap.min.css"); ?>" rel="stylesheet"> 
	
	<div class="container">
		<div class="page_content">
			<div class="content_body">
				<h1>Информация за нас: </h1>
				<div class="row">
				  <div class="col-sm-12 col-md-4">
				    <div class="thumbnail">
				      <img src="<?php echo base_url("/assets/css/images/for-as.jpg"); ?>" class="img-circle" style="max-width: 200px; max-height: 200px">
				      <div class="caption" style="text-align: center">
				        <h3>Име и фамилия</h3>
				        <p>кратко описание, от около няколко изречения</p>
				      </div>
				    </div>
				  </div>
				  <div class="col-sm-12 col-md-4">
				    <div class="thumbnail">
				      <img src="<?php echo base_url("/assets/css/images/for-as.jpg"); ?>" class="img-circle" style="max-width: 200px; max-height: 200px">
				      <div class="caption" style="text-align: center">
				        <h3>Име и фамилия</h3>
				        <p>кратко описание, от около няколко изречения</p>
				      </div>
				    </div>
				  </div>
				  <div class="col-sm-12 col-md-4">
				    <div class="thumbnail">
				      <img src="<?php echo base_url("/assets/css/images/for-as.jpg"); ?>" class="img-circle" style="max-width: 200px; max-height: 200px">
				      <div class="caption" style="text-align: center">
				        <h3>Име и фамилия</h3>
				        <p>кратко описание, от около няколко изречения</p>
				      </div>
				    </div>
				  </div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>

<?php

include_once "vfooter.php";

?>
	