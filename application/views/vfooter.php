			</div>
		</div>
		<div id="footer-wrapper">
			<div class="container">
				<div class="cols-4 widget-column-1">
					<h5>За нас</h5>
					<p>Някакво кратко описание</p>
				</div>
	
				<div class="cols-4 widget-column-2">
					<h5>Главно меню</h5>
	
					<div class="menu">	
						<div class="menu">
							<ul>
								<li class="page_item"><a href="<?php echo base_url("schedule"); ?>">График</a></li>
								<li class="page_item"><a href="<?php echo base_url("pricelist"); ?>">Ценоразпис</a></li>
								<li class="page_item"><a href="<?php echo base_url("news"); ?>">Новини</a></li>
								<li class="page_item"><a href="<?php echo base_url("galery"); ?>">Галерия</a></li>
								<li class="page_item"><a href="<?php echo base_url("contacts"); ?>">Контакти</a></li>
							</ul>
						</div>
					</div>
	
				</div>
	
				<div class="cols-4 widget-column-3">
	<!-- 			<h5>Скорошни новини</h5>
					<div class="recent-post">
						<a href="http://besemans-truckshop.com/crossfit/blog/2016/05/14/hello-world/"></a>
						<a href="http://besemans-truckshop.com/crossfit/blog/2016/05/14/hello-world/">
							<h6>Hello world!</h6>
						</a>
						<p>Welcome to WordPress. This is your first post. Edit or delete&#8230;</p>
					</div> -->			
				</div>
	
				<div class="cols-4 widget-column-4">
					<h5>Информация</h5>
					<div class="phone-no">
						<p>
							<i class="fa fa-map-marker"></i> Местоположение
						</p>
						<p>
							<i class="fa fa-phone"></i> +123 456 7890
						</p>
						<p>
							<i class="fa fa-envelope"></i> <a href="mailto:example@mail.com">example@mail.com</a>
						</p>
					</div>
	
					<div class="clear"></div>
					<div class="footer-icons">
						<a title="facebook" class="fa fa-facebook" target="_blank" href="https://www.facebook.com/CommandoFit-1006452329470384"></a>
						<a title="twitter" class="fa fa-twitter" target="_blank" href="#twitter"></a>
						<a title="google-plus" class="fa fa-google-plus" target="_blank" href="#gplus"></a>
						<a title="linkedin" class="fa fa-linkedin" target="_blank" href="#linkedin"></a>
					</div>
	
				</div>
	
				<div class="clear"></div>
			</div>
	
			<div class="copyright-wrapper">
				<div class="container">
					<div class="copyright-txt">2016 CommandoFit. All Right Reserved</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
<?php 
			if (strpos(uri_string(), 'galery') !== FALSE) {
				echo "<script>
		    			function onChangeTabClicked(tabId) {
							if (typeof tabId === 'undefined') {
								return;
							}

							document.getElementById('images-tab').className = '';
							document.getElementById('videos-tab').className = '';
							document.getElementById('images').style.display = 'none';
							document.getElementById('videos').style.display = 'none';
						
							document.getElementById(tabId).style.display = 'block';
							document.getElementById(tabId + '-tab').className = 'active';
						}
	    			 </script>";
			} else if (strpos(uri_string(), 'home') !== FALSE || uri_string() === '') {
				echo "<script>
						setInterval(function() {
							if (document.getElementsByClassName('nivo-nextNav')[0]) {
						 		document.getElementsByClassName('nivo-nextNav')[0].click();
							}				
			  			 }, 5000);
					 </script>";
		  	}
?>
	</body>
</html>