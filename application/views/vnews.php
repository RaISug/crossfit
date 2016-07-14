<?php

include_once "vheader.php";

?>

	<div class="container">
		<div class="page_content">
			<section class="site-main">
				<h1 class="entry-title">Новини: </h1><br>
				<div class="entry-content">
					<?php 
						for ($i = 0 ; $i < count($news) ; $i++) {
					?>
							<article class="post">
		
							    <header class="entry-header">
							        <a href="<?php echo base_url("news?id=" . $news[$i]['id'])?>"><h2 class="single_title"><?php echo $news[$i]['title']; ?></h2></a>
							    </header>
							    
							     <div class="postmeta">
							            <div class="post-date">Дата на публикуване: <?php echo $news[$i]['news_date']; ?></div><!-- post-date -->
							            <!-- <div class="post-comment"> &nbsp;|&nbsp; <a href="">Брой коментари</a></div> 
							            <div class="post-categories">&nbsp;|&nbsp; Категория: <a href="" rel="category tag">Категория</a></div> -->
							            <div class="clear"></div>         
							    </div>
							    
							    <div class="entry-content">
							        <div class="ellipsis">
							        	<?php echo $news[$i]['content']; ?>
							        </div>
						                <div class="postmeta">          
								            <div class="post-tags"></div>
								            <div class="clear"></div>
								        </div>
							    </div>
							   
							    <footer class="entry-meta"></footer>
							
							</article>
					<?php 
						}
					?>
				</div>
			</section>

			<div class="clear"></div>
		</div>
	</div>

<?php

include_once "vfooter.php";

?>
	