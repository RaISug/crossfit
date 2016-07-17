<?php 
	
	function ifPageIsSelectedMarkItAsActive($page) {
		echo uri_string() === $page ? "current_page_item" : "page_item";
	}

?>

<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CrossFit &#8211; CrossFit Training</title>

	<link rel='stylesheet' href='//fonts.googleapis.com/css?family=Roboto+Condensed%3A400%2C300%2C400italic%2C700&#038;ver=4.5.2' type='text/css' media='all' />
	<link rel='stylesheet' href='<?php echo base_url("assets/css/bizgrowth/style.css?ver=4.5.2"); ?>' type='text/css' media='all' />
	<link rel='stylesheet' href='<?php echo base_url("assets/css/bizgrowth/editor-style.css?ver=4.5.2"); ?>' type='text/css' media='all' />
	<link rel='stylesheet' href='<?php echo base_url("assets/css/bizgrowth/nivo-slider.css?ver=4.5.2"); ?>' type='text/css' media='all' />
	<link rel='stylesheet' href='<?php echo base_url("assets/css/bizgrowth/responsive.css?ver=4.5.2"); ?>' type='text/css' media='all' />
	<link rel='stylesheet' href='<?php echo base_url("assets/css/bizgrowth/default.css?ver=4.5.2"); ?>' type='text/css' media='all' />
	<link rel='stylesheet' href='<?php echo base_url("assets/css/bizgrowth/animation.css?ver=4.5.2"); ?>' type='text/css' media='all' />
	<link rel='stylesheet' href='<?php echo base_url("assets/css/bizgrowth/font-awesome.css?ver=4.5.2"); ?>' type='text/css' media='all' />
	
	<script type='text/javascript' src='<?php echo base_url("assets/js/jquery/jquery.js?ver=1.12.3"); ?>'></script>
	<script type='text/javascript' src='<?php echo base_url("assets/js/jquery/jquery-migrate.min.js?ver=1.4.0"); ?>'></script>
	<script type='text/javascript' src='<?php echo base_url("assets/js/jquery/core.min.js?ver=1.11.4"); ?>'></script>
	<script type='text/javascript' src='<?php echo base_url("assets/js/jquery/widget.min.js?ver=1.11.4"); ?>'></script>
	<script type='text/javascript' src='<?php echo base_url("assets/js/jquery/position.min.js?ver=1.11.4"); ?>'></script>
	<script type='text/javascript' src='<?php echo base_url("assets/js/jquery/menu.min.js?ver=1.11.4"); ?>'></script>
	<script type='text/javascript' src='<?php echo base_url("assets/js/jquery/selectmenu.min.js?ver=1.11.4"); ?>'></script>

	<script type='text/javascript' src='<?php echo base_url("assets/js/bizgrowth/jquery.nivo.slider.js?ver=4.5.2"); ?>'></script>
	<script type='text/javascript' src='<?php echo base_url("assets/js/bizgrowth/custom.js?ver=4.5.2"); ?>'></script>

	<style type="text/css">
	
		html, body {
			height: 100%;		
		}
		
		.sitenav ul li a:hover, .sitenav ul li.current_page_item a, .slide_info .slide_more:hover,
			.services-wrap .one_third:hover .MoreLink, .ReadMore:hover {
			border-color: #0294CF;
		}
		
		.content_body {
			margin-top: 100px;
		}
		
		.ellipsis * {
		    white-space: nowrap;
		    overflow: hidden;
		    text-overflow: ellipsis;
		    -o-text-overflow: ellipsis;
		}
		
		@media screen and (min-width: 1024px) {
			
			#page-wrapper {
			   	min-height: 100%;
			}
	
			#body-wrapper {
				overflow:auto;
			   	padding-bottom: 270px;
			}
			
			#footer-wrapper {
			   	bottom: 0;
			   	width: 100%;
			   	height: 270px;  /* Height of the footer */
			   	position: relative;
			   	margin-top: -270px;
			}
			
		}
		
	</style>
	
</head>
<body class="home page page-id-10 page-template-default">
	<div id="page-wrapper">
		<div class="header">
			<div class="container">
				<div class="logo">
					<h1>
						<a href="<?php base_url(); ?>" style="text-decoration: none;">CrossFit</a>
					</h1>
					<span>CrossFit Training</span>
				</div>
	
				<div class="toggle">
					<a class="toggleMenu" href="#">Menu</a>
				</div>
	
				<div class="sitenav">
					<div class="menu">
						<ul>
							<li class="<?php ifPageIsSelectedMarkItAsActive("home") ?>"><a href="<?php echo base_url("home"); ?>" style="text-decoration: none;">Начало</a></li>
							<li class="<?php ifPageIsSelectedMarkItAsActive("schedule") ?>"><a href="<?php echo base_url("schedule"); ?>" style="text-decoration: none;">График</a></li>
							<li class="<?php ifPageIsSelectedMarkItAsActive("pricelist") ?>"><a href="<?php echo base_url("pricelist"); ?>" style="text-decoration: none;">Ценоразпис</a></li>
							<li class="<?php ifPageIsSelectedMarkItAsActive("contacts") ?>"><a href="<?php echo base_url("contacts"); ?>" style="text-decoration: none;">Контакти</a></li>
							<li class="<?php ifPageIsSelectedMarkItAsActive("news") ?>"><a href="<?php echo base_url("news"); ?>" style="text-decoration: none;">Новини</a></li>
							<li class="<?php ifPageIsSelectedMarkItAsActive("galery") ?>"><a href="<?php echo base_url("galery"); ?>" style="text-decoration: none;">Галерия</a></li>
							<?php if ($isUserLoggedIn === FALSE) { ?>
								<li class="<?php ifPageIsSelectedMarkItAsActive("login") ?>"><a href="<?php echo base_url("login"); ?>" style="text-decoration: none;">Вход</a></li>
								<li class="<?php ifPageIsSelectedMarkItAsActive("registration") ?>"><a href="<?php echo base_url("registration"); ?>" style="text-decoration: none;">Регистрация</a></li>
							<?php } else { ?>
								<li class="<?php ifPageIsSelectedMarkItAsActive("logout") ?>"><a href="<?php echo base_url("logout"); ?>" style="text-decoration: none;">Изход</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
	
				<div class="clear"></div>
			</div>
		</div>
		<div id="body-wrapper">