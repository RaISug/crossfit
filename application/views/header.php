<?php 
	
	function ifPageIsSelectedMarkItAsActive($page) {
		echo uri_string() === $page ? "current_page_item" : "page_item";
	}
	
	function addDaysToTheCurrentDate($numberOf) {
		$currentDate = date_create(date("d.m.Y"));
		date_add($currentDate, date_interval_create_from_date_string("$numberOf days"));

		$formattedDate = date_format($currentDate, 'd.m.Y');
		$dayName = date('l', strtotime($formattedDate));
		$translatedDateName = getTranslatedNameOfTheDate($dayName);
		
		return sprintf("#%s - %s", $translatedDateName, $formattedDate);
	}
	
	function getTranslatedNameOfTheDate($dayName) {
		if ($dayName === 'Monday') {
			return 'Понеделник';
		} else if ($dayName === 'Tuesday') {
			return 'Вторник';
		} else if ($dayName === 'Wednesday') {
			return 'Сряда';
		} else if ($dayName === 'Thursday') {
			return 'Четвъртък';
		} else if ($dayName === 'Friday') {
			return 'Петък';
		} else if ($dayName === 'Saturday') {
			return 'Събота';
		}
		return 'Неделя';
	}

?>

<!DOCTYPE html>
<html lang="en-US">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CrossFit &#8211; CrossFit Training</title>

	<link rel='stylesheet' id='jquery-ui-css' href='http://besemans-truckshop.com/crossfit/wp-content/plugins/wp-fullcalendar/includes/css/jquery-ui/ui-lightness/jquery-ui.min.css?ver=1.2' type='text/css' media='all' />
	<link rel='stylesheet' id='jquery-ui-theme-css' href='http://besemans-truckshop.com/crossfit/wp-content/plugins/wp-fullcalendar/includes/css/jquery-ui/ui-lightness/theme.css?ver=1.2' type='text/css' media='all' />

	<link rel='stylesheet' id='bizgrowth-font-css' href='//fonts.googleapis.com/css?family=Roboto+Condensed%3A400%2C300%2C400italic%2C700&#038;ver=4.5.2' type='text/css' media='all' />
	<link rel='stylesheet' id='bizgrowth-basic-style-css' href='http://besemans-truckshop.com/crossfit/wp-content/themes/bizgrowth/style.css?ver=4.5.2' type='text/css' media='all' />
	<link rel='stylesheet' id='bizgrowth-editor-style-css' href='http://besemans-truckshop.com/crossfit/wp-content/themes/bizgrowth/editor-style.css?ver=4.5.2' type='text/css' media='all' />
	<link rel='stylesheet' id='nivo-style-css' href='http://besemans-truckshop.com/crossfit/wp-content/themes/bizgrowth/css/nivo-slider.css?ver=4.5.2' type='text/css' media='all' />
	<link rel='stylesheet' id='bizgrowth-responsive-style-css' href='http://besemans-truckshop.com/crossfit/wp-content/themes/bizgrowth/css/responsive.css?ver=4.5.2' type='text/css' media='all' />
	<link rel='stylesheet' id='bizgrowth-default-style-css' href='http://besemans-truckshop.com/crossfit/wp-content/themes/bizgrowth/css/default.css?ver=4.5.2' type='text/css' media='all' />
	<link rel='stylesheet' id='animation-style-css' href='http://besemans-truckshop.com/crossfit/wp-content/themes/bizgrowth/css/animation.css?ver=4.5.2' type='text/css' media='all' />
	<link rel='stylesheet' id='font-awesome-style-css' href='http://besemans-truckshop.com/crossfit/wp-content/themes/bizgrowth/css/font-awesome.css?ver=4.5.2' type='text/css' media='all' />
	
	<script type='text/javascript' src='http://besemans-truckshop.com/crossfit/wp-includes/js/jquery/jquery.js?ver=1.12.3'></script>
	<script type='text/javascript' src='http://besemans-truckshop.com/crossfit/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.0'></script>
	<script type='text/javascript' src='http://besemans-truckshop.com/crossfit/wp-includes/js/jquery/ui/core.min.js?ver=1.11.4'></script>
	<script type='text/javascript' src='http://besemans-truckshop.com/crossfit/wp-includes/js/jquery/ui/widget.min.js?ver=1.11.4'></script>
	<script type='text/javascript' src='http://besemans-truckshop.com/crossfit/wp-includes/js/jquery/ui/position.min.js?ver=1.11.4'></script>
	<script type='text/javascript' src='http://besemans-truckshop.com/crossfit/wp-includes/js/jquery/ui/menu.min.js?ver=1.11.4'></script>
	<script type='text/javascript' src='http://besemans-truckshop.com/crossfit/wp-includes/js/jquery/ui/selectmenu.min.js?ver=1.11.4'></script>

	<script type='text/javascript' src='http://besemans-truckshop.com/crossfit/wp-content/themes/bizgrowth/js/jquery.nivo.slider.js?ver=4.5.2'></script>
	<script type='text/javascript' src='http://besemans-truckshop.com/crossfit/wp-content/themes/bizgrowth/js/custom.js?ver=4.5.2'></script>

	<style type="text/css">
		.sitenav ul li a:hover, .sitenav ul li.current_page_item a, .slide_info .slide_more:hover,
			.services-wrap .one_third:hover .MoreLink, .ReadMore:hover {
			border-color: #0294CF;
		}
		
		.content_body {
			margin-top: 70px;
		}
		
		.schedule_table {
			width: 100%;
			table-layout: fixed;
			border-collapse: collapse;
		}
		
		.schedule_table tbody tr th {
			padding: 5px;
			font-size: 15px;
		}
		
		.schedule_table tbody tr td {
			padding: 5px;
			height: 50px;
			text-align:center;
		}
		
		.schedule_table tbody tr th {
			border: 1px solid black;
		}
		
		.schedule_table tbody tr:first-child th {
			border-top: 0;
		}

		.schedule_table tbody tr td {
			border: 1px solid black;
		}
		
		.schedule_table tbody tr td:first-child, .schedule_table tr th:first-child {
			border-left: 0;
		}
		
		.schedule_table tbody tr td:last-child, .schedule_table tbody tr th:last-child {
			border-right: 0;
		}
		
		.schedule_table tbody tr td.training_hour {
			font-size: 15px;
			text-align: center;
		}
		
	</style>
	
</head>
<body class="home page page-id-10 page-template-default">
	<div class="header ">
		<div class="container">
			<div class="logo">
				<h1>
					<a href="http://besemans-truckshop.com/crossfit/">CrossFit</a>
				</h1>
				<span>CrossFit Training</span>
			</div>

			<div class="toggle">
				<a class="toggleMenu" href="#">Menu</a>
			</div>

			<div class="sitenav">
				<div class="menu">
					<ul>
						<li class="<?php ifPageIsSelectedMarkItAsActive("home") ?>"><a href="<?php echo base_url("home"); ?>">Начало</a></li>
						<li class="<?php ifPageIsSelectedMarkItAsActive("schedule") ?>"><a href="<?php echo base_url("schedule"); ?>">График</a></li>
						<li class="<?php ifPageIsSelectedMarkItAsActive("pricelist") ?>"><a href="<?php echo base_url("pricelist"); ?>">Цено разпис</a></li>
					</ul>
				</div>
			</div>

			<div class="clear"></div>
		</div>
	</div>