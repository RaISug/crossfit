<?php

include_once "header.php";

?>

	<div class="container">
		<div class="page_content">
			<div class="content_body">
				<h1>График</h1>
				<table class="schedule_table">
					<tbody>
						<tr>
							<th></th>
							<?php 
							
								for ($i = 0 ; $i < 7 ; $i++) {
									echo "<th>" . addDaysToTheCurrentDate($i) . "</th>";
								}
							
							?>
						</tr>
						<?php 
						
							for ($i = 8 ; $i <= 19 ; $i++) {
								$trainingHour = sprintf("%02d", $i);								
								echo "
									<tr>
										<td class='training_hour'>$trainingHour:00</td>
										<td>2</td>
										<td>3</td>
										<td>4</td>
										<td>5</td>
										<td>6</td>
										<td>7</td>
										<td>8</td>
									</tr>
								";
							}
						
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
<?php

include_once "footer.php";

?>
	