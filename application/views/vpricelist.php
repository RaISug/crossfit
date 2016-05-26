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
		
		.schedule-slots:hover {
			box-shadow: 2px 4px 8px 2px rgba(0, 0, 0, 0.2);
		}
		
	</style>

	<div class="container">
		<div class="page_content">
			<div class="content_body">
				<h1>Ценоразпис: </h1>
				<div align="center">
					<table class="pricelist_table">
						<tbody>
							<tr>
								<th>Посещения</th>
								<th>Цена</th>
							</tr>
							<tr>
								<td>1</td>
								<td>10 лв.</td>
							</tr>
							<tr>
								<td>4</td>
								<td>35 лв.</td>
							</tr>
							<tr>
								<td>8</td>
								<td>70 лв.</td>
							</tr>
							<tr>
								<td>10</td>
								<td>80 лв.</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

<?php 

include_once 'vfooter.php';

?>