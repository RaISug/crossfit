<?php

include_once 'vheader.php';

?>

	<style>
		
		.pricelist_table {
			table-layout: fixed;
			border-collapse: collapse;
		}
		
		.pricelist_table tbody tr th {
			padding: 5px;
			font-size: 15px;
		}
	
		.pricelist_table tbody tr td {
			padding: 5px;
			height: 30px;
			width: 100px;
			text-align:center;
			font-size: 15px;
		}
		
		.pricelist_table tbody tr th {
			border: 1px solid black;
		}
		
		.pricelist_table tbody tr td {
			border: 1px solid black;
		}
		
		.pricebox {
			box-shadow: 2px 4px 8px 2px rgba(0, 0, 0, 0.2);
		}
		
	</style>

	<link href="<?php echo base_url("assets/css/bootstrap/bootstrap.min.css"); ?>" rel="stylesheet"> 

	<div class="container">
		<div class="page_content">
			<div class="content_body">
				<h3 style="text-align: center"><b>Единични посещения</b></h3>
				<div class="row">
				  	<div class="col-sm-12 col-md-6">
				    	<div class="thumbnail pricebox">
					      	<div class="caption" style="text-align: center">
					        	<h3>Единично посещение</h3>
					        	<p><b>10 лв.</b></p>
					      	</div>
				    	</div>
				  	</div>
				  	<div class="col-sm-12 col-md-6">
					    <div class="thumbnail pricebox">
					      	<div class="caption" style="text-align: center">
					        	<h3>Индивидуална тренировка</h3>
					        	<p><b>20 лв.</b></p>
					      	</div>
					    	</div>
				  	</div>
				</div>
				<br><br>
				<h3 style="text-align: center"><b>Карти</b></h3>
				<div class="row">
				  	<div class="col-sm-6 col-md-4">
				    	<div class="thumbnail pricebox">
					      	<div class="caption" style="text-align: center">
					        	<h3>10 посещения</h3>
					        	<p><b>80 лв.</b></p>
					      	</div>
				    	</div>
				  	</div>
				  	<div class="col-sm-6 col-md-4">
				    	<div class="thumbnail pricebox">
					      	<div class="caption" style="text-align: center">
					        	<h3>12 посещения</h3>
					        	<p><b>100 лв.</b></p>
					      	</div>
				    	</div>
				  	</div>
				  	<div class="col-sm-6 col-md-4">
				    	<div class="thumbnail pricebox">
					      	<div class="caption" style="text-align: center">
					        	<h3>Неограничен достъп</h3>
					        	<p><b>150 лв.</b></p>
					      	</div>
				    	</div>
				  	</div>
				</div>
			</div>
		</div>
	</div>

<?php 

include_once 'vfooter.php';

?>