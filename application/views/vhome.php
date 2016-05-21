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
					<h2>Някакъв текст</h2>
					<p>По описателен текст</p>
					<a class="slide_more" href="#">Прочети още</a>
				</div>
			</div>

			<div id="slidecaption2" class="nivo-html-caption">
				<div class="slide_info">
					<h2>Някакъв текст</h2>
					<p>По описателен текст</p>
					<a class="slide_more" href="#">Прочети още</a>
				</div>
			</div>

			<div id="slidecaption3" class="nivo-html-caption">
				<div class="slide_info">
					<h2>Някакъв текст</h2>
					<p>По описателен текст</p>
					<a class="slide_more" href="#">Прочети още</a>
				</div>
			</div>
		</div>
		<div class="clear"></div>
	</section>

	<div class="container">
		<div class="page_content">
			<section class="site-main">
				<h1 class="entry-title">Новини: </h1><br>
				<div class="entry-content">
					<article class="post">

					    <header class="entry-header">
					        <h2 class="single_title">Тема на новината</h2>
					    </header>
					    
					     <div class="postmeta">
					            <div class="post-date">Дата</div><!-- post-date -->
					            <div class="post-comment"> &nbsp;|&nbsp; <a href="http://besemans-truckshop.com/crossfit/blog/2016/05/14/hello-world/#comments">Брой коментари</a></div> 
					             <div class="post-categories">&nbsp;|&nbsp; Категория: <a href="http://besemans-truckshop.com/crossfit/blog/category/uncategorized/" rel="category tag">Категория</a></div>
					            <div class="clear"></div>         
					    </div>
					    
					    <div class="entry-content">
					        <p>Съдържание на новината</p>
				                <div class="postmeta">          
						            <div class="post-tags"> </div>
						            <div class="clear"></div>
						        </div>
					    </div>
					   
					    <footer class="entry-meta"></footer>
					
					</article>
				</div>
			</section>

			<!-- <div id="sidebar">
				<aside id="recent-posts-2" class="widget widget_recent_entries">
					<h3 class="widget-title">Recent Posts</h3>
					<ul>
						<li><a href="http://besemans-truckshop.com/crossfit/blog/2016/05/14/hello-world/">Hello world!</a></li>
					</ul>
				</aside>
			</div> -->
			<div class="clear"></div>
		</div>
	</div>

<?php

include_once "vfooter.php";

?>
	