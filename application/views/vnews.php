<?php

	include_once "vheader.php";

?>

	<div class="container">
		<?php 
			if (isset($selectedNews) === FALSE) {
			?>
				<div class="page_content">
					<section class="site-main" style="width: 100%">
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
									            <div class="post-date">Дата на публикуване: <?php echo $news[$i]['news_date']; ?></div>
									            <!-- <div class="post-comment"> &nbsp;|&nbsp; <a href="">Брой коментари</a></div> 
									            <div class="post-categories">&nbsp;|&nbsp; Категория: <a href="" rel="category tag">Категория</a></div> -->
									            <div class="clear"></div>         
									    </div>
									    
									    <div class="entry-content">
									        <div class="ellipsis">
									        	<div style="max-height: 150px; margin-bottom: 15px;">
										        	<?php echo $news[$i]['content']; ?>
									        	</div>
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
		<?php 
			} else { 
			?>
				<div style="padding-top: 120px;">
					<h1><?php echo $selectedNews[0]['title']; ?></h1>
					<p><i><?php echo "Дата: " . $selectedNews[0]['news_date']; ?></i></p><br>
					<div><?php echo $selectedNews[0]['content']; ?></div>
				</div>
			<?php 
			}
		?>

	</div>

<?php

	include_once "vfooter.php";

?>
	